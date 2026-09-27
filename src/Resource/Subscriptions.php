<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Assinaturas. */
final class Subscriptions extends AbstractResource
{
    /**
     * Listar subscriptions.
     *
     * GET /subscriptions (escopo `subscriptions:read`).
     *
     * @param  array{customer?: string, customer_group_name?: string, billing_type?: string, status?: string, deleted_only?: string, include_deleted?: string, external_reference?: string, order?: string, sort?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subscriptions', $params, $options);
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
        return $this->client->paginate('/subscriptions', $params, $options);
    }

    /**
     * Criar subscription.
     *
     * POST /subscriptions (escopo `subscriptions:write`).
     *
     * @param  array{customer: string, billing_type: string, value: int, next_due_date: string, cycle: string, description?: string|null, end_date?: string|null, max_payments?: int|null, external_reference?: string|null, discount?: array<mixed>|null, interest?: array<mixed>|null, fine?: array<mixed>|null, split?: array<mixed>|null, callback?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/subscriptions', $params, $options);
    }

    /**
     * Criar with credit card (subscriptions).
     *
     * POST /subscriptions/with-credit-card (escopo `subscriptions:write`).
     *
     * @param  array{customer: string, billing_type: string, value: int, next_due_date: string, cycle: string, description?: string|null, end_date?: string|null, max_payments?: int|null, external_reference?: string|null, discount?: array<mixed>|null, interest?: array<mixed>|null, fine?: array<mixed>|null, split?: array<mixed>|null, callback?: array<mixed>|null, remote_ip: string, credit_card_token?: string|null, authorize_only?: bool, three_d_secure?: array<mixed>|null, device_info?: array<mixed>|null, credit_card?: array<mixed>, credit_card_holder_info?: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createWithCreditCard(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/subscriptions/with-credit-card', $params, $options);
    }

    /**
     * Remover subscription.
     *
     * DELETE /subscriptions/{id} (escopo `subscriptions:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function delete(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/subscriptions/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar subscription.
     *
     * GET /subscriptions/{id} (escopo `subscriptions:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subscriptions/'.rawurlencode($id), $params, $options);
    }

    /**
     * Atualizar subscription.
     *
     * PUT /subscriptions/{id} (escopo `subscriptions:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{billing_type?: string, status?: string, next_due_date?: string, value?: int, cycle?: string, description?: string|null, end_date?: string|null, update_pending_payments?: bool, external_reference?: string|null, discount?: array<mixed>|null, interest?: array<mixed>|null, fine?: array<mixed>|null, split?: array<mixed>|null, callback?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function update(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/subscriptions/'.rawurlencode($id), $params, $options);
    }

    /**
     * Atualizar credit card (subscriptions).
     *
     * PUT /subscriptions/{id}/credit-card (escopo `subscriptions:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{remote_ip: string, credit_card_token?: string|null, authorize_only?: bool, three_d_secure?: array<mixed>|null, device_info?: array<mixed>|null, credit_card?: array<mixed>, credit_card_holder_info?: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateCreditCard(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/subscriptions/'.rawurlencode($id).'/credit-card', $params, $options);
    }

    /**
     * Remover invoice settings (subscriptions).
     *
     * DELETE /subscriptions/{id}/invoice-settings (escopo `subscriptions:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function deleteInvoiceSettings(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/subscriptions/'.rawurlencode($id).'/invoice-settings', $params, $options);
    }

    /**
     * Consultar invoice settings (subscriptions).
     *
     * GET /subscriptions/{id}/invoice-settings (escopo `subscriptions:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveInvoiceSettings(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subscriptions/'.rawurlencode($id).'/invoice-settings', $params, $options);
    }

    /**
     * Criar invoice settings (subscriptions).
     *
     * POST /subscriptions/{id}/invoice-settings (escopo `subscriptions:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{taxes: array<mixed>, deductions?: int|null, effective_date_period?: string|null, received_only?: bool, days_before_due_date?: int|null, observations?: string|null, municipal_service_id?: string|null, municipal_service_code?: string|null, municipal_service_name?: string|null, update_payment?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createInvoiceSettings(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/subscriptions/'.rawurlencode($id).'/invoice-settings', $params, $options);
    }

    /**
     * Atualizar invoice settings (subscriptions).
     *
     * PUT /subscriptions/{id}/invoice-settings (escopo `subscriptions:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{taxes: array<mixed>, deductions?: int|null, effective_date_period?: string|null, received_only?: bool, days_before_due_date?: int|null, observations?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateInvoiceSettings(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/subscriptions/'.rawurlencode($id).'/invoice-settings', $params, $options);
    }

    /**
     * Invoices (subscriptions).
     *
     * GET /subscriptions/{id}/invoices (escopo `subscriptions:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{effective_date_ge?: string, effective_date_le?: string, external_reference?: string, status?: string, customer?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function invoices(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subscriptions/'.rawurlencode($id).'/invoices', $params, $options);
    }

    /**
     * Itera TODOS os itens de `invoices` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function invoicesAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/subscriptions/'.rawurlencode($id).'/invoices', $params, $options);
    }

    /**
     * Payment book (subscriptions).
     *
     * GET /subscriptions/{id}/payment-book (escopo `subscriptions:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{month?: int, year?: int, sort?: string, order?: string}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function paymentBook(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subscriptions/'.rawurlencode($id).'/payment-book', $params, $options);
    }

    /**
     * Payments (subscriptions).
     *
     * GET /subscriptions/{id}/payments (escopo `subscriptions:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{status?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function payments(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subscriptions/'.rawurlencode($id).'/payments', $params, $options);
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
        return $this->client->paginate('/subscriptions/'.rawurlencode($id).'/payments', $params, $options);
    }
}
