<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Documentos de onboarding/cobrança. */
final class Documents extends AbstractResource
{
    /**
     * Remover file.
     *
     * DELETE /documents/files/{id} (escopo `documents:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function delete(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('DELETE', '/documents/files/'.rawurlencode($id), $params, $options);
    }

    /**
     * Consultar file.
     *
     * GET /documents/files/{id} (escopo `documents:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/documents/files/'.rawurlencode($id), $params, $options);
    }

    /**
     * Substituir (documents).
     *
     * POST /documents/files/{id} (escopo `documents:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array{file: \CURLFile|string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function replace(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/documents/files/'.rawurlencode($id), $params, $options);
    }

    /**
     * Enviar (documents).
     *
     * POST /documents/groups/{group} (escopo `documents:write`).
     *
     * @param  string  $group  parâmetro de caminho
     * @param  array{type: string, file: \CURLFile|string}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function send(string $group, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/documents/groups/'.rawurlencode($group), $params, $options);
    }

    /**
     * Pendentes (documents).
     *
     * GET /documents/pending (escopo `documents:read`).
     *
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function pending(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/documents/pending', $params, $options);
    }
}
