<?php
namespace Fux\Http;

use Fux\Interfaces\StageInterface;
use Fux\Classes\FuxRequestClass;

class RequestParser implements StageInterface
{
    public function __invoke($request): FuxRequestClass
    {
		$request = new FuxRequestClass;
//		$request->server = $_SERVER;
		$request->uri = $_SERVER['REQUEST_URI'];
		$request->method = $_SERVER['REQUEST_METHOD'];

		return $request;
    }
}