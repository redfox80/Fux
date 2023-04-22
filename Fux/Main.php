<?php

namespace Fux;

use Dotenv\Dotenv;
use Fux\Http\RequestParser;
use Fux\Http\Middleware\PreRouteMiddleware;
use Fux\Http\Middleware\PostRouteMiddleware;
use Fux\Tools\Pipe\Pipe;

class Main
{
	public function run(): void
	{
		$dotenv = Dotenv::createImmutable(__DIR__ . DIRECTORY_SEPARATOR . "..");
		$dotenv->load();

		$pipes = (new Pipe())
			->section(new RequestParser())
			->section(new PreRouteMiddleware())
			->section(new Router())
			->section(new PostRouteMiddleware())
			->section(new Processor());

		$pipes->process($request = []);
	}
}