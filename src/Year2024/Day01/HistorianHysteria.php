<?php
declare(strict_types=1);

namespace AoC\Year2024\Day01;

use AoC\Base;
use AoC\Enums\Files;
use Illuminate\Support\Collection;
use function explode;

class HistorianHysteria extends Base
{
	private Collection $left;
	private Collection $right;

	public function __construct(Files $filename)
	{
		parent::__construct($filename);

		$left = new Collection();
		$right = new Collection();
		foreach ($this->fileArray as $string) {
			$explode = explode('   ', $string);
			$left->push((int) $explode[0]);
			$right->push((int) $explode[1]);
		}

		$this->left = $left;
		$this->right = $right;
	}

	public function partOne(): int
	{
		$left = $this->left->sort()->values();
		$right = $this->right->sort()->values();

		$sum = 0;
		for ($i = 0; $i < count($left); $i++) {
			$sum += abs($left[$i] - $right[$i]);
		}

		return $sum;
	}

	public function partTwo(): int
	{
		$sum = 0;
		foreach ($this->left as $number) {
			$countRight = $this->right->filter(function (int $i) use ($number) { return $i === $number; })->count();
			$sum += $number * $countRight;
		}

		return $sum;
	}
}
