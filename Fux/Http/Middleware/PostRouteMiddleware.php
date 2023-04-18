<?php
namespace Fux\Http\Middleware;

use Fux\Classes\FuxRequestClass;
use Fux\Interfaces\StageInterface;

class PostRouteMiddleware implements StageInterface
{
    public function __invoke($request): FuxRequestClass
    {
        return $request;
    }
}