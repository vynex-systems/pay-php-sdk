<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** 403: escopo insuficiente (insufficient_scope), conta inativa (tenant_inactive) ou operação só de sandbox (sandbox_only). */
class PermissionException extends ApiException
{
}
