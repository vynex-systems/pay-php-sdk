<?php

declare(strict_types=1);

namespace Vynex\Pay\Tests;

use Vynex\Pay\Exception\ConnectionException;
use Vynex\Pay\Http\TransportInterface;

/** Transporte fake: devolve respostas enfileiradas e registra as requisições. */
final class FakeTransport implements TransportInterface
{
    /** @var array<int, array{method: string, url: string, headers: array<string, string>, body: string|array<string, mixed>|null, timeout: float}> */
    public array $requests = [];

    /** @var array<int, array{status: int, headers: array<string, string>, body: string}|\Throwable> */
    private array $queue = [];

    /**
     * @param  array<string, mixed>|string  $body
     * @param  array<string, string>  $headers
     */
    public function push(int $status, array|string $body = [], array $headers = []): self
    {
        $this->queue[] = ['status' => $status, 'headers' => array_change_key_case($headers, CASE_LOWER), 'body' => is_string($body) ? $body : json_encode($body)];

        return $this;
    }

    public function pushException(?\Throwable $e = null): self
    {
        $this->queue[] = $e ?? new ConnectionException('boom');

        return $this;
    }

    public function send(string $method, string $url, array $headers, string|array|null $body, float $timeout): array
    {
        $this->requests[] = compact('method', 'url', 'headers', 'body', 'timeout');
        $next = array_shift($this->queue) ?? throw new \LogicException('FakeTransport: fila vazia (requisição inesperada).');

        if ($next instanceof \Throwable) {
            throw $next;
        }

        return $next;
    }

    /** @return array<string, mixed> */
    public function jsonBody(int $index = 0): array
    {
        return json_decode((string) $this->requests[$index]['body'], true);
    }
}
