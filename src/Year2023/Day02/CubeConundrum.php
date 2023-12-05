<?php

declare(strict_types=1);

namespace AoC\Year2023\Day02;

use AoC\Base;

class CubeConundrum extends Base
{
	private const COLOR_RED = 'red';
	private const COLOR_BLUE = 'blue';
	private const COLOR_GREEN = 'green';

	private const MAX_BAG_SIZE = [
		self::COLOR_RED => 12,
		self::COLOR_BLUE => 14,
		self::COLOR_GREEN => 13,
	];

	public function getArrayFromFIle(): void
	{
		$fileData = $this->getFileData();

		foreach ($fileData as $iValue) {
			[$game, $_sets] = explode(': ', $iValue);
			[$game_text, $game_number] = explode(' ', $game);
			$sets = explode('; ', $_sets);

			foreach ($sets as $set) {
				$cubes = explode(', ', $set);
				$tmp = [];
				foreach ($cubes as $cube) {
					[$cube_sets, $cube_color] = explode(' ', $cube);
					$tmp[$cube_color] = (int) $cube_sets;
				}
				$this->fileArray[$game_number][] = $tmp;
			}
		}
	}

	public function partOne(): int
	{
		$games = [];
		foreach ($this->fileArray as $game => $sets) {
			foreach ($sets as $cubes) {
				foreach ($cubes as $color => $number) {
					if (self::MAX_BAG_SIZE[$color] < $number) {
						continue 3;
					}
				}
			}

			$games[] = $game;
		}

		return array_sum($games);
	}

	public function partTwo(): int
	{
		$tmp = [];
		foreach ($this->fileArray as $game => $sets) {
			foreach ($sets as $cubes) {
				foreach ($cubes as $color => $number) {
					$tmp[$game][$color][] = $number;
				}
			}
		}

		$products = [];
		foreach ($tmp as $game => $colors) {
			$maxNumbers = [];
			foreach ($colors as $color => $numbers) {
				$maxNumbers[$color] = max($numbers);
			}

			$products[] = array_product($maxNumbers);
		}


		return array_sum($products);
	}
}
