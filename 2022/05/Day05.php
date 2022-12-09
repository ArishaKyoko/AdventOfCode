<?php
declare(strict_types=1);

class Day05
{
	// example
//	private array $_crates = [
//		1 => ['Z', 'N'],
//		2 => ['M', 'C', 'D'],
//		3 => ['P'],
//	];

	private array $_crates = [
		1 => ['Z', 'J', 'G'],
		2 => ['Q', 'L', 'R', 'P', 'W', 'F', 'V', 'C'],
		3 => ['F', 'P', 'M', 'C', 'L', 'G', 'R'],
		4 => ['L', 'F', 'B', 'W', 'P', 'H', 'M'],
		5 => ['G', 'C', 'F', 'S', 'V', 'Q'],
		6 => ['W', 'H', 'J', 'Z', 'M', 'Q', 'T', 'L'],
		7 => ['H', 'F', 'S', 'B', 'V'],
		8 => ['F', 'J', 'Z', 'S'],
		9 => ['M', 'C', 'D', 'P', 'F', 'H', 'B', 'T'],
	];

	private array $_rearrangement;

	private array $_partOne = [];
	private array $_partTwo = [];

	public function __construct()
	{
		$this->getArrayFromFile();

		$this->_partOne();
		echo 'Crates end up top of stack: ' . implode('', $this->_partOne) . "\n";

		$this->_partTwo();
		echo 'Crates end up top of stack: ' . implode('', $this->_partTwo) . "\n";
	}

	public function getArrayFromFile(): void
	{
		$fileData = file('input.txt');

		if (!is_array($fileData)) {
			return;
		}

		$buildCrates = true;
		foreach ($fileData as $iValue) {
			/** @var array $explode */
			$explode = explode("\n", $iValue);

			if ($buildCrates) {
				if ($explode[0] === '') {
					$buildCrates = false;
				}
				continue;
			}

			$this->_rearrangement[] = $explode[0];
		}
	}

	private function _partOne(): void
	{
		$_crates = $this->_crates;
		foreach ($this->_rearrangement as $rearrangement) {
			/** @var array $explode */
			$explode = explode(' ', $rearrangement);
			$move = (int) $explode[1];
			$from = (int) $explode[3];
			$to = (int) $explode[5];

			for ($i = 1; $i <= $move; $i++) {
				$slice = $_crates[$from][count($_crates[$from])-1];
				$_crates[$to][] = $slice;
				unset($_crates[$from][count($_crates[$from])-1]);
			}

			// keys neu setzen
			foreach ($_crates as &$crate) {
				$crate = array_values($crate);
			}
			unset($crate);
		}

		foreach ($_crates as $crates) {
			$this->_partOne[] = $crates[count($crates)-1];
		}
	}

	private function _partTwo(): void
	{
		$_crates = $this->_crates;
		foreach ($this->_rearrangement as $rearrangement) {
			/** @var array $explode */
			$explode = explode(' ', $rearrangement);
			$move = (int) $explode[1];
			$from = (int) $explode[3];
			$to = (int) $explode[5];

			//todo
			array_splice($_crates[$from], -1, $move, $_crates[$to]);

			// keys neu setzen
			foreach ($_crates as &$crate) {
				$crate = array_values($crate);
			}
			unset($crate);
		}

		foreach ($_crates as $crates) {
			$this->_partTwo[] = $crates[count($crates)-1];
		}
	}
}
new Day05();