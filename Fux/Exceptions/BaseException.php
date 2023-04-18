<?php
namespace Fux\Exceptions;

use Fux\Interfaces\ExceptionInterface;

class BaseException extends \Exception implements ExceptionInterface
{
    /**
     * @param $message string Error message
     * @param $code int Error code
     */
    public function __construct($message = null, $code = 0)
    {
        if(!$message)
        {
            throw new $this('Unknown' . get_class($this));
        }

		$this->printErrorMessage($message);
		http_response_code($code);
        parent::__construct($message,$code);
        exit();
    }

	private function printErrorMessage($message): void
	{
		echo $message;
	}
}