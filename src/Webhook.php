<?php

declare(strict_types=1);

namespace Vynex\Pay;

use Vynex\Pay\Exception\SignatureVerificationException;

/**
 * Verificação de webhooks de saída da Vynex Pay.
 *
 * Header:  X-Vynex-Signature: t=<unix>,v1=<hex hmac>
 * Digest:  HMAC-SHA256(secret, "<t>.<corpo bruto>")
 *
 * Use SEMPRE o corpo bruto (antes de qualquer json_decode).
 */
final class Webhook
{
    public const HEADER = 'X-Vynex-Signature';

    public const DEFAULT_TOLERANCE = 300;

    /**
     * @param  int  $tolerance  segundos aceitos de diferença de relógio/replay; 0 desliga a checagem de tempo
     * @param  int|null  $now  injeção de relógio (testes)
     */
    public static function verify(string $payload, ?string $header, string $secret, int $tolerance = self::DEFAULT_TOLERANCE, ?int $now = null): bool
    {
        if ($header === null || $header === '' || $secret === '') {
            return false;
        }

        $timestamp = null;
        $signatures = [];
        foreach (explode(',', $header) as $part) {
            [$key, $value] = array_pad(explode('=', trim($part), 2), 2, '');
            if ($key === 't' && ctype_digit($value)) {
                $timestamp = (int) $value;
            } elseif ($key === 'v1' && $value !== '') {
                $signatures[] = $value;
            }
        }

        if ($timestamp === null || $signatures === []) {
            return false;
        }

        if ($tolerance > 0 && abs(($now ?? time()) - $timestamp) > $tolerance) {
            return false;
        }

        $expected = hash_hmac('sha256', $timestamp.'.'.$payload, $secret);
        foreach ($signatures as $candidate) {
            if (hash_equals($expected, $candidate)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verifica e devolve o evento decodificado; lança SignatureVerificationException se inválido.
     *
     * @return array<string, mixed>
     */
    public static function constructEvent(string $payload, ?string $header, string $secret, int $tolerance = self::DEFAULT_TOLERANCE, ?int $now = null): array
    {
        if (! self::verify($payload, $header, $secret, $tolerance, $now)) {
            throw new SignatureVerificationException('Assinatura de webhook inválida, ausente ou fora da tolerância.');
        }

        $event = json_decode($payload, true);
        if (! is_array($event)) {
            throw new SignatureVerificationException('Corpo do webhook não é JSON válido.');
        }

        return $event;
    }

    /** Gera o header (útil em testes e simuladores). */
    public static function sign(string $payload, string $secret, ?int $timestamp = null): string
    {
        $timestamp ??= time();

        return "t={$timestamp},v1=".hash_hmac('sha256', $timestamp.'.'.$payload, $secret);
    }
}
