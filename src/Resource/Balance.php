<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Saldo, extrato e estatísticas. */
final class Balance extends AbstractResource
{
    /**
     * Consultar balance.
     *
     * GET /balance (escopo `balance:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/balance', $params, $options);
    }

    /**
     * Statement (balance).
     *
     * GET /balance/statement (escopo `balance:read`).
     *
     * @param  array{start_date?: string|null, finish_date?: string|null, order?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function statement(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/balance/statement', $params, $options);
    }

    /**
     * Itera TODOS os itens de `statement` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function statementAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/balance/statement', $params, $options);
    }

    /**
     * Payment statistics (balance).
     *
     * GET /balance/statistics/payments (escopo `balance:read`).
     *
     * @param  array{customer?: string|null, billing_type?: string|null, status?: string|null, anticipated?: bool|null, date_created_ge?: string|null, date_created_le?: string|null, due_date_ge?: string|null, due_date_le?: string|null, estimated_credit_date_ge?: string|null, estimated_credit_date_le?: string|null, external_reference?: string|null}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function paymentStatistics(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/balance/statistics/payments', $params, $options);
    }

    /**
     * Split statistics (balance).
     *
     * GET /balance/statistics/splits (escopo `balance:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function splitStatistics(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/balance/statistics/splits', $params, $options);
    }
}
