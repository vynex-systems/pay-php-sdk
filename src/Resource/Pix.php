<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Pix: chaves, QR Codes, transações, recorrência e Pix Automático. */
final class Pix extends AbstractResource
{
    /**
     * Authorizations (pix).
     *
     * GET /pix/automatic/authorizations (escopo `pix:read`).
     *
     * @param  array{status?: string|null, customer_id?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function authorizations(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/automatic/authorizations', $params, $options);
    }

    /**
     * Itera TODOS os itens de `authorizations` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function authorizationsAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/pix/automatic/authorizations', $params, $options);
    }

    /**
     * Criar authorization (pix).
     *
     * POST /pix/automatic/authorizations (escopo `pix:write`).
     *
     * @param  array{frequency: string, contract_id: string, start_date: string, customer_id: string, immediate_qr_code: array<mixed>, finish_date?: string|null, value?: int|null, description?: string|null, min_limit_value?: int|null, payment_creation_mode?: string|null, retry_policy?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createAuthorization(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/automatic/authorizations', $params, $options);
    }

    /**
     * Consultar authorization (pix).
     *
     * GET /pix/automatic/authorizations/{id} (escopo `pix:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveAuthorization(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/automatic/authorizations/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar authorization (pix).
     *
     * POST /pix/automatic/authorizations/{id}/cancel (escopo `pix:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancelAuthorization(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/automatic/authorizations/'.rawurlencode($id).'/cancel', $params, $options);
    }

    /**
     * Payment instructions (pix).
     *
     * GET /pix/automatic/payment-instructions (escopo `pix:read`).
     *
     * @param  array{authorization_id?: string|null, customer_id?: string|null, payment_id?: string|null, status?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function paymentInstructions(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/automatic/payment-instructions', $params, $options);
    }

    /**
     * Itera TODOS os itens de `paymentInstructions` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function paymentInstructionsAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/pix/automatic/payment-instructions', $params, $options);
    }

    /**
     * Consultar payment instruction (pix).
     *
     * GET /pix/automatic/payment-instructions/{id} (escopo `pix:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrievePaymentInstruction(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/automatic/payment-instructions/'.rawurlencode($id), $params, $options);
    }

    /**
     * Repetir payment instruction (pix).
     *
     * POST /pix/automatic/payment-instructions/{id}/retries (escopo `pix:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{due_date: string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retryPaymentInstruction(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/automatic/payment-instructions/'.rawurlencode($id).'/retries', $params, $options);
    }

    /**
     * Consultar chave key (pix).
     *
     * POST /pix/key-lookups (escopo `pix:read`).
     *
     * @param  array{type: string, key: string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function lookupKey(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/key-lookups', $params, $options);
    }

    /**
     * Consultar chave token bucket (pix).
     *
     * GET /pix/key-lookups/token-bucket (escopo `pix:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function lookupTokenBucket(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/key-lookups/token-bucket', $params, $options);
    }

    /**
     * Keys (pix).
     *
     * GET /pix/keys (escopo `pix:read`).
     *
     * @param  array{status?: string|null, status_list?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function keys(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/keys', $params, $options);
    }

    /**
     * Itera TODOS os itens de `keys` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function keysAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/pix/keys', $params, $options);
    }

    /**
     * Criar key (pix).
     *
     * POST /pix/keys (escopo `pix:write`).
     *
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createKey(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/keys', $params, $options);
    }

    /**
     * Remove key (pix).
     *
     * DELETE /pix/keys/{id} (escopo `pix:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function removeKey(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/pix/keys/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar key (pix).
     *
     * GET /pix/keys/{id} (escopo `pix:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveKey(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/keys/'.rawurlencode($id), $params, $options);
    }

    /**
     * Decodificar qr code (pix).
     *
     * POST /pix/qr-codes/decode (escopo `pix:read`).
     *
     * @param  array{payload: string, change_value?: int|null, expected_payment_date?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function decodeQrCode(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/qr-codes/decode', $params, $options);
    }

    /**
     * Decodificar and pay qr code (pix).
     *
     * POST /pix/qr-codes/decode-and-pay (escopo `pix:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{payload: string, value?: int|null, description?: string|null, change_value?: int|null, schedule_date?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function decodeAndPayQrCode(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/qr-codes/decode-and-pay', $params, $options);
    }

    /**
     * Pagar qr code (pix).
     *
     * POST /pix/qr-codes/pay (escopo `pix:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{payload: string, value: int, description?: string|null, change_value?: int|null, schedule_date?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function payQrCode(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/qr-codes/pay', $params, $options);
    }

    /**
     * Cancelar recurrence item (pix).
     *
     * POST /pix/recurrence-items/{itemId}/cancel (escopo `pix:write`).
     *
     * @param  string  $itemId  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancelRecurrenceItem(string $itemId, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/recurrence-items/'.rawurlencode($itemId).'/cancel', $params, $options);
    }

    /**
     * Recurrences (pix).
     *
     * GET /pix/recurrences (escopo `pix:read`).
     *
     * @param  array{status?: string|null, value?: int|null, search_text?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function recurrences(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/recurrences', $params, $options);
    }

    /**
     * Itera TODOS os itens de `recurrences` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function recurrencesAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/pix/recurrences', $params, $options);
    }

    /**
     * Consultar recurrence (pix).
     *
     * GET /pix/recurrences/{id} (escopo `pix:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveRecurrence(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/recurrences/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar recurrence (pix).
     *
     * POST /pix/recurrences/{id}/cancel (escopo `pix:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancelRecurrence(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/recurrences/'.rawurlencode($id).'/cancel', $params, $options);
    }

    /**
     * Recurrence items (pix).
     *
     * GET /pix/recurrences/{id}/items (escopo `pix:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function recurrenceItems(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/recurrences/'.rawurlencode($id).'/items', $params, $options);
    }

    /**
     * Itera TODOS os itens de `recurrenceItems` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function recurrenceItemsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/pix/recurrences/'.rawurlencode($id).'/items', $params, $options);
    }

    /**
     * Criar static qr code (pix).
     *
     * POST /pix/static-qr-codes (escopo `pix:write`).
     *
     * @param  array{address_key: string, description?: string|null, value?: int|null, format?: string|null, expiration_date?: string|null, expiration_seconds?: int|null, allows_multiple_payments?: bool|null, external_reference?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createStaticQrCode(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/static-qr-codes', $params, $options);
    }

    /**
     * Remover static qr code (pix).
     *
     * DELETE /pix/static-qr-codes/{id} (escopo `pix:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function deleteStaticQrCode(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/pix/static-qr-codes/'.rawurlencode($id), $params, $options);
    }

    /**
     * Transactions (pix).
     *
     * GET /pix/transactions (escopo `pix:read`).
     *
     * @param  array{status?: string|null, type?: string|null, end_to_end_identifier?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function transactions(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/transactions', $params, $options);
    }

    /**
     * Itera TODOS os itens de `transactions` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function transactionsAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/pix/transactions', $params, $options);
    }

    /**
     * Consultar transaction (pix).
     *
     * GET /pix/transactions/{id} (escopo `pix:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveTransaction(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/pix/transactions/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar transaction (pix).
     *
     * POST /pix/transactions/{id}/cancel (escopo `pix:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancelTransaction(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/pix/transactions/'.rawurlencode($id).'/cancel', $params, $options);
    }
}
