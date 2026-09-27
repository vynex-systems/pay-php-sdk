<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Cobranças (Pix, boleto, cartão). */
final class Charges extends AbstractResource
{
    /**
     * Limits (charges).
     *
     * GET /charge-limits (escopo `charges:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function limits(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charge-limits', $params, $options);
    }

    /**
     * Simular (charges).
     *
     * POST /charge-simulations (escopo `charges:read`).
     *
     * @param  array{value: int, billing_types: array<mixed>, installment_count?: int|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function simulate(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charge-simulations', $params, $options);
    }

    /**
     * Listar charges.
     *
     * GET /charges (escopo `charges:read`).
     *
     * @param  array{customer?: string, customer_group_name?: string, billing_type?: string, status?: string, subscription?: string, installment?: string, external_reference?: string, payment_date?: string, invoice_status?: string, estimated_credit_date?: string, pix_qr_code_id?: string, anticipated?: string, anticipable?: string, user?: string, checkout_session?: string, date_created_ge?: string, date_created_le?: string, payment_date_ge?: string, payment_date_le?: string, estimated_credit_date_ge?: string, estimated_credit_date_le?: string, due_date_ge?: string, due_date_le?: string, lean?: bool, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges', $params, $options);
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
        return $this->client->paginate('/charges', $params, $options);
    }

    /**
     * Criar charge.
     *
     * POST /charges (rota legada, sem escopo).
     *
     * @param  array{merchant_id: string, amount: int, method?: string, customer?: array<mixed>|null, external_reference?: string|null, metadata?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges', $params, $options);
    }

    /**
     * Criar with credit card (charges).
     *
     * POST /charges/with-credit-card (escopo `charges:write`).
     *
     * @param  array{customer: string, billing_type?: string, due_date: string, value?: int, installment_count?: int|null, installment_value?: int|null, total_value?: int|null, description?: string|null, external_reference?: string|null, days_after_due_date_to_registration_cancellation?: int|null, postal_service?: bool, discount?: array<mixed>|null, interest?: array<mixed>|null, fine?: array<mixed>|null, split?: array<mixed>|null, callback?: array<mixed>|null, remote_ip: string, credit_card_token?: string|null, authorize_only?: bool, three_d_secure?: array<mixed>|null, device_info?: array<mixed>|null, credit_card?: array<mixed>, credit_card_holder_info?: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createWithCreditCard(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/with-credit-card', $params, $options);
    }

    /**
     * Remover charge.
     *
     * DELETE /charges/{id} (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{lean?: bool}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function delete(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/charges/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar charge.
     *
     * GET /charges/{id} (rota legada, sem escopo).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id), $params, $options);
    }

    /**
     * Atualizar charge.
     *
     * PUT /charges/{id} (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{billing_type?: string, value?: int, due_date?: string, description?: string|null, days_after_due_date_to_registration_cancellation?: int|null, external_reference?: string|null, postal_service?: bool, discount?: array<mixed>|null, interest?: array<mixed>|null, fine?: array<mixed>|null, split?: array<mixed>|null, callback?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function update(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/charges/'.rawurlencode($id), $params, $options);
    }

    /**
     * Billing info (charges).
     *
     * GET /charges/{id}/billing-info (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function billingInfo(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/billing-info', $params, $options);
    }

    /**
     * Capturar (charges).
     *
     * POST /charges/{id}/capture (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function capture(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/capture', $params, $options);
    }

    /**
     * Chargeback (charges).
     *
     * GET /charges/{id}/chargeback (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function chargeback(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/chargeback', $params, $options);
    }

    /**
     * Contractual effect restrictions (charges).
     *
     * GET /charges/{id}/contractual-effect-restrictions (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function contractualEffectRestrictions(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/contractual-effect-restrictions', $params, $options);
    }

    /**
     * Itera TODOS os itens de `contractualEffectRestrictions` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function contractualEffectRestrictionsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/charges/'.rawurlencode($id).'/contractual-effect-restrictions', $params, $options);
    }

    /**
     * Documents (charges).
     *
     * GET /charges/{id}/documents (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function documents(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/documents', $params, $options);
    }

    /**
     * Itera TODOS os itens de `documents` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function documentsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/charges/'.rawurlencode($id).'/documents', $params, $options);
    }

    /**
     * Criar document (charges).
     *
     * POST /charges/{id}/documents (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{file: \CURLFile|string, type: string, available_after_payment?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createDocument(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/documents', $params, $options);
    }

    /**
     * Remover document (charges).
     *
     * DELETE /charges/{id}/documents/{documentId} (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  string  $documentId  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function deleteDocument(string $id, string $documentId, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/charges/'.rawurlencode($id).'/documents/'.rawurlencode($documentId), $params, $options);
    }

    /**
     * Consultar document (charges).
     *
     * GET /charges/{id}/documents/{documentId} (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  string  $documentId  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveDocument(string $id, string $documentId, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/documents/'.rawurlencode($documentId), $params, $options);
    }

    /**
     * Atualizar document (charges).
     *
     * PUT /charges/{id}/documents/{documentId} (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  string  $documentId  parâmetro de caminho
     * @param  array{type?: string, available_after_payment?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateDocument(string $id, string $documentId, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/charges/'.rawurlencode($id).'/documents/'.rawurlencode($documentId), $params, $options);
    }

    /**
     * Escrow (charges).
     *
     * GET /charges/{id}/escrow (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function escrow(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/escrow', $params, $options);
    }

    /**
     * Identification field (charges).
     *
     * GET /charges/{id}/identification-field (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function identificationField(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/identification-field', $params, $options);
    }

    /**
     * Pagar with card (charges).
     *
     * POST /charges/{id}/pay-with-card (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{card_type: string, card_token?: string|null, card?: array<mixed>, three_d_secure?: array<mixed>|null, device_info?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function payWithCard(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/pay-with-card', $params, $options);
    }

    /**
     * Pagar with credit card (charges).
     *
     * POST /charges/{id}/pay-with-credit-card (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{remote_ip: string, credit_card_token?: string|null, authorize_only?: bool, three_d_secure?: array<mixed>|null, device_info?: array<mixed>|null, credit_card?: array<mixed>, credit_card_holder_info?: array<mixed>}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function payWithCreditCard(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/pay-with-credit-card', $params, $options);
    }

    /**
     * Pix qr code (charges).
     *
     * GET /charges/{id}/pix-qr-code (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function pixQrCode(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/pix-qr-code', $params, $options);
    }

    /**
     * Desfazer received in cash (charges).
     *
     * DELETE /charges/{id}/receive-in-cash (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{lean?: bool}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function undoReceivedInCash(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/charges/'.rawurlencode($id).'/receive-in-cash', $params, $options);
    }

    /**
     * Receber in cash (charges).
     *
     * POST /charges/{id}/receive-in-cash (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{payment_date: string, value?: int|null, notify_customer?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function receiveInCash(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/receive-in-cash', $params, $options);
    }

    /**
     * Estornar charge.
     *
     * POST /charges/{id}/refund (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{value?: int|null, description?: string|null, split_refunds?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function refund(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/refund', $params, $options);
    }

    /**
     * Estornar bank slip (charges).
     *
     * POST /charges/{id}/refund-bank-slip (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function refundBankSlip(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/refund-bank-slip', $params, $options);
    }

    /**
     * Refunds (charges).
     *
     * GET /charges/{id}/refunds (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function refunds(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/refunds', $params, $options);
    }

    /**
     * Itera TODOS os itens de `refunds` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function refundsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/charges/'.rawurlencode($id).'/refunds', $params, $options);
    }

    /**
     * Restaurar charge.
     *
     * POST /charges/{id}/restore (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function restore(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/restore', $params, $options);
    }

    /**
     * Overdue (charges).
     *
     * POST /charges/{id}/simulate-overdue (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function overdue(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/simulate-overdue', $params, $options);
    }

    /**
     * Payment (charges).
     *
     * POST /charges/{id}/simulate-payment (escopo `charges:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function payment(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/charges/'.rawurlencode($id).'/simulate-payment', $params, $options);
    }

    /**
     * Status (charges).
     *
     * GET /charges/{id}/status (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function status(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/status', $params, $options);
    }

    /**
     * Viewing info (charges).
     *
     * GET /charges/{id}/viewing-info (escopo `charges:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function viewingInfo(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/charges/'.rawurlencode($id).'/viewing-info', $params, $options);
    }
}
