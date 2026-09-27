<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Antecipação de recebíveis. */
final class Anticipations extends AbstractResource
{
    /**
     * Listar anticipations.
     *
     * GET /anticipations (escopo `anticipations:read`).
     *
     * @param  array{payment?: string|null, installment?: string|null, status?: string|null, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/anticipations', $params, $options);
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
        return $this->client->paginate('/anticipations', $params, $options);
    }

    /**
     * Criar anticipation.
     *
     * POST /anticipations (escopo `anticipations:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{payment?: string|null, installment?: string|null, documents?: string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/anticipations', $params, $options);
    }

    /**
     * Automatic (anticipations).
     *
     * GET /anticipations/automatic (escopo `anticipations:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function automatic(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/anticipations/automatic', $params, $options);
    }

    /**
     * Definir automatic (anticipations).
     *
     * PUT /anticipations/automatic (escopo `anticipations:write`).
     *
     * @param  array{credit_card_automatic_enabled: bool}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function setAutomatic(array $params = [], array $options = []): array
    {
        return $this->client->request('PUT', '/anticipations/automatic', $params, $options);
    }

    /**
     * Limits (anticipations).
     *
     * GET /anticipations/limits (escopo `anticipations:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function limits(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/anticipations/limits', $params, $options);
    }

    /**
     * Restrictions (anticipations).
     *
     * GET /anticipations/restrictions/{paymentId} (escopo `anticipations:read`).
     *
     * @param  string  $paymentId  parâmetro de caminho
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function restrictions(string $paymentId, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/anticipations/restrictions/'.rawurlencode($paymentId), $params, $options);
    }

    /**
     * Itera TODOS os itens de `restrictions` (paginação automática por offset/has_more).
     *
     * @param  array<string, mixed>  $params
     * @param  array<string, mixed>  $options
     * @return \Generator<int, array<string, mixed>>
     */
    public function restrictionsAll(string $paymentId, array $params = [], array $options = []): \Generator
    {
        return $this->client->paginate('/anticipations/restrictions/'.rawurlencode($paymentId), $params, $options);
    }

    /**
     * Simular (anticipations).
     *
     * POST /anticipations/simulate (escopo `anticipations:read`).
     *
     * @param  array{payment?: string|null, installment?: string|null, documents?: string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function simulate(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/anticipations/simulate', $params, $options);
    }

    /**
     * Consultar anticipation.
     *
     * GET /anticipations/{id} (escopo `anticipations:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/anticipations/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar anticipation.
     *
     * POST /anticipations/{id}/cancel (escopo `anticipations:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancel(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/anticipations/'.rawurlencode($id).'/cancel', $params, $options);
    }
}
