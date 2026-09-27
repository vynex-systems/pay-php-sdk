<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** 422: validação (errors por campo) ou regra de negócio (merchant_required, idempotency_key_required, idempotency_key_reused, provider_rejected...). */
class ValidationException extends ApiException
{
}
