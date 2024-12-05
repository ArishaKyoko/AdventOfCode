<?php

namespace AoC\Traits;

trait CanFindPositions
{


	private function findPositionTopLeft(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x - 1][$y - 1]) && $list[$x - 1][$y - 1] === $search;
	}

	private function findPositionTop(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x - 1][$y]) && $list[$x - 1][$y] === $search;
	}

	private function findPositionTopRight(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x - 1][$y + 1]) && $list[$x - 1][$y + 1] === $search;
	}

	private function findPositionLeft(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x][$y - 1]) && $list[$x][$y - 1] === $search;
	}

	private function findPosition(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x][$y]) && $list[$x][$y] === $search;
	}

	private function findPositionRight(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x][$y + 1]) && $list[$x][$y + 1] === $search;
	}

	private function findPositionDownLeft(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x + 1][$y - 1]) && $list[$x + 1][$y - 1] === $search;
	}

	private function findPositionDown(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x + 1][$y]) && $list[$x + 1][$y] === $search;
	}

	private function findPositionDownRight(array $list, int $x, int $y, $search): bool
	{
		return isset($list[$x + 1][$y + 1]) && $list[$x + 1][$y + 1] === $search;
	}
}