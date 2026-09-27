<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Splits pagos e recebidos. */
final class Splits extends AbstractResource
{
    /**
     * Paid (splits).
     *
     * GET /splits/paid (escopo `splits:read`).
     *
     * @param  array{payment_id?: string|null, status?: string|null, payment_confirmed_date_ge?: string|null, payment_confirmed_date_le?: string|null, credit_date_ge?: string|null, credit_date_le?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function paid(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/splits/paid', $params, $options);
    }

    /**
     * Itera TODOS os itens de `paid` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function paidAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/splits/paid', $params, $options);
    }

    /**
     * Consultar paid (splits).
     *
     * GET /splits/paid/{id} (escopo `splits:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrievePaid(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/splits/paid/'.rawurlencode($id), $params, $options);
    }

    /**
     * Received (splits).
     *
     * GET /splits/received (escopo `splits:read`).
     *
     * @param  array{payment_id?: string|null, status?: string|null, payment_confirmed_date_ge?: string|null, payment_confirmed_date_le?: string|null, credit_date_ge?: string|null, credit_date_le?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function received(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/splits/received', $params, $options);
    }

    /**
     * Itera TODOS os itens de `received` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function receivedAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/splits/received', $params, $options);
    }

    /**
     * Consultar received (splits).
     *
     * GET /splits/received/{id} (escopo `splits:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveReceived(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/splits/received/'.rawurlencode($id), $params, $options);
    }
}
