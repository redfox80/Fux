<?php

namespace Fux\Tools\Database;

use Fux\Exceptions\DatabaseException;

class DbConnection
{
	private \mysqli $connection;

	public function __destruct()
	{
		$this->disconnect();
	}

	public function query(string $qs): bool|\mysqli_result
	{
		if(!isset($this->connection)) if(!$this->connect()) throw new DatabaseException();

		return $this->connection->query($qs);
	}

	private function connect(): bool|\mysqli
	{
		$this->connection = mysqli_connect(
			$_ENV['DB_HOST'],
			$_ENV['DB_USER'],
			$_ENV['DB_PASSWORD'],
			$_ENV['DB_SCHEMA']
		);

		return $this->connection;
	}

	private function disconnect(): bool
	{
		return $this->connection->close();
	}
}