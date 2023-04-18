<?php
namespace Fux\Http\Middleware;

use League\Pipeline\StageInterface;

class PostRouteMiddleware implements StageInterface
{
    public function __invoke($payload)
    {
        return $payload;
    }
}