<?php

namespace App\Middleware;

use Fux\Exceptions\NotAllowedException;
use Fux\Tools\Cookies;

class TestCheck
{
	public function __construct($payload)
	{
		$temp = Cookies::getCookie("Test");
		if ($temp === null) {
			Cookies::createCookie("Test", true, 5);
			$temp = Cookies::getCookie("Test");
		}
		if ($temp) {
			throw new NotAllowedException();
		}

		return $payload;
	}
}