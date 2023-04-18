<?php
namespace Fux\Exceptions;

class MethodNotAllowedException extends BaseException
{
	/**
	 * @param $message string Error message
	 * @param $code Integer (Optional) defaults to 404
	 */
	public function __construct($message = "This method is not allowed", $code=405)
	{
		parent::__construct($message, 405);
	}
}