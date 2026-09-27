# vynex/pay-php

SDK PHP (>= 8.1, `ext-curl`, zero dependências) da API Vynex Pay `/api/v1`.

```php
use Vynex\Pay\Client;
use Vynex\Pay\Exception\ApiException;
use Vynex\Pay\Webhook;

$vynex = new Client(getenv('VYNEX_API_KEY'), [
    'base_url'    => 'https://pay.suaempresa.com',   // ou env VYNEX_BASE_URL; /api/v1 é acrescentado
    'merchant_id' => '00000000-0000-4000-8000-000000000000', // opcional
    'max_retries' => 2, 'timeout' => 60,
]);

$customer = $vynex->customers->create(['name' => 'Maria', 'cpf_cnpj' => '12345678909']); // Idempotency-Key automática em POST
foreach ($vynex->charges->listAll(['status' => 'PENDING']) as $charge) { /* paginação automática */ }

try {
    $vynex->transfers->create(['value' => 5000, 'pix_address_key' => 'a@b.com', 'pix_address_key_type' => 'EMAIL'], ['idempotency_key' => 'saque-001']);
} catch (ApiException $e) {
    echo $e->status, ' ', $e->errorCode, ' ', $e->getMessage(), ' ', $e->requestId;
}

$ok = Webhook::verify($rawBody, $_SERVER['HTTP_X_VYNEX_SIGNATURE'] ?? null, $secret, 300);
```

- Um recurso por família (`customers`, `charges`, `paymentLinks`, `billPayments`, `pix`, `webhooks`, ...). Método por rota; `listAll()` nas listagens.
- Retry com backoff exponencial + jitter em 429 (respeita `Retry-After`) e 5xx (exceto 501; 504 só em leituras). A `Idempotency-Key` do `POST` é a mesma em todas as tentativas.
- Exceções: `AuthenticationException` (401), `PermissionException` (403), `NotFoundException` (404), `ConflictException` (409), `ValidationException` (422, com `errors`), `RateLimitException` (429), `NotImplementedException` (501), `ServerException` (5xx), `ConnectionException` (rede). Todas derivam de `ApiException`/`VynexException` e expõem `status`, `errorCode`, `requestId`.
- Transporte plugável: `'transport' => new MeuTransporte()` (`TransportInterface`).
- Arquivos (multipart): passe `\CURLFile`.
- `src/Client.php` e `src/Resource/*` são **gerados** por `php docs/api/generate-clients.php` (na raiz do app).

Testes: `php vendor/bin/phpunit -c sdk/php/phpunit.xml` (da raiz do app) ou `composer install && vendor/bin/phpunit` dentro de `sdk/php`.
