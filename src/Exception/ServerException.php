<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** 5xx (502 provider_error/provider_unavailable, 504 provider_timeout). Em 504 o resultado da operação é DESCONHECIDO: consulte antes de repetir. */
class ServerException extends ApiException
{
}
