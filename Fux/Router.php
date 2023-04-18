<?php
namespace Fux;

use Fux\Classes\FuxRequestClass;
use Fux\Classes\FuxRequestHandler;
use Fux\Exceptions\MethodNotAllowedException;
use Fux\Exceptions\NotFoundException;
use Fux\Interfaces\StageInterface;
use App\Routes;

class Router implements StageInterface
{
	public function __invoke($request): FuxRequestClass
	{
		$routes = new Routes();
		$methodMismatch = false;

		foreach($routes->routes as $route)
		{
			$p = explode(':', $route[0]);
			if($p[1] == $request->uri)
			{
				if(strtoupper($p[0]) == $request->method)
				{
					$action = explode("@", $route[1]);
					$request->handler = new FuxRequestHandler;
					$request->handler->handlerClass = $action[0];
					$request->handler->handlerFunction = $action[1];
					$request->handler->handlerNamespace = "App\\Controllers\\";
					return $request;
				} else {
					$methodMismatch = true;
				}
			}
		}

		if ($methodMismatch) throw new MethodNotAllowedException();
		throw new NotFoundException();
	}
}