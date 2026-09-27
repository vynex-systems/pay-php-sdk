<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/**
 * Resposta de erro da API (status HTTP fora de 2xx).
 *
 * `errorCode` vem de `error.code` (ex.: insufficient_scope, idempotency_key_required);
 * erros de validação do Laravel (422 sem envelope) ficam com errorCode "validation_error" e `errors`.
 */
class ApiException extends VynexException
{
    /**
     * @param  array<string, mixed>|null  $body  corpo decodificado da resposta
     * @param  array<string, array<int, string>>  $errors  erros de validação por campo (422)
     * @param  array<string, string>  $headers  headers da resposta (chaves em minúsculas)
     */
    public function __construct(
        string $message,
        public readonly int $status,
        public readonly ?string $errorCode = null,
        public readonly ?string $requestId = null,
        public readonly ?array $body = null,
        public readonly array $errors = [],
        public readonly array $headers = [],
        public readonly ?string $providerCode = null,
    ) {
        parent::__construct($message, $status);
    }

    /** Alias de $errorCode (código do envelope {error:{code}}). */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * Escolhe a subclasse pelo status HTTP.
     *
     * @param  array<string, mixed>|null  $body
     * @param  array<string, string>  $headers
     */
    public static function fromResponse(int $status, ?array $body, array $headers): self
    {
        $error = is_array($body['error'] ?? null) ? $body['error'] : null;
        $code = is_string($error['code'] ?? null) ? $error['code'] : null;
        $message = is_string($error['message'] ?? null) ? $error['message'] : (is_string($body['message'] ?? null) ? $body['message'] : "HTTP {$status}");
        $errors = is_array($body['errors'] ?? null) ? $body['errors'] : [];
        $providerCode = is_string($error['provider_code'] ?? null) ? $error['provider_code'] : null;
        $requestId = $headers['x-request-id'] ?? $headers['request-id'] ?? null;

        if ($code === null && $errors !== []) {
            $code = 'validation_error';
        }

        $class = match (true) {
            $status === 401 => AuthenticationException::class,
            $status === 403 => PermissionException::class,
            $status === 404 => NotFoundException::class,
            $status === 409 => ConflictException::class,
            $status === 422 => ValidationException::class,
            $status === 429 => RateLimitException::class,
            $status === 501 => NotImplementedException::class,
            $status >= 500 => ServerException::class,
            default => self::class,
        };

        return new $class($message, $status, $code, $requestId, $body, $errors, $headers, $providerCode);
    }
}
