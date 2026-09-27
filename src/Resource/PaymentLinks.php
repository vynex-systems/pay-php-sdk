<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Links de pagamento. */
final class PaymentLinks extends AbstractResource
{
    /**
     * Listar payment links.
     *
     * GET /payment-links (escopo `payment_links:read`).
     *
     * @param  array{active?: string, include_deleted?: string, name?: string, external_reference?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/payment-links', $params, $options);
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
        return $this->client->paginate('/payment-links', $params, $options);
    }

    /**
     * Criar payment link.
     *
     * POST /payment-links (escopo `payment_links:write`).
     *
     * @param  array{name: string, billing_type: string, charge_type: string, description?: string|null, end_date?: string|null, value?: int|null, due_date_limit_days?: int|null, subscription_cycle?: string|null, max_installment_count?: int|null, external_reference?: string|null, notification_enabled?: bool, is_address_required?: bool, callback?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/payment-links', $params, $options);
    }

    /**
     * Remover payment link.
     *
     * DELETE /payment-links/{id} (escopo `payment_links:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function delete(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/payment-links/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar payment link.
     *
     * GET /payment-links/{id} (escopo `payment_links:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/payment-links/'.rawurlencode($id), $params, $options);
    }

    /**
     * Atualizar payment link.
     *
     * PUT /payment-links/{id} (escopo `payment_links:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{name?: string, billing_type?: string, charge_type?: string, description?: string|null, end_date?: string|null, value?: int|null, due_date_limit_days?: int|null, subscription_cycle?: string|null, max_installment_count?: int|null, external_reference?: string|null, notification_enabled?: bool, is_address_required?: bool, callback?: array<mixed>|null, active?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function update(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/payment-links/'.rawurlencode($id), $params, $options);
    }

    /**
     * Images (payment links).
     *
     * GET /payment-links/{id}/images (escopo `payment_links:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function images(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/payment-links/'.rawurlencode($id).'/images', $params, $options);
    }

    /**
     * Itera TODOS os itens de `images` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function imagesAll(string $id, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/payment-links/'.rawurlencode($id).'/images', $params, $options);
    }

    /**
     * Criar image (payment links).
     *
     * POST /payment-links/{id}/images (escopo `payment_links:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{file: \CURLFile|string, main?: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function createImage(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/payment-links/'.rawurlencode($id).'/images', $params, $options);
    }

    /**
     * Remover image (payment links).
     *
     * DELETE /payment-links/{id}/images/{imageId} (escopo `payment_links:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  string  $imageId  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function deleteImage(string $id, string $imageId, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/payment-links/'.rawurlencode($id).'/images/'.rawurlencode($imageId), $params, $options);
    }

    /**
     * Consultar image (payment links).
     *
     * GET /payment-links/{id}/images/{imageId} (escopo `payment_links:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  string  $imageId  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieveImage(string $id, string $imageId, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/payment-links/'.rawurlencode($id).'/images/'.rawurlencode($imageId), $params, $options);
    }

    /**
     * Definir main image (payment links).
     *
     * PUT /payment-links/{id}/images/{imageId}/main (escopo `payment_links:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  string  $imageId  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function setMainImage(string $id, string $imageId, array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/payment-links/'.rawurlencode($id).'/images/'.rawurlencode($imageId).'/main', $params, $options);
    }

    /**
     * Restaurar payment link.
     *
     * POST /payment-links/{id}/restore (escopo `payment_links:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function restore(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/payment-links/'.rawurlencode($id).'/restore', $params, $options);
    }
}
