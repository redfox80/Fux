<?php

namespace Fux\Http\Middleware;

use App\Middleware\TestCheck;
use League\Pipeline\StageInterface;
use App\Middleware\Middlewares;

class PreRouteMiddleware implements StageInterface
{
    public function __invoke($payload)
    {
        $middlewares = Middlewares::pre;

        foreach($middlewares as $middleware)
        {
            new $middleware($payload);
        }
        return $payload;
    }
}