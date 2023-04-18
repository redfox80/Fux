<?php

namespace Fux;

use Content\Home;
use Dotenv\Dotenv;
use Fux\Http\RequestParser;
use League\Pipeline\Pipeline;
use Fux\Http\Middleware\PreRouteMiddleware;
use Fux\Http\Middleware\PostRouteMiddleware;
use League\Pipeline\StageInterface;

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
            ->pipe(new displayContent()); //TODO Make this work better

        $pipeline->process($payload = []);
    }
}

class displayContent implements StageInterface
{
    public function __invoke($payload)
    {
        new Home;
        return $payload;
    }
}