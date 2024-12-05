<?php
declare(strict_types=1);

namespace AoC\Year2024\Day02;

use AoC\Base;
use AoC\Enums\Files;
use function abs;
use function array_map;
use function array_unique;
use function count;
use function explode;

class RedNosedReports extends Base
{
	/** @var array<int[]> $reports */
	private array $reports;

	public function __construct(Files $filename)
	{
		parent::__construct($filename);

		foreach ($this->fileArray as $string) {
			$this->reports[] = array_map('intval', explode(' ', $string));
		}
	}

	public function partOne(): int
	{
		$safe = 0;
		foreach ($this->reports as $report) {
			if ($this->isReportSafe($report)) {
				$safe++;
			}
		}

		return $safe;
	}

	public function partTwo(): int
	{
		$safe = 0;
		foreach ($this->reports as $report) {
			if ($this->isReportSafe($report)) {
				$safe++;
				continue;
			}

			for ($i = 0; $i < count($report); $i++) {
				$corrupt = $report;
				unset($corrupt[$i]);

				if ($this->isReportSafe(array_values($corrupt))) {
					$safe++;
					continue 2;
				}
			}
		}

		return $safe;
	}

	private function isReportSafe(array $report): bool
	{
		return $this->isAllIncreasing($report) || $this->isAllDecreasing($report);
	}

	private function isAllIncreasing(array $report): bool
	{
		for ($i = 1; $i < count($report); $i++) {
			if ($report[$i] <= $report[$i - 1] || abs($report[$i] - $report[$i - 1]) > 3) {
				return false;
			}
		}
		return true;
	}

	private function isAllDecreasing(array $report): bool
	{
		for ($i = 1; $i < count($report); $i++) {
			if ($report[$i] >= $report[$i - 1] || abs($report[$i] - $report[$i - 1]) > 3) {
				return false;
			}
		}
		return true;
	}
}
