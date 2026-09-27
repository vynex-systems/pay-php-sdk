<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Conta do merchant: dados comerciais, tarifas, status de cadastro, carteiras. */
final class Account extends AbstractResource
{
    /**
     * Consultar account.
     *
     * GET /account (escopo `account:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveAccount(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/account', $params, $options);
    }

    /**
     * Commercial info (account).
     *
     * GET /account/commercial-info (escopo `account:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function commercialInfo(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/account/commercial-info', $params, $options);
    }

    /**
     * Atualizar commercial info (account).
     *
     * PUT /account/commercial-info (escopo `account:write`).
     *
     * @param  array{person_type?: string, cpf_cnpj?: string, birth_date?: string, company_type?: string, company_name?: string, income_value?: int, tax_regime?: string, email?: string, phone?: string, mobile_phone?: string, site?: string, postal_code?: string, address?: string, address_number?: string, complement?: string|null, province?: string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateCommercialInfo(array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/account/commercial-info', $params, $options);
    }

    /**
     * Fees (account).
     *
     * GET /account/fees (escopo `account:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function fees(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/account/fees', $params, $options);
    }

    /**
     * Invoice personalization (account).
     *
     * GET /account/invoice-personalization (escopo `account:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function invoicePersonalization(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/account/invoice-personalization', $params, $options);
    }

    /**
     * Salvar invoice personalization (account).
     *
     * POST /account/invoice-personalization (escopo `account:write`).
     *
     * @param  array{logo_background_color: string, info_background_color: string, font_color: string, enabled?: bool|null, logo?: \CURLFile|string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function saveInvoicePersonalization(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/account/invoice-personalization', $params, $options);
    }

    /**
     * Number (account).
     *
     * GET /account/number (escopo `account:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function number(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/account/number', $params, $options);
    }

    /**
     * Registration status (account).
     *
     * GET /account/registration-status (escopo `account:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function registrationStatus(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/account/registration-status', $params, $options);
    }

    /**
     * Wallets (account).
     *
     * GET /account/wallets (escopo `account:read`).
     *
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function wallets(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/account/wallets', $params, $options);
    }

    /**
     * Itera TODOS os itens de `wallets` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function walletsAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/account/wallets', $params, $options);
    }

    /**
     * Consultar store.
     *
     * GET /store (escopo `account:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveStore(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/store', $params, $options);
    }
}
