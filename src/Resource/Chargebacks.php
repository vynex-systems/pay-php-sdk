<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Chargebacks e disputas. */
final class Chargebacks extends AbstractResource
{
    /**
     * Listar chargebacks.
     *
     * GET /chargebacks (escopo `chargebacks:read`).
     *
     * @param  array{status?: string, credit_card_brand?: string, origin_dispute_date_ge?: string, origin_dispute_date_le?: string, origin_transaction_date_ge?: string, origin_transaction_date_le?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/chargebacks', $params, $options);
    }

    /**
     * Itera TODOS os itens de `list` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function listAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/chargebacks', $params, $options);
    }

    /**
     * By payment (chargebacks).
     *
     * GET /chargebacks/by-payment/{paymentId} (escopo `chargebacks:read`).
     *
     * @param  string  $paymentId  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function byPayment(string $paymentId, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/chargebacks/by-payment/'.rawurlencode($paymentId), $params, $options);
    }

    /**
     * Dispute (chargebacks).
     *
     * POST /chargebacks/{id}/dispute (escopo `chargebacks:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{files: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function dispute(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/chargebacks/'.rawurlencode($id).'/dispute', $params, $options);
    }
}
