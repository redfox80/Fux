<?php

namespace App;

use App\Controllers\HomeController;
use Content\Home;

class Routes
{
	public function __construct()
	{
		return $this->routes;
	}

	public array $routes = [
		['get:/', 'HomeController@getHome'],
		['get:/paller', 'SlumpController@getSlump']
	];
}