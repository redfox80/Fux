<?php

namespace Fux\Tools\Database;

class DbInstance
{
	private $instance;

	public function __construct()
	{
		$this->instance = new DbConnection;
	}
}