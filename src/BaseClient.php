<?php

declare(strict_types=1);

namespace Vynex\Pay;

use Vynex\Pay\Exception\ApiException;
use Vynex\Pay\Exception\ConnectionException;
use Vynex\Pay\Exception\VynexException;
use Vynex\Pay\Http\CurlTransport;
use Vynex\Pay\Http\TransportInterface;

/**
 * Núcleo HTTP: autenticação, Idempotency-Key automática em POST, retry com backoff
 * (429 e 5xx), erros tipados e paginação automática. `Client` (gerado) adiciona os recursos.
 *
 * Opções do construtor:
 *   base_url (ou env VYNEX_BASE_URL), merchant_id, max_retries (padrão 2), timeout (s, padrão 60),
 *   transport (TransportInterface), sleeper (callable(float $segundos)), user_agent.
 *
 * Opções por chamada ($options): idempotency_key, merchant_id, headers, timeout, max_retries.
 */
abstract class BaseClient
{
    public const VERSION = '1.0.0';

    private string $baseUrl;

    private TransportInterface $transport;

    /** @var callable(float): void */
    private $sleeper;

    private int $maxRetries;

    private float $timeout;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(private readonly string $apiKey, array $options = [])
    {
        if ($apiKey === '') {
            throw new VynexException('apiKey é obrigatória (Bearer vpk_live_...).');
        }

        $base = (string) ($options['base_url'] ?? getenv('VYNEX_BASE_URL') ?: '');
        if ($base === '') {
            throw new VynexException('Informe base_url (ex.: https://pay.suaempresa.com) ou a variável VYNEX_BASE_URL.');
        }
        $base = rtrim($base, '/');
        $this->baseUrl = str_ends_with($base, '/api/v1') ? $base : $base.'/api/v1';

        $this->options = $options;
        $this->transport = $options['transport'] ?? new CurlTransport;
        $this->sleeper = $options['sleeper'] ?? static function (float $seconds): void {
            usleep((int) ($seconds * 1_000_000));
        };
        $this->maxRetries = max(0, (int) ($options['max_retries'] ?? 2));
        $this->timeout = (float) ($options['timeout'] ?? 60);
    }

    /** @var array<string, mixed> */
    private array $options = [];

    /**
     * @param  array<string, mixed>  $params  GET/DELETE: query string; demais: corpo JSON (ou multipart se houver CURLFile)
     * @param  array<string, mixed>  $options  ver descrição da classe
     * @return array<string, mixed>
     */
    public function request(string $method, string $path, array $params = [], array $options = []): array
    {
        $method = strtoupper($method);
        $url = $this->baseUrl.$path;
        $headers = [
            'Authorization' => 'Bearer '.$this->apiKey,
            'Accept' => 'application/json',
            'User-Agent' => (string) ($this->options['user_agent'] ?? 'vynex-pay-php/'.self::VERSION),
        ];

        $merchant = $options['merchant_id'] ?? $this->options['merchant_id'] ?? null;
        if ($merchant !== null && $merchant !== '') {
            $headers['X-Merchant-Id'] = (string) $merchant;
        }

        $idempotencyKey = $options['idempotency_key'] ?? null;
        if ($idempotencyKey === null && $method === 'POST') {
            $idempotencyKey = self::uuid(); // gerada UMA vez e reutilizada em todos os retries
        }
        if ($idempotencyKey !== null) {
            $headers['Idempotency-Key'] = (string) $idempotencyKey;
        }

        $body = null;
        if (in_array($method, ['GET', 'DELETE'], true)) {
            $query = self::buildQuery($params);
            if ($query !== '') {
                $url .= '?'.$query;
            }
        } elseif ($params !== []) {
            if (self::hasFile($params)) {
                $body = self::flatten($params); // curl monta multipart/form-data
            } else {
                $headers['Content-Type'] = 'application/json';
                $body = json_encode($params, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
            }
        } elseif ($method !== 'DELETE') {
            $headers['Content-Type'] = 'application/json';
            $body = '{}';
        }

        foreach ((array) ($options['headers'] ?? []) as $name => $value) {
            $headers[(string) $name] = (string) $value;
        }

        $maxRetries = max(0, (int) ($options['max_retries'] ?? $this->maxRetries));
        $timeout = (float) ($options['timeout'] ?? $this->timeout);
        $attempt = 0;

        while (true) {
            try {
                $response = $this->transport->send($method, $url, $headers, $body, $timeout);
            } catch (ConnectionException $e) {
                // Sem resposta: só repete o que é seguro (idempotente por HTTP ou com Idempotency-Key).
                if ($attempt < $maxRetries && (! in_array($method, ['POST', 'PATCH'], true) || $idempotencyKey !== null)) {
                    $this->pause($attempt++, null);

                    continue;
                }

                throw $e;
            }

            $status = $response['status'];

            if ($status >= 200 && $status < 300) {
                return self::decode($response['body']) ?? [];
            }

            if ($attempt < $maxRetries && self::shouldRetry($method, $status)) {
                $this->pause($attempt++, $response['headers']['retry-after'] ?? null);

                continue;
            }

            throw ApiException::fromResponse($status, self::decode($response['body']), $response['headers']);
        }
    }

    /**
     * Itera todos os itens de uma listagem ({object:list,data,has_more}) avançando `offset`.
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function paginate(string $path, array $params = [], array $options = []): \Generator
    {
        $offset = (int) ($params['offset'] ?? 0);
        $params['limit'] ??= 100;

        while (true) {
            $page = $this->request('GET', $path, ['offset' => $offset] + $params, $options);
            $data = is_array($page['data'] ?? null) ? $page['data'] : [];

            foreach ($data as $item) {
                yield $item;
            }

            if (($page['has_more'] ?? false) !== true || $data === []) {
                return;
            }

            $offset += count($data);
        }
    }

    private static function shouldRetry(string $method, int $status): bool
    {
        if ($status === 429) {
            return true;
        }
        if ($status === 501 || $status < 500) {
            return false;
        }
        // 504 provider_timeout: resultado desconhecido — só repete leituras.
        if ($status === 504) {
            return $method === 'GET';
        }

        return true;
    }

    private function pause(int $attempt, ?string $retryAfter): void
    {
        if ($retryAfter !== null && ctype_digit(trim($retryAfter))) {
            $delay = min((float) $retryAfter, 30.0);
        } else {
            $delay = min(0.5 * (2 ** $attempt), 8.0);
            $delay += $delay * 0.25 * (mt_rand(0, 1000) / 1000); // jitter
        }

        ($this->sleeper)($delay);
    }

    /** @return array<string, mixed>|null */
    private static function decode(string $raw): ?array
    {
        if (trim($raw) === '') {
            return null;
        }
        $data = json_decode($raw, true);

        return is_array($data) ? $data : null;
    }

    /** @param  array<string, mixed>  $params */
    private static function buildQuery(array $params): string
    {
        $clean = [];
        foreach ($params as $k => $v) {
            if ($v === null) {
                continue;
            }
            $clean[$k] = is_bool($v) ? ($v ? 'true' : 'false') : $v;
        }

        return http_build_query($clean, '', '&', PHP_QUERY_RFC3986);
    }

    /** @param  array<string, mixed>  $params */
    private static function hasFile(array $params): bool
    {
        foreach ($params as $v) {
            if ($v instanceof \CURLFile || (is_array($v) && self::hasFile($v))) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    private static function flatten(array $params, string $prefix = ''): array
    {
        $out = [];
        foreach ($params as $k => $v) {
            $key = $prefix === '' ? (string) $k : "{$prefix}[{$k}]";
            if (is_array($v)) {
                $out += self::flatten($v, $key);
            } elseif (is_bool($v)) {
                $out[$key] = $v ? 'true' : 'false';
            } elseif ($v !== null) {
                $out[$key] = $v;
            }
        }

        return $out;
    }

    private static function uuid(): string
    {
        $b = random_bytes(16);
        $b[6] = chr((ord($b[6]) & 0x0F) | 0x40);
        $b[8] = chr((ord($b[8]) & 0x3F) | 0x80);
        $h = bin2hex($b);

        return sprintf('%s-%s-%s-%s-%s', substr($h, 0, 8), substr($h, 8, 4), substr($h, 12, 4), substr($h, 16, 4), substr($h, 20));
    }
}
