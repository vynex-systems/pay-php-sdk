<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Recarga de celular. */
final class TopUps extends AbstractResource
{
    /**
     * Listar top ups.
     *
     * GET /top-ups (escopo `top_ups:read`).
     *
     * @param  array{offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/top-ups', $params, $options);
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
        return $this->client->paginate('/top-ups', $params, $options);
    }

    /**
     * Criar top up.
     *
     * POST /top-ups (escopo `top_ups:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{value: int, phone_number: string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/top-ups', $params, $options);
    }

    /**
     * Provider (top ups).
     *
     * GET /top-ups/provider (escopo `top_ups:read`).
     *
     * @param  array{phone_number: string}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function provider(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/top-ups/provider', $params, $options);
    }

    /**
     * Consultar top up.
     *
     * GET /top-ups/{id} (escopo `top_ups:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/top-ups/'.rawurlencode($id), $params, $options);
    }

    /**
     * Cancelar top up.
     *
     * POST /top-ups/{id}/cancel (escopo `top_ups:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancel(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/top-ups/'.rawurlencode($id).'/cancel', $params, $options);
    }
}
