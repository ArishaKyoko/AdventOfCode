<?php
declare(strict_types=1);

namespace AoC\Year2022\Day06;

use AoC\Base;

class TuningTrouble extends Base
{
    public function getArrayFromFile(): void
    {
		$fileData = $this->getFileData();
		$fileToArray = [];
		foreach ($fileData as $iValue) {
			$fileToArray = str_split($iValue);
		}
		$this->fileArray = $fileToArray;
	}

    /**
     * Search the number with 4 stack size
     *
     * @return int
     */
	public function partOne(): int
	{
		return $this->_character(4);
	}

    /**
     * Search the number with 14 stack size
     *
     * @return int
     */
	public function partTwo(): int
	{
		return $this->_character(14);
	}

    /**
     * Return the Number of character space without double characters
     *
     * @param int $size
     * @return int
     */
	private function _character(int $size): int
	{
		$tmp = [];
		$i = 0;
		foreach ($this->fileArray as $item) {
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
