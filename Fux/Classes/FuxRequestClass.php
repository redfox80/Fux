<?php
namespace Fux\Classes;

use Fux\Classes\FuxRequestHandler;

class FuxRequestClass
{
	public string $uri;
	public string $method;
//	public array $server;
	public FuxRequestHandler $handler;
}