<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Tokenização de cartão e pré-autorização. */
final class Cards extends AbstractResource
{
    /**
     * Pre authorization config (cards).
     *
     * GET /cards/pre-authorization-config (escopo `cards:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function preAuthorizationConfig(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/cards/pre-authorization-config', $params, $options);
    }

    /**
     * Salvar pre authorization config (cards).
     *
     * PUT /cards/pre-authorization-config (escopo `cards:write`).
     *
     * @param  array{days_to_expire: int}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function savePreAuthorizationConfig(array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/cards/pre-authorization-config', $params, $options);
    }

    /**
     * Tokenizar (cards).
     *
     * POST /cards/tokenize (escopo `cards:write`).
     *
     * @param  array{customer: string, remote_ip: string, card: array<mixed>, holder_info?: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function tokenize(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/cards/tokenize', $params, $options);
    }
}
