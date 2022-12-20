<?php
declare(strict_types=1);

namespace AoC\Year2022\Day01;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class CalorieCounting
{
	use CanReadFiles;

	private array $_elves = [];
	private array $_elvesSum = [];
	private array $_topThreeElvesCallories = [];

	public function __construct()
	{
		$this->getArrayFromFile();

		$this->_partOne();
		echo 'Max Calories Elve: ' . max($this->_elvesSum) . "\n";

		$this->_partTwo();
		echo 'Max three Calories Elves: ' . array_sum($this->_topThreeElvesCallories) . "\n";
	}

	public function getArrayFromFile(): void
	{
//		$fileData = $this->getFileData('example.txt');
		$fileData = $this->getFileData('input.txt');

		$j = 0;
		foreach ($fileData as $iValue) {
			if (is_numeric($iValue)) {
				$this->elves[$j][] = $iValue;
				continue;
			}
			$j++;
		}
	}

	private function _partOne(): void
	{
		foreach ($this->_elves as $elve => $calories) {
			$this->_elvesSum[$elve] = array_sum($calories);
		}
	}

	private function _partTwo(): void
	{
		rsort($this->_elvesSum);
		for ($i = 0; $i < 3; $i++) {
			$this->_topThreeElvesCallories[] = $this->_elvesSum[$i];
		}
	}
}
new CalorieCounting();