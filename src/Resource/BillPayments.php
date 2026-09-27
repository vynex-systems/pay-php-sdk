<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Pagamento de contas/boletos. */
final class BillPayments extends AbstractResource
{
    /**
     * Listar bill payments.
     *
     * GET /bill-payments (escopo `bill_payments:read`).
     *
     * @param  array{status?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/bill-payments', $params, $options);
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
        return $this->client->paginate('/bill-payments', $params, $options);
    }

    /**
     * Criar bill payment.
     *
     * POST /bill-payments (escopo `bill_payments:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{identification_field: string, schedule_date?: string|null, description?: string|null, discount?: int|null, interest?: int|null, fine?: int|null, due_date?: string|null, value?: int|null, external_reference?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/bill-payments', $params, $options);
    }

    /**
     * Simular (bill payments).
     *
     * POST /bill-payments/simulate (escopo `bill_payments:read`).
     *
     * @param  array{identification_field?: string|null, bar_code?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function simulate(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/bill-payments/simulate', $params, $options);
    }

    /**
     * Consultar bill payment.
     *
     * GET /bill-payments/{id} (escopo `bill_payments:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/bill-payments/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar bill payment.
     *
     * POST /bill-payments/{id}/cancel (escopo `bill_payments:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancel(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/bill-payments/'.rawurlencode($id).'/cancel', $params, $options);
    }
}
