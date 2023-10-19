<?php
declare(strict_types=1);

namespace AoC\Year2022\Day01;

use AoC\Base;

class CalorieCounting extends Base
{

	public function __construct()
	{

	}

	/**
	 * @param string $filename
	 * @return array
	 */
	public function getArrayFromFile(string $filename): array
	{
		$fileData = $this->getFileData($filename);

		$fileToArray = [];
		$j = 0;
		foreach ($fileData as $iValue) {
			if (is_numeric($iValue)) {
				$fileToArray[$j][] = $iValue;
				continue;
			}
			$j++;
		}

		return $fileToArray;
	}

	public function output(): void
	{
		$elves = $this->getArrayFromFile('input.txt');
		$elvesExample = $this->getArrayFromFile('example.txt');

		$elvesSumExample = $this->_partOne($elvesExample);
		$elvesSum = $this->_partOne($elves);

		echo 'Max Calories Elve: '. max($elvesSumExample) . " (example)\n";
		echo 'Max Calories Elve: '. max($elvesSum) . "\n";

		echo "\n";

		$topThreeElvesCaloriesExample = $this->_partTwo($elvesSumExample);
		$topThreeElvesCalories = $this->_partTwo($elvesSum);

		echo 'Max three Calories Elves: ' . array_sum($topThreeElvesCaloriesExample) . " (example)\n";
		echo 'Max three Calories Elves: ' . array_sum($topThreeElvesCalories) . "\n";
	}

	/**
	 * Sum Calories pro elf
	 *
	 * @param array $elves
	 * @return array
	 */
	public static function _partOne(array $elves): array
	{
		$elvesSum = [];
		foreach ($elves as $elf => $calories) {
			$elvesSum[$elf] = array_sum($calories);
		}

		return $elvesSum;
	}

	/**
	 * Sum of Calories of top three elves
	 *
	 * @param array $elvesSum
	 * @return array
	 */
	public static function _partTwo(array $elvesSum): array
	{
		$topThreeElvesCalories = [];
		rsort($elvesSum);
		for ($i = 0; $i < 3; $i++) {
			$topThreeElvesCalories[] = $elvesSum[$i];
		}
		return $topThreeElvesCalories;
	}
}