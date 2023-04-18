<?php
namespace Fux\Exceptions;

class NotAllowedException extends BaseException
{
	/**
	 * @param $message string Error message
	 * @param $code Integer (Optional) defaults to 403
	 */
    public function __construct($message = "This action is not allowed", $code=403)
    {
        parent::__construct($message, 403);
    }
}