<?php
namespace Fux\Exceptions;

class NotFoundException extends BaseException
{
	/**
	 * @param $message string Error message
	 * @param $code Integer (Optional) defaults to 404
	 */
	public function __construct($message = "This resource can not be found", $code=404)
	{
		parent::__construct($message, 404);
	}
}