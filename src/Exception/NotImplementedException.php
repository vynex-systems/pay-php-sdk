<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** 501: o provedor do merchant não suporta a operação (capability_not_supported). Não é reenviada. */
class NotImplementedException extends ApiException
{
}
