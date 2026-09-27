<?php

declare(strict_types=1);

namespace Vynex\Pay\Http;

use Vynex\Pay\Exception\ConnectionException;

/** Transporte padrão em ext-curl puro (zero dependências). */
final class CurlTransport implements TransportInterface
{
    public function send(string $method, string $url, array $headers, string|array|null $body, float $timeout): array
    {
        $ch = curl_init();
        $lines = [];
        foreach ($headers as $name => $value) {
            $lines[] = $name.': '.$value;
        }

        $responseHeaders = [];
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $lines,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT_MS => (int) ($timeout * 1000),
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HEADERFUNCTION => static function ($ch, string $line) use (&$responseHeaders): int {
                $parts = explode(':', $line, 2);
                if (count($parts) === 2) {
                    $responseHeaders[strtolower(trim($parts[0]))] = trim($parts[1]);
                }

                return strlen($line);
            },
        ]);

        if ($body !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }

        $raw = curl_exec($ch);

        if ($raw === false) {
            $message = curl_error($ch);
            $errno = curl_errno($ch);
            curl_close($ch);

            throw new ConnectionException("Falha de conexão com a API ({$errno}): {$message}", $errno);
        }

        $status = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return ['status' => $status, 'headers' => $responseHeaders, 'body' => (string) $raw];
    }
}
