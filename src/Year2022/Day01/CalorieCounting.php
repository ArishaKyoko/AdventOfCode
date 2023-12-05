<?php
declare(strict_types=1);

namespace AoC\Year2022\Day01;

use AoC\Base;

class CalorieCounting extends Base
{
    private array $elvesSum = [];

	public function getArrayFromFile(): void
	{
		$fileData = $this->getFileData();

		$fileToArray = [];
		$j = 0;
		foreach ($fileData as $iValue) {
			if (is_numeric($iValue)) {
				$fileToArray[$j][] = $iValue;
				continue;
			}
			$j++;
		}

		$this->fileArray = $fileToArray;
	}

    /**
     * Sum Calories pro elf
     *
     * @return int
     */
	public function partOne(): int
	{
		$elvesSum = [];
		foreach ($this->fileArray as $elf => $calories) {
			$elvesSum[$elf] = array_sum($calories);
		}

        $this->elvesSum = $elvesSum;

		return max($elvesSum);
	}

    /**
     * Sum of Calories of top three elves
     *
     * @return int
     */
	public function partTwo(): int
	{
		$topThreeElvesCalories = [];
		rsort($this->elvesSum);
		for ($i = 0; $i < 3; $i++) {
			$topThreeElvesCalories[] = $this->elvesSum[$i];
		}
		return array_sum($topThreeElvesCalories);
	}
}