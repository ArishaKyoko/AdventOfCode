<?php
declare(strict_types=1);

class Day03
{
	private array $_items = [];
	private array $_partOne = [];
	private array $_partTwo = [];

	private const ALPHABET = 'abcdefghijklmnopqrstuvwxyz';

	public function __construct()
	{
		$this->getArrayFromFile();

		$this->_partOne();
		echo 'Sum of Priorities Part One: ' . array_sum($this->_partOne) . "\n";

		$this->_partTwo();
		echo 'Sum of Priorities Part One: ' . array_sum($this->_partTwo) . "\n";
	}

	public function getArrayFromFile(): void
	{
		$fileData = file('input.txt');

		if (!is_array($fileData)) {
			return;
		}

		$rows = [];
		foreach ($fileData as $iValue) {
			/** @var array $explode */
			$explode = explode("\n", $iValue);
			$rows[] = $explode[0];
		}

		$this->_items = $rows;
	}

	private function _partOne(): void
	{
		foreach ($this->_items as $item) {
			$count = strlen($item);
			$string1 = str_split(substr($item, 0, ($count/2)));
			$string2 = str_split(substr($item, ($count/2)));
			$diff = array_unique(array_intersect($string1, $string2));
			$newString = implode('', $diff);

			$prirority = strpos(self::ALPHABET, strtolower($newString)) + 1;
			if (ctype_upper($newString)) {
				$prirority += 26;
			}

			$this->_partOne[] = $prirority;
		}
	}

	private function _partTwo(): void
	{
		$prepairedData = [];
		$tmp = [];
		$j = 0;
		foreach ($this->_items as $item) {
			$tmp[] = $item;
			$j++;

			if ($j === 3) {
				$prepairedData[] = $tmp;
				$j = 0;
				$tmp = [];
			}
		}

		foreach ($prepairedData as $data) {
			$string1 = str_split($data[0]);
			$string2 = str_split($data[1]);
			$string3 = str_split($data[2]);

			$diff = array_unique(array_intersect($string1, $string2, $string3));
			$newString = implode('', $diff);

			$prirority = strpos(self::ALPHABET, strtolower($newString)) + 1;
			if (ctype_upper($newString)) {
				$prirority += 26;
			}

			$this->_partTwo[] = $prirority;
		}

	}
}
new Day03();