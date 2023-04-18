<?php

namespace Fux\Tools;

class Cookies
{
	/**
	 * @param $name string Name of the cookie
	 * @param $value string Value of the cookie
	 * @param $expiration int How many minutes until cookie should expire, if 0 or not set cookie expires when session is ended
	 * @return mixed
	 */
	public static function createCookie(string $name, mixed $value, int $expiration = 0): mixed
	{
		return setcookie($name, $value, Cookies::expires($expiration));
	}

	/**
	 * @param $name string The name of the cookie
	 * @return mixed
	 */
	public static function getCookie(string $name): mixed
	{
		return $_COOKIE[$name];
	}

	/**
	 * @param string $name Name of the cookie to check for
	 * @return bool true if exists or false if not
	 */
	public static function doesExist(string $name): bool
	{
		return (Cookies::getCookie($name) !== null);
	}

	/**
	 * @param string $name Name of the cookie to delete
	 * @return bool True if success or false if it is not
	 */
	public static function deleteCookie(string $name): bool
	{
		if (isset($_COOKIE[$name])) {
			unset($_COOKIE[$name]);
			Cookies::createCookie($name, null, -1);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param $min int Minutes
	 * @return int Expiration converted to unix timestamp
	 */
	private static function expires(int $min): int
	{
		return time() + ($min * 60);
	}
}