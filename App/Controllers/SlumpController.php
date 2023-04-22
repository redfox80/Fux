<?php

namespace App\Controllers;

class SlumpController extends Controller
{
	private const kartonger = 534;
	private const palleStr = 65;

	public function getSlump()
	{
		echo floor(self::kartonger / self::palleStr);
		echo "<br/>";
		echo self::kartonger % self::palleStr;
	}
}