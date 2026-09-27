<?php

declare(strict_types=1);

namespace Vynex\Pay\Http;

use Vynex\Pay\Exception\ConnectionException;

/**
 * Camada de transporte HTTP. A implementação padrão é CurlTransport; testes usam um transporte fake.
 */
interface TransportInterface
{
    /**
     * @param  array<string, string>  $headers  nome => valor
     * @param  string|array<string, mixed>|null  $body  string (JSON) ou array plano (multipart, com CURLFile)
     * @return array{status: int, headers: array<string, string>, body: string}  headers com chaves em minúsculas
     *
     * @throws ConnectionException falha de rede/timeout
     */
    public function send(string $method, string $url, array $headers, string|array|null $body, float $timeout): array;
}
