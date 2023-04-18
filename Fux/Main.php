<?php

namespace Fux;

use Content\Home;
use Dotenv\Dotenv;
use Fux\Classes\FuxRequestClass;
use Fux\Http\RequestParser;
use League\Pipeline\Pipeline;
use Fux\Http\Middleware\PreRouteMiddleware;
use Fux\Http\Middleware\PostRouteMiddleware;
use Fux\Interfaces\StageInterface;

class Main
{
    public function run(): void
    {
		$dotenv = Dotenv::createImmutable(__DIR__ . DIRECTORY_SEPARATOR . "..");
		$dotenv->load();

        $pipeline = (new Pipeline)
			->pipe(new RequestParser())
            ->pipe(new PreRouteMiddleware())
			->pipe(new Router())
            ->pipe(new PostRouteMiddleware()) //TODO Make this actually work
			->pipe(new Processor());
//            ->pipe(new displayContent()); //TODO Make this work better

        $pipeline->process($request = []);
    }
}

class displayContent implements StageInterface
{
    public function __invoke(FuxRequestClass $request): FuxRequestClass
    {
        new Home;
        return $request;
    }
}