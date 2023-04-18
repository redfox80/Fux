<?php

namespace Fux\Http\Middleware;

use App\Middleware\TestCheck;
use Fux\Classes\FuxRequestClass;
use Fux\Interfaces\StageInterface;
use App\Middleware\Middlewares;

class PreRouteMiddleware implements StageInterface
{
    public function __invoke($request): FuxRequestClass
    {
        $middlewares = Middlewares::pre;

        foreach($middlewares as $middleware)
        {
            new $middleware($request);
        }
        return $request;
    }
}