<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Parcelamentos. */
final class Installments extends AbstractResource
{
    /**
     * Listar installments.
     *
     * GET /installments (escopo `installments:read`).
     *
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/installments', $params, $options);
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
        return $this->client->paginate('/installments', $params, $options);
    }

    /**
     * Criar installment.
     *
     * POST /installments (escopo `installments:write`).
     *
     * @param  array{installment_count: int, customer: string, billing_type: string, due_date: string, installment_value?: int, total_value?: int, description?: string|null, postal_service?: bool, days_after_due_date_to_registration_cancellation?: int|null, payment_external_reference?: string|null, discount?: array<mixed>|null, interest?: array<mixed>|null, fine?: array<mixed>|null, splits?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/installments', $params, $options);
    }

    /**
     * Criar with credit card (installments).
     *
     * POST /installments/with-credit-card (escopo `installments:write`).
     *
     * @param  array{installment_count: int, customer: string, billing_type: string, due_date: string, installment_value?: int, total_value?: int, description?: string|null, postal_service?: bool, days_after_due_date_to_registration_cancellation?: int|null, payment_external_reference?: string|null, discount?: array<mixed>|null, interest?: array<mixed>|null, fine?: array<mixed>|null, splits?: array<mixed>|null, remote_ip: string, credit_card_token?: string|null, authorize_only?: bool, three_d_secure?: array<mixed>|null, device_info?: array<mixed>|null, credit_card?: array<mixed>, credit_card_holder_info?: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createWithCreditCard(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/installments/with-credit-card', $params, $options);
    }

    /**
     * Remover installment.
     *
     * DELETE /installments/{id} (escopo `installments:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function delete(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/installments/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar installment.
     *
     * GET /installments/{id} (escopo `installments:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/installments/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar pending payments (installments).
     *
     * POST /installments/{id}/cancel-pending-payments (escopo `installments:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancelPendingPayments(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/installments/'.rawurlencode($id).'/cancel-pending-payments', $params, $options);
    }

    /**
     * Payment book (installments).
     *
     * GET /installments/{id}/payment-book (escopo `installments:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{sort?: string, order?: string}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function paymentBook(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/installments/'.rawurlencode($id).'/payment-book', $params, $options);
    }

    /**
     * Payments (installments).
     *
     * GET /installments/{id}/payments (escopo `installments:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{status?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function payments(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/installments/'.rawurlencode($id).'/payments', $params, $options);
    }

    /**
     * Itera TODOS os itens de `payments` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function paymentsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/installments/'.rawurlencode($id).'/payments', $params, $options);
    }

    /**
     * Estornar installment.
     *
     * POST /installments/{id}/refund (escopo `installments:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{value?: int|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function refund(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/installments/'.rawurlencode($id).'/refund', $params, $options);
    }

    /**
     * Atualizar splits (installments).
     *
     * PUT /installments/{id}/splits (escopo `installments:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{splits: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateSplits(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/installments/'.rawurlencode($id).'/splits', $params, $options);
    }
}
