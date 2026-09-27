<?php

declare(strict_types=1);

namespace Vynex\Pay\Exception;

/** Falha de rede/timeout antes de receber resposta HTTP. O resultado da operação é desconhecido. */
class ConnectionException extends VynexException
{
}
