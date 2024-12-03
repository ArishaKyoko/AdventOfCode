<?php
declare(strict_types=1);

namespace AoC\Year2024\Day03;

use AoC\Base;
use function preg_match_all;

class MullItOver extends Base
{
	public function partOne(): int|string
	{
		$sum = 0;
		foreach ($this->fileArray as $string) {
			if (!preg_match_all('/mul\(\d*,\d*\)/', $string, $matches)) {
				continue;
			}

			foreach ($matches[0] as $match) {
				preg_match_all('/\d+/', $match, $matches2);
				$sum += (int) $matches2[0][0] * (int) $matches2[0][1];
			}
		}

		return $sum;
	}

	public function partTwo(): int|string
	{
		$sum = 0;

		$do = true;
		foreach ($this->fileArray as $string) {
			if (!preg_match_all('/(mul\(\d+,\d+\)|do\(\)|don\'t\(\))/', $string, $matches)) {
				continue;
			}
			foreach ($matches[0] as $match) {
				if (str_contains($match, 'don\'t')) {
					$do = false;
				} else if (str_contains($match, 'do')) {
					$do = true;
				} else if (str_contains($match, 'mul') && $do) {
					preg_match_all('/\d+/', $match, $matches2);
					$sum += (int) $matches2[0][0] * (int) $matches2[0][1];
				}
			}
		}

		return $sum;
	}
}
