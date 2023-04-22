<?php

namespace Fux\Exceptions;

class DatabaseException extends BaseException
{
	/**
	 * @param $message string Error message
	 * @param $code Integer (Optional) defaults to 404
	 */
	public function __construct($message = "An error occurred while connecting to database", $code=500)
	{
		parent::__construct($message, 500);
	}
}