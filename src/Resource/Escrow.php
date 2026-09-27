<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Custódia (escrow). */
final class Escrow extends AbstractResource
{
    /**
     * Default config (escrow).
     *
     * GET /escrow/config (escopo `escrow:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function defaultConfig(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/escrow/config', $params, $options);
    }

    /**
     * Salvar default config (escrow).
     *
     * PUT /escrow/config (escopo `escrow:write`).
     *
     * @param  array{days_to_expire: int, enabled?: bool|null, is_fee_payer?: bool|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function saveDefaultConfig(array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/escrow/config', $params, $options);
    }

    /**
     * Account config (escrow).
     *
     * GET /escrow/config/accounts/{accountId} (escopo `escrow:read`).
     *
     * @param  string  $accountId  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function accountConfig(string $accountId, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/escrow/config/accounts/'.rawurlencode($accountId), $params, $options);
    }

    /**
     * Salvar account config (escrow).
     *
     * PUT /escrow/config/accounts/{accountId} (escopo `escrow:write`).
     *
     * @param  string  $accountId  parâmetro de caminho
     * @param  array{days_to_expire: int, enabled?: bool|null, is_fee_payer?: bool|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function saveAccountConfig(string $accountId, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/escrow/config/accounts/'.rawurlencode($accountId), $params, $options);
    }

    /**
     * Payment escrow (escrow).
     *
     * GET /escrow/payments/{paymentId} (escopo `escrow:read`).
     *
     * @param  string  $paymentId  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function paymentEscrow(string $paymentId, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/escrow/payments/'.rawurlencode($paymentId), $params, $options);
    }

    /**
     * Finalizar (escrow).
     *
     * POST /escrow/{escrowId}/finish (escopo `escrow:write`).
     *
     * @param  string  $escrowId  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function finish(string $escrowId, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/escrow/'.rawurlencode($escrowId).'/finish', $params, $options);
    }
}
