<?php

namespace Fux\Tools\Pipe;

class Pipe
{
	private array $pipeSections;

	public function __construct(...$pipeSections)
	{
		$this->pipeSections = $pipeSections;
	}

	public function section($section): Pipe
	{
		$this->pipeSections[] = $section;
		return $this;
	}

	public function process($payload)
	{
		foreach ($this->pipeSections as $section) {
			$payload = $section($payload);
		}

		return $payload;
	}
}