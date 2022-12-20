<?php
declare(strict_types=1);

namespace AoC\Year2022\Day04;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class CampCleanup
{
	use CanReadFiles;

	private array $_pairs;
	private int $_partOne = 0;
	private int $_partTwo = 0;

	public function __construct()
	{
		$pairsExample = $this->getArrayFromFile('example.txt');
		$pairs = $this->getArrayFromFile('input.txt');

		echo 'Pairs with one range fully contains: ' . $this->_partOne($pairsExample) . " (example)\n";
		echo 'Pairs with one range fully contains: ' . $this->_partOne($pairs) . "\n";

		echo "\n";

		echo 'Pairs with Overlap range contains: ' . $this->_partTwo($pairsExample) . " (example)\n";
		echo 'Pairs with Overlap range contains: ' . $this->_partTwo($pairs) . "\n";
	}

	public function getArrayFromFile(string $filename): array
	{
		$fileData = $this->getFileData($filename);

		$fileToArray = [];
		foreach ($fileData as $iValue) {
			/** @var array $explode */
			$explode = explode(',', $iValue);
			$fileToArray[] = [
				$explode[0],
				$explode[1],
			];
		}

		return $fileToArray;
	}

	private function _partOne(array $pairs): int
	{
		$howManyPairs = 0;
		foreach ($pairs as $pair) {
			[$little_1, $big_1, $little_2, $big_2] = self::_splitPairs($pair);

			if (
				($little_1 >= $little_2 && $big_1 <= $big_2)
				|| ($little_2 >= $little_1 && $big_2 <= $big_1)
			) {
				$howManyPairs++;
			}
		}

		return $howManyPairs;
	}

	private function _partTwo(array $pairs): int
	{
		$howManyPairs = 0;
		foreach ($pairs as $pair) {
			[$little_1, $big_1, $little_2, $big_2] = self::_splitPairs($pair);

			if (
				(
					($little_2 >= $little_1 && $little_2 <= $big_1)
					|| ($big_2 >= $little_1 && $big_2 <= $big_1)
				)
				|| (
					($little_1 >= $little_2 && $little_1 <= $big_2)
					|| ($big_1 >= $little_2 && $big_1 <= $big_2)
				)
			) {
				$howManyPairs++;
			}
		}

		return $howManyPairs;
	}

	private static function _splitPairs(array $pairs): array
	{
		/** @var array $exp_1 */
		$exp_1 = explode('-', $pairs[0]);
		/** @var array $exp_2 */
		$exp_2 = explode('-', $pairs[1]);

		return [
			(int) $exp_1[0],
			(int) $exp_1[1],
			(int) $exp_2[0],
			(int) $exp_2[1],
		];
	}
}
new CampCleanup();