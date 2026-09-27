<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** 429: limite de 120 req/min por chave (ou do provedor). Ver retryAfter(). */
class RateLimitException extends ApiException
{
    /** Segundos sugeridos pelo header Retry-After, ou null. */
    public function retryAfter(): ?int
    {
        $v = $this->headers['retry-after'] ?? null;

        return $v !== null && ctype_digit(trim($v)) ? (int) $v : null;
    }
}
