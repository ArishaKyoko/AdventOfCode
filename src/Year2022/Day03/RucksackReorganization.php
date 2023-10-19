<?php
declare(strict_types=1);

namespace AoC\Year2022\Day03;

use AoC\Base;

class RucksackReorganization extends Base
{
	private const ALPHABET = 'abcdefghijklmnopqrstuvwxyz';

	public function __construct()
	{
		$itemsExample = $this->getArrayFromFile('example.txt');
		$items = $this->getArrayFromFile('input.txt');

		echo 'Sum of Priorities Part One: ' . $this->_partOne($itemsExample) . " (example)\n";
		echo 'Sum of Priorities Part One: ' . $this->_partOne($items) . "\n";

		echo "\n";

		echo 'Sum of Priorities Part One: ' . $this->_partTwo($itemsExample) . " (example)\n";
		echo 'Sum of Priorities Part One: ' . $this->_partTwo($items) . "\n";
	}

	public function getArrayFromFile(string $filename): array
	{
		return $this->getFileData($filename);
	}

	/**
	 * @param array $items
	 * @return int
	 */
	private function _partOne(array $items): int
	{
		$priorities = [];
		foreach ($items as $item) {
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

	private function _partTwo(array $items): int
	{
		$repairedData = [];
		$tmp = [];
		$j = 0;
		foreach ($items as $item) {
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
new RucksackReorganization();