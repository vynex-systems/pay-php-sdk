<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Clientes (pagadores). */
final class Customers extends AbstractResource
{
    /**
     * Atualizar notification (customers).
     *
     * PUT /customer-notifications/{notificationId} (escopo `customers:write`).
     *
     * @param  string  $notificationId  parâmetro de caminho
     * @param  array{enabled?: bool, email_enabled_for_provider?: bool, sms_enabled_for_provider?: bool, email_enabled_for_customer?: bool, sms_enabled_for_customer?: bool, phone_call_enabled_for_customer?: bool, whatsapp_enabled_for_customer?: bool, schedule_offset?: int}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateNotification(string $notificationId, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/customer-notifications/'.rawurlencode($notificationId), $params, $options);
    }

    /**
     * Listar customers.
     *
     * GET /customers (escopo `customers:read`).
     *
     * @param  array{name?: string, email?: string, cpf_cnpj?: string, group_name?: string, external_reference?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/customers', $params, $options);
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
        return $this->client->paginate('/customers', $params, $options);
    }

    /**
     * Criar customer.
     *
     * POST /customers (escopo `customers:write`).
     *
     * @param  array{name: string, cpf_cnpj: string, email?: string|null, phone?: string|null, mobile_phone?: string|null, address?: string|null, address_number?: string|null, complement?: string|null, province?: string|null, postal_code?: string|null, external_reference?: string|null, notification_disabled?: bool, additional_emails?: string|null, municipal_inscription?: string|null, state_inscription?: string|null, observations?: string|null, group_name?: string|null, group_names?: array<mixed>|null, company?: string|null, foreign_customer?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/customers', $params, $options);
    }

    /**
     * Buscar or create (customers).
     *
     * POST /customers/find-or-create (escopo `customers:write`).
     *
     * @param  array{name: string, cpf_cnpj: string, email?: string|null, phone?: string|null, mobile_phone?: string|null, address?: string|null, address_number?: string|null, complement?: string|null, province?: string|null, postal_code?: string|null, external_reference?: string|null, notification_disabled?: bool, additional_emails?: string|null, municipal_inscription?: string|null, state_inscription?: string|null, observations?: string|null, group_name?: string|null, group_names?: array<mixed>|null, company?: string|null, foreign_customer?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function findOrCreate(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/customers/find-or-create', $params, $options);
    }

    /**
     * Remover customer.
     *
     * DELETE /customers/{id} (escopo `customers:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function delete(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/customers/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar customer.
     *
     * GET /customers/{id} (escopo `customers:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/customers/'.rawurlencode($id), $params, $options);
    }

    /**
     * Atualizar customer.
     *
     * PUT /customers/{id} (escopo `customers:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{name?: string, cpf_cnpj?: string, email?: string|null, phone?: string|null, mobile_phone?: string|null, address?: string|null, address_number?: string|null, complement?: string|null, province?: string|null, postal_code?: string|null, external_reference?: string|null, notification_disabled?: bool, additional_emails?: string|null, municipal_inscription?: string|null, state_inscription?: string|null, observations?: string|null, group_name?: string|null, group_names?: array<mixed>|null, company?: string|null, foreign_customer?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function update(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/customers/'.rawurlencode($id), $params, $options);
    }

    /**
     * Notifications (customers).
     *
     * GET /customers/{id}/notifications (escopo `customers:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function notifications(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/customers/'.rawurlencode($id).'/notifications', $params, $options);
    }

    /**
     * Itera TODOS os itens de `notifications` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function notificationsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/customers/'.rawurlencode($id).'/notifications', $params, $options);
    }

    /**
     * Atualizar notifications (customers).
     *
     * PUT /customers/{id}/notifications (escopo `customers:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{notifications: array<mixed>, offset?: int, limit?: int}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateNotifications(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/customers/'.rawurlencode($id).'/notifications', $params, $options);
    }

    /**
     * Itera TODOS os itens de `updateNotifications` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function updateNotificationsAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/customers/'.rawurlencode($id).'/notifications', $params, $options);
    }

    /**
     * Restaurar customer.
     *
     * POST /customers/{id}/restore (escopo `customers:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function restore(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/customers/'.rawurlencode($id).'/restore', $params, $options);
    }
}
