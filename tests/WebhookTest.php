<?php

declare(strict_types=1);

namespace Vynex\Pay\Tests;

use PHPUnit\Framework\TestCase;
use Vynex\Pay\Exception\SignatureVerificationException;
use Vynex\Pay\Webhook;

final class WebhookTest extends TestCase
{
    private const SECRET = 'whsec_test_secret';

    private const BODY = '{"id":"evt_1","object":"event","type":"charge.paid","data":{"object":{"id":"pay_1","amount":1000}}}';

    public function test_valid_signature_passes(): void
    {
        $now = 1_800_000_000;
        $header = Webhook::sign(self::BODY, self::SECRET, $now);

        $this->assertTrue(Webhook::verify(self::BODY, $header, self::SECRET, 300, $now));
        $this->assertTrue(Webhook::verify(self::BODY, $header, self::SECRET, 300, $now + 299));
    }

    public function test_tampered_body_or_wrong_secret_fails(): void
    {
        $now = 1_800_000_000;
        $header = Webhook::sign(self::BODY, self::SECRET, $now);

        $this->assertFalse(Webhook::verify(self::BODY.' ', $header, self::SECRET, 300, $now));
        $this->assertFalse(Webhook::verify(self::BODY, $header, 'other', 300, $now));
    }

    public function test_outside_tolerance_fails_unless_disabled(): void
    {
        $now = 1_800_000_000;
        $header = Webhook::sign(self::BODY, self::SECRET, $now);

        $this->assertFalse(Webhook::verify(self::BODY, $header, self::SECRET, 300, $now + 301));
        $this->assertFalse(Webhook::verify(self::BODY, $header, self::SECRET, 300, $now - 301));
        $this->assertTrue(Webhook::verify(self::BODY, $header, self::SECRET, 0, $now + 99999));
    }

    public function test_malformed_headers_fail(): void
    {
        foreach ([null, '', 'garbage', 't=abc,v1=ff', 't=1800000000', 'v1=abcd'] as $bad) {
            $this->assertFalse(Webhook::verify(self::BODY, $bad, self::SECRET, 0), (string) $bad);
        }
        $this->assertFalse(Webhook::verify(self::BODY, Webhook::sign(self::BODY, self::SECRET), '', 0));
    }

    public function test_multiple_v1_signatures_accept_any_match(): void
    {
        $now = 1_800_000_000;
        $good = Webhook::sign(self::BODY, self::SECRET, $now);
        $header = 't='.$now.',v1=deadbeef,'.substr($good, strpos($good, 'v1='));

        $this->assertTrue(Webhook::verify(self::BODY, $header, self::SECRET, 300, $now));
    }

    public function test_construct_event_returns_decoded_payload_or_throws(): void
    {
        $now = time();
        $event = Webhook::constructEvent(self::BODY, Webhook::sign(self::BODY, self::SECRET, $now), self::SECRET);
        $this->assertSame('charge.paid', $event['type']);
        $this->assertSame(1000, $event['data']['object']['amount']);

        $this->expectException(SignatureVerificationException::class);
        Webhook::constructEvent(self::BODY, 't=1,v1=00', self::SECRET);
    }

    /** Compatibilidade byte a byte com o emissor real (App\Services\Webhooks\WebhookSignature), quando o SDK roda dentro do app. */
    public function test_matches_the_server_side_signer_when_available(): void
    {
        $class = '\\App\\Services\\Webhooks\\WebhookSignature';
        if (! class_exists($class)) {
            $this->markTestSkipped('App do servidor não carregado (SDK standalone).');
        }

        $header = $class::sign(self::BODY, self::SECRET, 1_800_000_000);
        $this->assertSame($header, Webhook::sign(self::BODY, self::SECRET, 1_800_000_000));
        $this->assertTrue(Webhook::verify(self::BODY, $header, self::SECRET, 300, 1_800_000_010));
    }
}
