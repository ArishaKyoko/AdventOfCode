<?php
declare(strict_types=1);

namespace AoC\Year2022\Day05;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class SupplyStacks
{
	use CanReadFiles;

	private array $_cratesExample = [
		1 => ['Z', 'N'],
		2 => ['M', 'C', 'D'],
		3 => ['P'],
	];

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

	public function __construct()
	{
		$rearrangementExample = $this->getArrayFromFile('example.txt');
		$rearrangement = $this->getArrayFromFile('input.txt');

		echo 'Crates end up top of stack: ' . $this->_partOne($rearrangementExample, $this->_cratesExample) . " (example)\n";
		echo 'Crates end up top of stack: ' . $this->_partOne($rearrangement, $this->_crates) . "\n";

		echo "\n";

		echo 'Crates end up top of stack: ' . $this->_partTwo($rearrangementExample, $this->_cratesExample) . " (example)\n";
		echo 'Crates end up top of stack: ' . $this->_partTwo($rearrangement, $this->_crates) . "\n";
	}

	/**
	 * @param string $filename
	 * @return array
	 */
	public function getArrayFromFile(string $filename): array
	{
		$fileData = $this->getFileData($filename);

		$fileToArray = [];
		$buildCrates = true;
		foreach ($fileData as $iValue) {
			if ($buildCrates) {
				if ($iValue === '') {
					$buildCrates = false;
				}
				continue;
			}

			$fileToArray[] = $iValue;
		}

		return $fileToArray;
	}

	/**
	 * @param array $rearrangements
	 * @param array $crates
	 * @return string
	 */
	private function _partOne(array $rearrangements, array $crates): string
	{
		foreach ($rearrangements as $rearrangement) {
			[$move, $from, $to] = self::_splitRearrangements($rearrangement);

			for ($i = 1; $i <= $move; $i++) {
				$slice = $crates[$from][count($crates[$from])-1];
				$crates[$to][] = $slice;
				unset($crates[$from][count($crates[$from])-1]);
			}

			// keys neu setzen
			foreach ($crates as &$crate) {
				$crate = array_values($crate);
			}
			unset($crate);
		}

		$endsUp = [];
		foreach ($crates as $crate) {
			$endsUp[] = $crate[count($crate)-1];
		}

		return implode('', $endsUp);
	}

	/**
	 * @param array $rearrangements
	 * @param array $crates
	 * @return string
	 */
	private function _partTwo(array $rearrangements, array $crates): string
	{
		foreach ($rearrangements as $rearrangement) {
			[$move, $from, $to] = self::_splitRearrangements($rearrangement);

			//todo
			array_splice($crates[$from], -1, $move, $crates[$to]);

			// keys neu setzen
			foreach ($crates as &$crate) {
				$crate = array_values($crate);
			}
			unset($crate);
		}

		$endsUp = [];
		foreach ($crates as $crate) {
			$endsUp[] = $crate[count($crate)-1];
		}

		return implode('', $endsUp);
	}

	/**
	 * @param string $rearrangement
	 * @return int[]
	 */
	private static function _splitRearrangements(string $rearrangement): array
	{
		/** @var array $explode */
		$explode = explode(' ', $rearrangement);
		return [
			(int) $explode[1], //move
			(int) $explode[3], //from
			(int) $explode[5], //to
		];
	}
}
new SupplyStacks();