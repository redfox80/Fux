<?php
namespace App\Middleware;

use Fux\Tools\Cookies;

class AnotherTestCheck
{
    public function __construct($payload)
    {
		if(Cookies::doesExist("Test"))
		{
			Cookies::deleteCookie("Test");
		}

        return $payload;
    }
}