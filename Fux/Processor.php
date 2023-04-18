<?php

namespace Fux;

use Fux\Classes\FuxRequestClass;
use Fux\Interfaces\StageInterface;

class Processor implements StageInterface
{
	public function __invoke(FuxRequestClass $request): FuxRequestClass
	{
		$handlerClass = new ($request->handler->handlerNamespace . $request->handler->handlerClass);
		$handlerFunction = $request->handler->handlerFunction;
		$handlerClass->$handlerFunction();

		return $request;
	}
}