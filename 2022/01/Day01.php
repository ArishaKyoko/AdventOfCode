<?php
declare(strict_types=1);

class Day01
{
	private array $_elves;
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
		$fileData = file('input.txt');

		if (!is_array($fileData)) {
			return;
		}

		$j = 0;
		foreach ($fileData as $iValue) {
			/** @var array $explode */
			$explode = explode("\n", $iValue);
			if (is_numeric($explode[0])) {
				$this->elves[$j][] = $explode[0];
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
new Day01();