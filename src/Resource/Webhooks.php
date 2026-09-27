<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Endpoints de webhook, entregas e eventos. */
final class Webhooks extends AbstractResource
{
    /**
     * Listar deliveries.
     *
     * GET /webhooks/deliveries (escopo `webhooks:read`).
     *
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function listDeliveries(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/webhooks/deliveries', $params, $options);
    }

    /**
     * Itera TODOS os itens de `listDeliveries` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function listDeliveriesAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/webhooks/deliveries', $params, $options);
    }

    /**
     * Consultar delivery.
     *
     * GET /webhooks/deliveries/{id} (escopo `webhooks:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveDelivery(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/webhooks/deliveries/'.rawurlencode($id), $params, $options);
    }

    /**
     * Reentregar (webhooks).
     *
     * POST /webhooks/deliveries/{id}/redeliver (escopo `webhooks:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function redeliver(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/webhooks/deliveries/'.rawurlencode($id).'/redeliver', $params, $options);
    }

    /**
     * Listar endpoints.
     *
     * GET /webhooks/endpoints (escopo `webhooks:read`).
     *
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function listEndpoints(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/webhooks/endpoints', $params, $options);
    }

    /**
     * Itera TODOS os itens de `listEndpoints` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function listEndpointsAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/webhooks/endpoints', $params, $options);
    }

    /**
     * Criar endpoint.
     *
     * POST /webhooks/endpoints (escopo `webhooks:write`).
     *
     * @param  array{url: string, events?: array<mixed>, enabled?: bool, description?: string|null, all_merchants?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createEndpoint(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/webhooks/endpoints', $params, $options);
    }

    /**
     * Remover endpoint.
     *
     * DELETE /webhooks/endpoints/{id} (escopo `webhooks:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function deleteEndpoint(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/webhooks/endpoints/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar endpoint.
     *
     * GET /webhooks/endpoints/{id} (escopo `webhooks:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveEndpoint(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/webhooks/endpoints/'.rawurlencode($id), $params, $options);
    }

    /**
     * Atualizar endpoint.
     *
     * PATCH /webhooks/endpoints/{id} (escopo `webhooks:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{url?: string, events?: array<mixed>, enabled?: bool, description?: string|null, all_merchants?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function updateEndpoint(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PATCH', '/webhooks/endpoints/'.rawurlencode($id), $params, $options);
    }

    /**
     * Rotacionar secret (webhooks).
     *
     * POST /webhooks/endpoints/{id}/rotate-secret (escopo `webhooks:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function rotateSecret(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/webhooks/endpoints/'.rawurlencode($id).'/rotate-secret', $params, $options);
    }

    /**
     * Testar (webhooks).
     *
     * POST /webhooks/endpoints/{id}/test (escopo `webhooks:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function test(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/webhooks/endpoints/'.rawurlencode($id).'/test', $params, $options);
    }

    /**
     * Event types (webhooks).
     *
     * GET /webhooks/event-types (escopo `webhooks:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function eventTypes(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/webhooks/event-types', $params, $options);
    }

    /**
     * Listar events.
     *
     * GET /webhooks/events (escopo `webhooks:read`).
     *
     * @param  array{type?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function listEvents(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/webhooks/events', $params, $options);
    }

    /**
     * Itera TODOS os itens de `listEvents` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function listEventsAll(array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/webhooks/events', $params, $options);
    }

    /**
     * Consultar event.
     *
     * GET /webhooks/events/{id} (escopo `webhooks:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveEvent(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/webhooks/events/'.rawurlencode($id), $params, $options);
    }
}
