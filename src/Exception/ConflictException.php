<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** 409: idempotency_in_progress ou merchant_account_unavailable. */
class ConflictException extends ApiException
{
}
