<?php
namespace Fux\Http;

use League\Pipeline\StageInterface;

class RequestParser implements StageInterface
{
    public function __invoke($payload): FuxRequestClass
    {
		$request = new FuxRequestClass;
//		$request->server = $_SERVER;
		$request->uri = $_SERVER['REQUEST_URI'];
		$request->method = $_SERVER['REQUEST_METHOD'];

		return $request;
    }
}