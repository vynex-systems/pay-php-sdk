<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Consultas a bureau de crédito. */
final class CreditBureau extends AbstractResource
{
    /**
     * Consultar (credit bureau).
     *
     * POST /credit-bureau/consultations (escopo `credit_bureau:write`).
     * Movimenta dinheiro: Idempotency-Key obrigatória (gerada automaticamente se omitida).
     *
     * @param  array{customer?: string|null, cpf_cnpj?: string|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function consult(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/credit-bureau/consultations', $params, $options);
    }

    /**
     * Listar reports.
     *
     * GET /credit-bureau/reports (escopo `credit_bureau:read`).
     *
     * @param  array{start_date?: string, end_date?: string, offset?: int, limit?: int}  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function list(array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/credit-bureau/reports', $params, $options);
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
        return $this->client->paginate('/credit-bureau/reports', $params, $options);
    }

    /**
     * Consultar report.
     *
     * GET /credit-bureau/reports/{id} (escopo `credit_bureau:read`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  query string
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function retrieve(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('GET', '/credit-bureau/reports/'.rawurlencode($id), $params, $options);
    }
}
