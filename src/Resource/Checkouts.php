<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay\Resource;

/** Sessões de Checkout hospedado. */
final class Checkouts extends AbstractResource
{
    /**
     * Criar checkout.
     *
     * POST /checkouts (escopo `checkouts:write`).
     *
     * @param  array{billing_types: array<mixed>, charge_types: array<mixed>, callback: array<mixed>, items: array<mixed>, minutes_to_expire?: int, external_reference?: string|null, customer_data?: array<mixed>|null, subscription?: array<mixed>|null, installment?: array<mixed>|null, splits?: array<mixed>|null}  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function create(array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/checkouts', $params, $options);
    }

    /**
     * Cancelar checkout.
     *
     * POST /checkouts/{id}/cancel (escopo `checkouts:write`).
     *
     * @param  string  $id  parâmetro de caminho
     * @param  array<string, mixed>  $params  corpo JSON
     * @param  array<string, mixed>  $options  idempotency_key, merchant_id, headers, timeout, max_retries
     * @return array<string, mixed>
     */
    public function cancel(string $id, array $params = [], array $options = []): array
    {
        return $this->client->request('POST', '/checkouts/'.rawurlencode($id).'/cancel', $params, $options);
    }
}
