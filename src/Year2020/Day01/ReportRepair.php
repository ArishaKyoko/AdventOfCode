<?php
declare(strict_types=1);

namespace AoC\Year2020\Day01;

use AoC\Base;
use function array_reverse;

class ReportRepair extends Base
{
	public function partOne(): int|string
	{
		$reports = $this->fileArray;
		rsort($reports);
		$product = 0;

		foreach ($reports as $key => $entry) {
			foreach (array_reverse($reports, true) as $keyReverse => $entryReverse) {
				if ($entry + $entryReverse === 2020) {
					$product += $entry * $entryReverse;
					unset($reports[$key], $reports[$keyReverse]);
					continue 2;
				}
			}
		}

		return $product;
	}

	public function partTwo(): int|string
	{
		return 0;
	}
}
