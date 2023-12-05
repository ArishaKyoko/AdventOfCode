<?php
declare(strict_types=1);

namespace AoC\Year2022\Day03;

use AoC\Base;

class RucksackReorganization extends Base
{
	private const ALPHABET = 'abcdefghijklmnopqrstuvwxyz';

	/**
	 * @param array $items
	 * @return int
	 */
	public function partOne(): int
	{
		$priorities = [];
		foreach ($this->fileArray as $item) {
			$count = strlen($item);
			$string1 = str_split(substr($item, 0, ($count/2)));
			$string2 = str_split(substr($item, ($count/2)));
			$diff = array_unique(array_intersect($string1, $string2));
			$newString = implode('', $diff);

			$priority = strpos(self::ALPHABET, strtolower($newString)) + 1;
			if (ctype_upper($newString)) {
				$priority += 26;
			}

			$priorities[] = $priority;
		}

		return array_sum($priorities);
	}

	public function partTwo(): int
	{
		$repairedData = [];
		$tmp = [];
		$j = 0;
		foreach ($this->fileArray as $item) {
			$tmp[] = $item;
			$j++;

			if ($j === 3) {
				$repairedData[] = $tmp;
				$j = 0;
				$tmp = [];
			}
		}

		$priorities = [];
		foreach ($repairedData as $data) {
			$string1 = str_split($data[0]);
			$string2 = str_split($data[1]);
			$string3 = str_split($data[2]);

			$diff = array_unique(array_intersect($string1, $string2, $string3));
			$newString = implode('', $diff);

			$priority = strpos(self::ALPHABET, strtolower($newString)) + 1;
			if (ctype_upper($newString)) {
				$priority += 26;
			}

			$priorities[] = $priority;
		}

		return array_sum($priorities);
	}
}
