<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Transferências (Pix/TED/internas). Exigem Idempotency-Key. */
final class Transfers extends AbstractResource
{
    /**
     * Listar transfers.
     *
     * GET /transfers (escopo `transfers:read`).
     *
     * @param  array{date_created_ge?: string|null, date_created_le?: string|null, transfer_date_ge?: string|null, transfer_date_le?: string|null, type?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/transfers', $params, $options);
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
        return $this->client->paginate('/transfers', $params, $options);
    }

    /**
     * Criar transfer.
     *
     * POST /transfers (escopo `transfers:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{value: int, operation_type?: string|null, pix_address_key?: string, pix_address_key_type?: string, bank_account?: array<mixed>, description?: string|null, schedule_date?: string|null, external_reference?: string|null, recurring?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/transfers', $params, $options);
    }

    /**
     * Criar internal (transfers).
     *
     * POST /transfers/internal (escopo `transfers:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{value: int, wallet_id: string, external_reference?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createInternal(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/transfers/internal', $params, $options);
    }

    /**
     * Consultar transfer.
     *
     * GET /transfers/{id} (escopo `transfers:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/transfers/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar transfer.
     *
     * POST /transfers/{id}/cancel (escopo `transfers:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancel(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/transfers/'.rawurlencode($id).'/cancel', $params, $options);
    }
}
