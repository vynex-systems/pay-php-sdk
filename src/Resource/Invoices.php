<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Notas fiscais de serviço. */
final class Invoices extends AbstractResource
{
    /**
     * Listar invoices.
     *
     * GET /invoices (escopo `invoices:read`).
     *
     * @param  array{effective_date_ge?: string, effective_date_le?: string, payment?: string, installment?: string, external_reference?: string, status?: string, customer?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/invoices', $params, $options);
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
        return $this->client->paginate('/invoices', $params, $options);
    }

    /**
     * Criar invoice.
     *
     * POST /invoices (escopo `invoices:write`).
     *
     * @param  array{payment?: string|null, installment?: string|null, customer?: string|null, municipal_service_id?: string|null, municipal_service_code?: string|null, municipal_service_name?: string|null, value: int, effective_date: string, service_description?: string|null, observations?: string|null, external_reference?: string|null, deductions?: int|null, taxes?: array<mixed>|null, update_payment?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/invoices', $params, $options);
    }

    /**
     * Consultar invoice.
     *
     * GET /invoices/{id} (escopo `invoices:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/invoices/'.rawurlencode($id), $params, $options);
    }

    /**
     * Atualizar invoice.
     *
     * PUT /invoices/{id} (escopo `invoices:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{value?: int, effective_date?: string, update_payment?: bool, service_description?: string|null, observations?: string|null, external_reference?: string|null, deductions?: int|null, taxes?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function update(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/invoices/'.rawurlencode($id), $params, $options);
    }

    /**
     * Autorizar (invoices).
     *
     * POST /invoices/{id}/authorize (escopo `invoices:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function authorize(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/invoices/'.rawurlencode($id).'/authorize', $params, $options);
    }

    /**
     * Cancelar invoice.
     *
     * POST /invoices/{id}/cancel (escopo `invoices:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{cancel_only_on_provider?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancel(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/invoices/'.rawurlencode($id).'/cancel', $params, $options);
    }
}
