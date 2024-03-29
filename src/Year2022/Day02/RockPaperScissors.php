<?php

declare(strict_types=1);

namespace AoC\Year2022\Day02;

use AoC\Base;

class RockPaperScissors extends Base
{
	private const ROCK_PLAYER_ONE = 'A';
	private const PAPER_PLAYER_ONE = 'B';
	private const SCISSOR_PLAYER_ONE = 'C';

	private const ROCK_PLAYER_TWO = 'X';
	private const PAPER_PLAYER_TWO = 'Y';
	private const SCISSOR_PLAYER_TWO = 'Z';

	private const POINTS_WIN = 6;
	private const POINTS_LOSE = 0;
	private const POINTS_DRAW = 3;

	private const POINTS_PAPER = 2;
	private const POINTS_ROCK = 1;
	private const POINTS_SCISSOR = 3;

	private const POINTS = [
		self::ROCK_PLAYER_TWO => self::POINTS_ROCK,
		self::PAPER_PLAYER_TWO => self::POINTS_PAPER,
		self::SCISSOR_PLAYER_TWO => self::POINTS_SCISSOR,
	];

	private const LOOSES = [
		self::ROCK_PLAYER_ONE => self::SCISSOR_PLAYER_TWO,
		self::PAPER_PLAYER_ONE => self::ROCK_PLAYER_TWO,
		self::SCISSOR_PLAYER_ONE => self::PAPER_PLAYER_TWO,
	];

	private const WINS_FROM_TWO = [
		self::ROCK_PLAYER_TWO => self::SCISSOR_PLAYER_ONE,
		self::PAPER_PLAYER_TWO => self::ROCK_PLAYER_ONE,
		self::SCISSOR_PLAYER_TWO => self::PAPER_PLAYER_ONE,
	];

	private const WINS_FROM_ONE = [
		self::ROCK_PLAYER_ONE => self::PAPER_PLAYER_TWO,
		self::PAPER_PLAYER_ONE => self::SCISSOR_PLAYER_TWO,
		self::SCISSOR_PLAYER_ONE => self::ROCK_PLAYER_TWO,
	];

	private const DRAWS = [
		self::ROCK_PLAYER_ONE => self::ROCK_PLAYER_TWO,
		self::PAPER_PLAYER_ONE => self::PAPER_PLAYER_TWO,
		self::SCISSOR_PLAYER_ONE => self::SCISSOR_PLAYER_TWO,
	];

	public function getArrayFromFile(): void
	{
		$fileData = $this->getFileData();
		$fileToArray = [];
		foreach ($fileData as $iValue) {
            $explode = explode(' ', $iValue);
			$fileToArray[] = [
				$explode[0],
				$explode[1],
			];
		}

		$this->fileArray = $fileToArray;
	}

	/**
	 * @return int
	 */
	public function partOne(): int
	{
		$scores = [];
		foreach ($this->fileArray as $game) {
			$score = self::POINTS[$game[1]];

			if (self::DRAWS[$game[0]] === $game[1]) {
				$score += self::POINTS_DRAW;
			} elseif (self::WINS_FROM_TWO[$game[1]] === $game[0]) {
				$score += self::POINTS_WIN;
			} else {
				$score += self::POINTS_LOSE;
			}

			$scores[] = $score;
		}
		return array_sum($scores);
	}

	/**
	 * @return int
	 */
	public function partTwo(): int
	{
		$scores = [];
		foreach ($this->fileArray as $game) {
			switch ($game[1]) {
				case self::ROCK_PLAYER_TWO: 	//lose x
					$score = self::POINTS_LOSE;
					$score += self::POINTS[self::LOOSES[$game[0]]];
					break;
				case self::PAPER_PLAYER_TWO:	// draw y
					$score = self::POINTS_DRAW;
					$score += self::POINTS[self::DRAWS[$game[0]]];
					break;
				case self::SCISSOR_PLAYER_TWO:	// win z
					$score = self::POINTS_WIN;
					$score += self::POINTS[self::WINS_FROM_ONE[$game[0]]];
					break;
				default:
					$score = 0;
					break;
			}

			$scores[] = $score;
		}
		return array_sum($scores);
	}
}
