<?php
namespace Fux;

use Fux\Exceptions\MethodNotAllowedException;
use Fux\Exceptions\NotFoundException;
use Fux\Http\FuxRequestClass;
use League\Pipeline\StageInterface;
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
					echo "YAS<br/>";
					$request->handler = new $route[1]();
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