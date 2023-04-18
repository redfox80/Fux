<?php
namespace Content;

class Home extends ContentController
{
    public function __construct()
    {
        $this->print("Test content");
		$this->print("<br/><br/>" . $_ENV['APP_NAME']);
    }
}