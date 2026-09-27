<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Negativação/recuperação de dívida. */
final class Dunnings extends AbstractResource
{
    /**
     * Listar dunnings.
     *
     * GET /dunnings (escopo `dunnings:read`).
     *
     * @param  array{status?: string, type?: string, payment?: string, request_start_date?: string, request_end_date?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/dunnings', $params, $options);
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
        return $this->client->paginate('/dunnings', $params, $options);
    }

    /**
     * Criar dunning.
     *
     * POST /dunnings (escopo `dunnings:write`).
     *
     * @param  array{payment: string, type?: string|null, description?: string|null, customer_name: string, customer_cpf_cnpj: string, customer_primary_phone: string, customer_secondary_phone?: string|null, customer_postal_code: string, customer_address: string, customer_address_number: string, customer_complement?: string|null, customer_province: string, documents?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/dunnings', $params, $options);
    }

    /**
     * Available (dunnings).
     *
     * GET /dunnings/available-payments (escopo `dunnings:read`).
     *
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function available(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/dunnings/available-payments', $params, $options);
    }

    /**
     * Itera TODOS os itens de `available` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function availableAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/dunnings/available-payments', $params, $options);
    }

    /**
     * Simular (dunnings).
     *
     * GET /dunnings/simulation (escopo `dunnings:read`).
     *
     * @param  array{payment: string}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function simulate(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/dunnings/simulation', $params, $options);
    }

    /**
     * Consultar dunning.
     *
     * GET /dunnings/{id} (escopo `dunnings:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/dunnings/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar dunning.
     *
     * POST /dunnings/{id}/cancel (escopo `dunnings:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancel(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/dunnings/'.rawurlencode($id).'/cancel', $params, $options);
    }

    /**
     * Reenviar documents (dunnings).
     *
     * POST /dunnings/{id}/documents (escopo `dunnings:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{documents: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function resendDocuments(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/dunnings/'.rawurlencode($id).'/documents', $params, $options);
    }

    /**
     * History (dunnings).
     *
     * GET /dunnings/{id}/history (escopo `dunnings:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function history(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/dunnings/'.rawurlencode($id).'/history', $params, $options);
    }

    /**
     * Itera TODOS os itens de `history` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function historyAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/dunnings/'.rawurlencode($id).'/history', $params, $options);
    }

    /**
     * Partial payments (dunnings).
     *
     * GET /dunnings/{id}/partial-payments (escopo `dunnings:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function partialPayments(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/dunnings/'.rawurlencode($id).'/partial-payments', $params, $options);
    }

    /**
     * Itera TODOS os itens de `partialPayments` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function partialPaymentsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/dunnings/'.rawurlencode($id).'/partial-payments', $params, $options);
    }
}
