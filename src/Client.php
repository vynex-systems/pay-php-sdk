<?php

// GERADO por docs/api/generate-clients.php a partir de operations.json — nao edite a mao.

declare(strict_types=1);

namespace Vynex\Pay;

/**
 * Cliente da API Vynex Pay (/api/v1).
 *
 *   $vynex = new Client(getenv('VYNEX_API_KEY'), ['base_url' => 'https://pay.suaempresa.com']);
 *   $vynex->customers->create(['name' => 'Maria', 'cpf_cnpj' => '12345678909']);
 *   foreach ($vynex->charges->listAll(['status' => 'PENDING']) as $charge) { ... }
 */
final class Client extends BaseClient
{
    public readonly Resource\Account $account;
    public readonly Resource\Anticipations $anticipations;
    public readonly Resource\Balance $balance;
    public readonly Resource\BillPayments $billPayments;
    public readonly Resource\Cards $cards;
    public readonly Resource\Chargebacks $chargebacks;
    public readonly Resource\Charges $charges;
    public readonly Resource\Checkouts $checkouts;
    public readonly Resource\CreditBureau $creditBureau;
    public readonly Resource\Customers $customers;
    public readonly Resource\Documents $documents;
    public readonly Resource\Dunnings $dunnings;
    public readonly Resource\Escrow $escrow;
    public readonly Resource\Installments $installments;
    public readonly Resource\Invoices $invoices;
    public readonly Resource\PaymentLinks $paymentLinks;
    public readonly Resource\Pix $pix;
    public readonly Resource\Splits $splits;
    public readonly Resource\Subaccounts $subaccounts;
    public readonly Resource\Subscriptions $subscriptions;
    public readonly Resource\TopUps $topUps;
    public readonly Resource\Transfers $transfers;
    public readonly Resource\Webhooks $webhooks;

    /**
     * @param  array<string, mixed>  $options  base_url, merchant_id, max_retries, timeout, transport, sleeper, user_agent
     */
    public function __construct(string $apiKey, array $options = [])
    {
        parent::__construct($apiKey, $options);

        $this->account = new Resource\Account($this);
        $this->anticipations = new Resource\Anticipations($this);
        $this->balance = new Resource\Balance($this);
        $this->billPayments = new Resource\BillPayments($this);
        $this->cards = new Resource\Cards($this);
        $this->chargebacks = new Resource\Chargebacks($this);
        $this->charges = new Resource\Charges($this);
        $this->checkouts = new Resource\Checkouts($this);
        $this->creditBureau = new Resource\CreditBureau($this);
        $this->customers = new Resource\Customers($this);
        $this->documents = new Resource\Documents($this);
        $this->dunnings = new Resource\Dunnings($this);
        $this->escrow = new Resource\Escrow($this);
        $this->installments = new Resource\Installments($this);
        $this->invoices = new Resource\Invoices($this);
        $this->paymentLinks = new Resource\PaymentLinks($this);
        $this->pix = new Resource\Pix($this);
        $this->splits = new Resource\Splits($this);
        $this->subaccounts = new Resource\Subaccounts($this);
        $this->subscriptions = new Resource\Subscriptions($this);
        $this->topUps = new Resource\TopUps($this);
        $this->transfers = new Resource\Transfers($this);
        $this->webhooks = new Resource\Webhooks($this);
    }
}
