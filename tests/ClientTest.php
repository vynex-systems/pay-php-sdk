<?php

declare(strict_types=1);

namespace Vynex\Pay\Tests;

use PHPUnit\Framework\TestCase;
use Vynex\Pay\Client;
use Vynex\Pay\Exception\ApiException;
use Vynex\Pay\Exception\AuthenticationException;
use Vynex\Pay\Exception\ConflictException;
use Vynex\Pay\Exception\ConnectionException;
use Vynex\Pay\Exception\NotFoundException;
use Vynex\Pay\Exception\NotImplementedException;
use Vynex\Pay\Exception\PermissionException;
use Vynex\Pay\Exception\RateLimitException;
use Vynex\Pay\Exception\ServerException;
use Vynex\Pay\Exception\ValidationException;
use Vynex\Pay\Exception\VynexException;

final class ClientTest extends TestCase
{
    private FakeTransport $http;

    /** @var array<int, float> */
    private array $sleeps = [];

    protected function setUp(): void
    {
        $this->http = new FakeTransport;
        $this->sleeps = [];
    }

    /** @param  array<string, mixed>  $extra */
    private function client(array $extra = []): Client
    {
        return new Client('vpk_live_test', $extra + [
            'base_url' => 'https://pay.example.com',
            'transport' => $this->http,
            'sleeper' => function (float $s): void {
                $this->sleeps[] = $s;
            },
        ]);
    }

    public function test_base_url_gets_api_v1_appended_once_and_auth_headers_are_sent(): void
    {
        $this->http->push(200, ['object' => 'customer', 'id' => 'c1']);
        $res = $this->client(['merchant_id' => 'm-1'])->customers->retrieve('c 1/x');

        $this->assertSame('customer', $res['object']);
        $req = $this->http->requests[0];
        $this->assertSame('GET', $req['method']);
        $this->assertSame('https://pay.example.com/api/v1/customers/c%201%2Fx', $req['url']);
        $this->assertSame('Bearer vpk_live_test', $req['headers']['Authorization']);
        $this->assertSame('m-1', $req['headers']['X-Merchant-Id']);
        $this->assertArrayNotHasKey('Idempotency-Key', $req['headers']);

        $again = new Client('k', ['base_url' => 'https://pay.example.com/api/v1/', 'transport' => $this->http]);
        $this->http->push(200, []);
        $again->account->retrieveAccount();
        $this->assertSame('https://pay.example.com/api/v1/account', $this->http->requests[1]['url']);
    }

    public function test_missing_key_or_base_url_throws(): void
    {
        $this->expectException(VynexException::class);
        new Client('', ['base_url' => 'https://x']);
    }

    public function test_missing_base_url_throws(): void
    {
        putenv('VYNEX_BASE_URL');
        $this->expectException(VynexException::class);
        new Client('k');
    }

    public function test_post_gets_automatic_idempotency_key_and_json_body(): void
    {
        $this->http->push(201, ['object' => 'customer']);
        $this->client()->customers->create(['name' => 'Maria', 'cpf_cnpj' => '12345678909']);

        $req = $this->http->requests[0];
        $this->assertSame('POST', $req['method']);
        $this->assertSame('application/json', $req['headers']['Content-Type']);
        $this->assertMatchesRegularExpression('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $req['headers']['Idempotency-Key']);
        $this->assertSame(['name' => 'Maria', 'cpf_cnpj' => '12345678909'], $this->http->jsonBody());
    }

    public function test_explicit_idempotency_key_is_respected(): void
    {
        $this->http->push(201, []);
        $this->client()->transfers->create(['value' => 100, 'pix_address_key' => 'a@b.com', 'pix_address_key_type' => 'EMAIL'], ['idempotency_key' => 'my-key-1']);

        $this->assertSame('my-key-1', $this->http->requests[0]['headers']['Idempotency-Key']);
    }

    public function test_retry_reuses_same_idempotency_key_on_5xx_then_succeeds(): void
    {
        $this->http->push(502, ['error' => ['code' => 'provider_unavailable', 'message' => 'x']])->push(200, ['ok' => true]);
        $res = $this->client()->charges->create(['merchant_id' => 'm', 'amount' => 1000]);

        $this->assertTrue($res['ok']);
        $this->assertCount(2, $this->http->requests);
        $this->assertSame($this->http->requests[0]['headers']['Idempotency-Key'], $this->http->requests[1]['headers']['Idempotency-Key']);
        $this->assertCount(1, $this->sleeps);
    }

    public function test_429_honors_retry_after_header(): void
    {
        $this->http->push(429, ['error' => ['code' => 'rate_limited', 'message' => 'x']], ['Retry-After' => '3'])->push(200, []);
        $this->client()->customers->list();

        $this->assertSame([3.0], $this->sleeps);
    }

    public function test_exponential_backoff_and_exhaustion_throws_server_exception(): void
    {
        $this->http->push(503)->push(503)->push(503);
        try {
            $this->client()->customers->list();
            $this->fail('deveria lançar');
        } catch (ServerException $e) {
            $this->assertSame(503, $e->status);
        }

        $this->assertCount(3, $this->http->requests); // 1 + 2 retries
        $this->assertCount(2, $this->sleeps);
        $this->assertGreaterThanOrEqual(0.5, $this->sleeps[0]);
        $this->assertGreaterThanOrEqual(1.0, $this->sleeps[1]);
    }

    public function test_max_retries_zero_disables_retry(): void
    {
        $this->http->push(500);
        $this->expectException(ServerException::class);
        try {
            $this->client(['max_retries' => 0])->customers->list();
        } finally {
            $this->assertCount(1, $this->http->requests);
        }
    }

    public function test_501_is_never_retried(): void
    {
        $this->http->push(501, ['error' => ['code' => 'capability_not_supported', 'message' => 'x']]);
        $this->expectException(NotImplementedException::class);
        try {
            $this->client()->customers->list();
        } finally {
            $this->assertCount(1, $this->http->requests);
        }
    }

    public function test_504_is_retried_for_get_but_not_for_post(): void
    {
        $this->http->push(504)->push(200, []);
        $this->client()->customers->list();
        $this->assertCount(2, $this->http->requests);

        $this->http->requests = [];
        $this->http->push(504, ['error' => ['code' => 'provider_timeout', 'message' => 'x']]);
        try {
            $this->client()->transfers->create(['value' => 1]);
            $this->fail('deveria lançar');
        } catch (ServerException $e) {
            $this->assertSame('provider_timeout', $e->errorCode);
        }
        $this->assertCount(1, $this->http->requests);
    }

    public function test_4xx_other_than_429_is_not_retried(): void
    {
        $this->http->push(404, ['message' => 'Not Found']);
        $this->expectException(NotFoundException::class);
        try {
            $this->client()->customers->retrieve('nope');
        } finally {
            $this->assertCount(1, $this->http->requests);
        }
    }

    public function test_connection_error_is_retried_for_post_with_key_and_then_thrown(): void
    {
        $this->http->pushException()->push(200, ['ok' => 1]);
        $res = $this->client()->customers->create(['name' => 'x']);
        $this->assertSame(1, $res['ok']);

        $this->http->pushException()->pushException()->pushException();
        $this->expectException(ConnectionException::class);
        $this->client()->customers->list();
    }

    public function test_typed_exceptions_carry_code_status_and_request_id(): void
    {
        $cases = [
            [401, AuthenticationException::class, 'unauthenticated'],
            [403, PermissionException::class, 'insufficient_scope'],
            [404, NotFoundException::class, 'provider_rejected'],
            [409, ConflictException::class, 'idempotency_in_progress'],
            [422, ValidationException::class, 'idempotency_key_required'],
        ];
        foreach ($cases as [$status, $class, $code]) {
            $this->http->push($status, ['error' => ['code' => $code, 'message' => "msg {$code}", 'provider_code' => 'invalid_object']], ['X-Request-Id' => 'req_123']);
            try {
                $this->client()->customers->retrieve('x');
                $this->fail("deveria lançar {$class}");
            } catch (ApiException $e) {
                $this->assertInstanceOf($class, $e);
                $this->assertSame($status, $e->status);
                $this->assertSame($code, $e->errorCode);
                $this->assertSame("msg {$code}", $e->getMessage());
                $this->assertSame('req_123', $e->requestId);
                $this->assertSame('invalid_object', $e->providerCode);
            }
        }
    }

    public function test_laravel_validation_422_exposes_field_errors(): void
    {
        $this->http->push(422, ['message' => 'The name field is required.', 'errors' => ['name' => ['The name field is required.']]]);
        try {
            $this->client()->customers->create([]);
            $this->fail();
        } catch (ValidationException $e) {
            $this->assertSame('validation_error', $e->errorCode);
            $this->assertSame(['name' => ['The name field is required.']], $e->errors);
        }
    }

    public function test_rate_limit_exception_after_retries_exposes_retry_after(): void
    {
        $this->http->push(429, [], ['Retry-After' => '7']);
        try {
            $this->client(['max_retries' => 0])->customers->list();
            $this->fail();
        } catch (RateLimitException $e) {
            $this->assertSame(7, $e->retryAfter());
        }
    }

    public function test_query_string_encodes_booleans_and_skips_nulls(): void
    {
        $this->http->push(200, ['object' => 'list', 'data' => [], 'has_more' => false]);
        $this->client()->charges->list(['status' => 'PENDING', 'lean' => true, 'customer' => null, 'limit' => 5]);

        $this->assertSame('https://pay.example.com/api/v1/charges?status=PENDING&lean=true&limit=5', $this->http->requests[0]['url']);
    }

    public function test_auto_pagination_iterates_every_page(): void
    {
        $this->http
            ->push(200, ['object' => 'list', 'data' => [['id' => 'a'], ['id' => 'b']], 'has_more' => true, 'offset' => 0, 'limit' => 2])
            ->push(200, ['object' => 'list', 'data' => [['id' => 'c']], 'has_more' => false, 'offset' => 2, 'limit' => 2]);

        $ids = [];
        foreach ($this->client()->customers->listAll(['limit' => 2]) as $item) {
            $ids[] = $item['id'];
        }

        $this->assertSame(['a', 'b', 'c'], $ids);
        $this->assertStringContainsString('offset=0', $this->http->requests[0]['url']);
        $this->assertStringContainsString('offset=2', $this->http->requests[1]['url']);
    }

    public function test_pagination_stops_on_empty_page_even_if_has_more_is_true(): void
    {
        $this->http->push(200, ['object' => 'list', 'data' => [], 'has_more' => true]);
        $this->assertSame([], iterator_to_array($this->client()->customers->listAll(), false));
        $this->assertCount(1, $this->http->requests);
    }

    public function test_generated_resources_map_to_real_routes(): void
    {
        $c = $this->client();
        $this->http->push(200, [])->push(200, [])->push(200, [])->push(200, [])->push(200, []);

        $c->charges->refund('pay_1', ['value' => 500]);
        $c->charges->pixQrCode('pay_1');
        $c->webhooks->rotateSecret('wh_1');
        $c->documents->delete('doc_9');
        $c->balance->statement(['date_ge' => '2026-01-01']);

        $seen = array_map(fn ($r) => $r['method'].' '.parse_url($r['url'], PHP_URL_PATH), $this->http->requests);
        $this->assertSame([
            'POST /api/v1/charges/pay_1/refund',
            'GET /api/v1/charges/pay_1/pix-qr-code',
            'POST /api/v1/webhooks/endpoints/wh_1/rotate-secret',
            'DELETE /api/v1/documents/files/doc_9',
            'GET /api/v1/balance/statement',
        ], $seen);
    }

    public function test_every_generated_family_is_exposed_on_the_client(): void
    {
        $c = $this->client();
        foreach (['customers', 'charges', 'subscriptions', 'installments', 'paymentLinks', 'checkouts', 'cards', 'invoices', 'pix', 'transfers', 'balance', 'billPayments', 'topUps', 'anticipations', 'escrow', 'splits', 'subaccounts', 'documents', 'chargebacks', 'dunnings', 'creditBureau', 'webhooks', 'account'] as $family) {
            $this->assertIsObject($c->{$family}, $family);
        }
    }

    public function test_multipart_is_used_when_a_curl_file_is_present(): void
    {
        $this->http->push(201, []);
        $file = new \CURLFile(__FILE__, 'text/plain', 'a.txt');
        $this->client()->charges->createDocument('pay_1', ['type' => 'INVOICE', 'file' => $file]);

        $req = $this->http->requests[0];
        $this->assertIsArray($req['body']);
        $this->assertSame('INVOICE', $req['body']['type']);
        $this->assertInstanceOf(\CURLFile::class, $req['body']['file']);
        $this->assertArrayNotHasKey('Content-Type', $req['headers']);
    }
}
