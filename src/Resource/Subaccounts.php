<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Subcontas (marketplace). */
final class Subaccounts extends AbstractResource
{
    /**
     * Listar subaccounts.
     *
     * GET /subaccounts (escopo `subaccounts:read`).
     *
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subaccounts', $params, $options);
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
        return $this->client->paginate('/subaccounts', $params, $options);
    }

    /**
     * Criar subaccount.
     *
     * POST /subaccounts (escopo `subaccounts:write`).
     *
     * @param  array{name?: string|null, cpf_cnpj?: string|null, email: string, login_email?: string|null, mobile_phone: string, phone?: string|null, income_value: int, address: string, address_number: string, complement?: string|null, province: string, postal_code: string, birth_date?: string|null, company_type?: string|null, site?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/subaccounts', $params, $options);
    }

    /**
     * Remover subaccount.
     *
     * DELETE /subaccounts/{id} (escopo `subaccounts:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{confirm: string, remove_reason?: string|null}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function delete(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/subaccounts/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar subaccount.
     *
     * GET /subaccounts/{id} (escopo `subaccounts:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subaccounts/'.rawurlencode($id), $params, $options);
    }

    /**
     * Aprovar sandbox (subaccounts).
     *
     * POST /subaccounts/{id}/approve-sandbox (escopo `subaccounts:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function approveSandbox(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/subaccounts/'.rawurlencode($id).'/approve-sandbox', $params, $options);
    }

    /**
     * Onboarding (subaccounts).
     *
     * GET /subaccounts/{id}/onboarding (escopo `subaccounts:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function onboarding(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/subaccounts/'.rawurlencode($id).'/onboarding', $params, $options);
    }

    /**
     * Reenviar activation (subaccounts).
     *
     * POST /subaccounts/{id}/resend-activation (escopo `subaccounts:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function resendActivation(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/subaccounts/'.rawurlencode($id).'/resend-activation', $params, $options);
    }
}
