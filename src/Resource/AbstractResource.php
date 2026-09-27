<?php

declare(strict_types=1);

namespace Vynex\Pay\Resource;

use Vynex\Pay\BaseClient;

/** Base dos recursos gerados (uma classe por família de rotas). */
abstract class AbstractResource
{
    public function __construct(protected readonly BaseClient $client)
    {
    }
}
