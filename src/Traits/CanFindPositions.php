<?php

namespace AoC\Traits;

trait CanFindPositions
{
	/** @var array<string[]> $list */
	public array $list = [];

	private function findPositionTopLeft(int $x, int $y, $search): bool
	{
		return isset($this->list[$x - 1][$y - 1]) && $this->list[$x - 1][$y - 1] === $search;
	}

	private function findPositionTop(int $x, int $y, $search): bool
	{
		return isset($this->list[$x - 1][$y]) && $this->list[$x - 1][$y] === $search;
	}

	private function findPositionTopRight(int $x, int $y, $search): bool
	{
		return isset($this->list[$x - 1][$y + 1]) && $this->list[$x - 1][$y + 1] === $search;
	}

	private function findPositionLeft(int $x, int $y, $search): bool
	{
		return isset($this->list[$x][$y - 1]) && $this->list[$x][$y - 1] === $search;
	}

	private function findPosition(int $x, int $y, $search): bool
	{
		return isset($this->list[$x][$y]) && $this->list[$x][$y] === $search;
	}

	private function findPositionRight(int $x, int $y, $search): bool
	{
		return isset($this->list[$x][$y + 1]) && $this->list[$x][$y + 1] === $search;
	}

	private function findPositionDownLeft(int $x, int $y, $search): bool
	{
		return isset($this->list[$x + 1][$y - 1]) && $this->list[$x + 1][$y - 1] === $search;
	}

	private function findPositionDown(int $x, int $y, $search): bool
	{
		return isset($this->list[$x + 1][$y]) && $this->list[$x + 1][$y] === $search;
	}

	private function findPositionDownRight(int $x, int $y, $search): bool
	{
		return isset($this->list[$x + 1][$y + 1]) && $this->list[$x + 1][$y + 1] === $search;
	}
}