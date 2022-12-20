<?php
declare(strict_types=1);

namespace AoC\Year2022\Day06;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class TuningTrouble
{
	use CanReadFiles;

	public function __construct()
	{
		$itemsExample1 = $this->getArrayFromFile('example1.txt');
		$itemsExample2 = $this->getArrayFromFile('example2.txt');
		$itemsExample3 = $this->getArrayFromFile('example3.txt');
		$itemsExample4 = $this->getArrayFromFile('example4.txt');
		$itemsExample5 = $this->getArrayFromFile('example5.txt');
		$items = $this->getArrayFromFile('input.txt');

		echo 'Marker after found 4 distinct characters: ' . $this->_partOne($itemsExample1) . " (example 1) \n";
		echo 'Marker after found 4 distinct characters: ' . $this->_partOne($itemsExample2) . " (example 2) \n";
		echo 'Marker after found 4 distinct characters: ' . $this->_partOne($itemsExample4) . " (example 3) \n";
		echo 'Marker after found 4 distinct characters: ' . $this->_partOne($itemsExample4) . " (example 4) \n";
		echo 'Marker after found 4 distinct characters: ' . $this->_partOne($itemsExample5) . " (example 5) \n";
		echo 'Marker after found 4 distinct characters: ' . $this->_partOne($items) . "\n";

		echo "\n";

		echo 'Marker after found 14 distinct characters: ' . $this->_partTwo($itemsExample1) . " (example 1) \n";
		echo 'Marker after found 14 distinct characters: ' . $this->_partTwo($itemsExample2) . " (example 2) \n";
		echo 'Marker after found 14 distinct characters: ' . $this->_partTwo($itemsExample3) . " (example 3) \n";
		echo 'Marker after found 14 distinct characters: ' . $this->_partTwo($itemsExample4) . " (example 4) \n";
		echo 'Marker after found 14 distinct characters: ' . $this->_partTwo($itemsExample5) . " (example 5) \n";
		echo 'Marker after found 14 distinct characters: ' . $this->_partTwo($items) . "\n";
	}

	/**
	 * The nice array from file
	 *
	 * @param string $filename
	 * @return array
	 */
    private function getArrayFromFile(string $filename): array
	{
		$fileDataExample1 = $this->getFileData($filename);
		$fileToArray = [];
		foreach ($fileDataExample1 as $iValue) {
			$fileToArray = str_split($iValue);
		}
		return $fileToArray;
	}

	/**
	 * Search the number with 4 stack size
	 *
	 * @param array $items
	 * @return int
	 */
	private function _partOne(array $items): int
	{
		return self::_character($items, 4);
	}

	/**
	 * Search the number with 14 stack size
	 *
	 * @param array $items
	 * @return int
	 */
	private function _partTwo(array $items): int
	{
		return self::_character($items, 14);
	}

	/**
	 * Return the Number of character space without double characters
	 *
	 * @param array $items
	 * @param int $size
	 * @return int
	 */
	private static function _character(array $items, int $size): int
	{
		$tmp = [];
		$i = 0;
		foreach ($items as $item) {
			if (count($tmp) <= ($size-1)) {
				$tmp[] = $item;
				$i++;
				continue;
			}

			if (count(array_count_values($tmp)) === $size) {
				return $i;
			}

			unset($tmp[0]);
			$tmp[] = $item;
			$tmp = array_values($tmp);
			$i++;
		}

		return $i;
	}
}
new TuningTrouble();