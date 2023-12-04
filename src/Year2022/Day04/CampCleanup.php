<?php
declare(strict_types=1);

namespace AoC\Year2022\Day04;

use AoC\Base;
use AoC\Enums\Files;

class CampCleanup extends Base
{
	private array $_pairs;
	private int $_partOne = 0;
	private int $_partTwo = 0;

    public function __construct(Files $filename)
    {
        $this->setDayAndYear(__NAMESPACE__);
        parent::__construct($filename);
    }

	public function getArrayFromFile(): void
    {
		$fileData = $this->getFileData();

		$fileToArray = [];
		foreach ($fileData as $iValue) {
			/** @var array $explode */
			$explode = explode(',', $iValue);
			$fileToArray[] = [
				$explode[0],
				$explode[1],
			];
		}

		$this->fileArray = $fileToArray;
	}

    public function output(): void
    {
        echo 'Output Part One: ' . $this->partOne();
        echo PHP_EOL;
        echo 'Output Part Two: ' . $this->partTwo();
    }

	public function partOne(): int
	{
		$howManyPairs = 0;
		foreach ($this->fileArray as $pair) {
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

	public function partTwo(): int
	{
		$howManyPairs = 0;
		foreach ($this->fileArray as $pair) {
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
