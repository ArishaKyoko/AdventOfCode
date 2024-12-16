<?php
declare(strict_types=1);

namespace AoC\Year2024\Day11;

use AoC\Base;
use AoC\Enums\Files;
use function array_map;
use function count;
use function explode;
use function str_split;
use function substr;

class PlutonianPebbles extends Base
{
	private array $start;
	public function __construct(Files $filename)
	{
		parent::__construct($filename);

		foreach ($this->fileArray as $string) {
			$this->start = array_map('intval', explode(' ', $string));
		}
	}

	public function partOne(): int|string
	{
		$current = $this->start;
		for ($i = 0; $i < 25; $i++) {
			$current = $this->iterate($current);
		}

		return count($current);
	}

	public function partTwo(): int|string
	{
//		$current = $this->start;
//		for ($i = 0; $i < 75; $i++) {
//			$current = $this->iterate($current);
//		}

		return 0; //count($current);
	}

	private function checkRules(int $number): array
	{
		if ($number === 0) {
			return [1];
		}

		$numbers = str_split((string) $number);
		if (count($numbers) % 2 === 0) {
			$number1 = (int) substr((string) $number, 0, (count($numbers) / 2));
			$number2 = (int) substr((string) $number, (count($numbers) / 2));

			return [$number1, $number2];
		}

		return [$number * 2024];
	}

	private function iterate($current): array
	{
		$new = [];
		foreach ($current as $number) {
			$new = array_merge($new, $this->checkRules($number));
		}
		return $new;
	}
}
