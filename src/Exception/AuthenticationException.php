<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** 401: chave de API ausente, inválida ou revogada (unauthenticated). */
class AuthenticationException extends ApiException
{
}
