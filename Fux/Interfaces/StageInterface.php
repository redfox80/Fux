<?php

namespace Fux\Interfaces;

use Fux\Classes\FuxRequestClass;

interface StageInterface
{
	/**
	 * Process the payload.
	 *
	 * @param FuxRequestClass $request
	 *
	 * @return FuxRequestClass
	 */
	public function __invoke(FuxRequestClass $request): FuxRequestClass;
}
