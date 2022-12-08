<?php
declare(strict_types=1);

class Day02
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

	private const POINTS_PLAYER_ONE = [
		self::ROCK_PLAYER_ONE => self::POINTS_ROCK,
		self::PAPER_PLAYER_ONE => self::POINTS_PAPER,
		self::SCISSOR_PLAYER_ONE => self::POINTS_SCISSOR,
	];

	private const POINTS_PLAYER_TWO = [
		self::ROCK_PLAYER_TWO => self::POINTS_ROCK,
		self::PAPER_PLAYER_TWO => self::POINTS_PAPER,
		self::SCISSOR_PLAYER_TWO => self::POINTS_SCISSOR,
	];

	private const WINS_PLAYER_ONE = [
		self::ROCK_PLAYER_ONE => self::SCISSOR_PLAYER_TWO,
		self::PAPER_PLAYER_ONE => self::ROCK_PLAYER_TWO,
		self::SCISSOR_PLAYER_ONE => self::PAPER_PLAYER_TWO,
	];

	private const WINS_PLAYER_TWO = [
		self::ROCK_PLAYER_TWO => self::SCISSOR_PLAYER_ONE,
		self::PAPER_PLAYER_TWO => self::ROCK_PLAYER_ONE,
		self::SCISSOR_PLAYER_TWO => self::PAPER_PLAYER_ONE,
	];

	private const DRAWS = [
		self::ROCK_PLAYER_ONE => self::ROCK_PLAYER_TWO,
		self::PAPER_PLAYER_ONE => self::PAPER_PLAYER_TWO,
		self::SCISSOR_PLAYER_ONE => self::SCISSOR_PLAYER_TWO,
	];

	private array $_puzzleOne = [];
	private array $_puzzleTwo = [];
	private array $_combinations;

	public function __construct()
	{
		$this->getArrayFromFileWithMultiArray();

		$this->_partOne();
		echo 'Totally Score Part One: ' . array_sum($this->_puzzleOne) . "\n";

		$this->_partTwo();
		echo 'Totally Score Part Two: ' . array_sum($this->_puzzleTwo) . "\n";
	}

	public function getArrayFromFileWithMultiArray(): void
	{
		$fileData = file('input.txt');

		if (!is_array($fileData)) {
			return;
		}

		$rows = [];
		foreach ($fileData as $iValue) {
			/** @var array $explode */
			$explode = explode(' ', $iValue);
			$rows[] = [
				$explode[0],
				str_replace("\n", '', $explode[1]),
			];
		}

		$this->_combinations = $rows;
	}

	private function _partOne(): void
	{
		foreach ($this->_combinations as $game) {
			$score_one = self::POINTS_PLAYER_ONE[$game[0]];
			$score_two = self::POINTS_PLAYER_TWO[$game[1]];

			if (self::WINS_PLAYER_ONE[$game[0]] === $game[1]) {
				$score_one += self::POINTS_WIN;
			}

			if (self::DRAWS[$game[0]] === $game[1]) {
				$score_one += self::POINTS_DRAW;
				$score_two += self::POINTS_DRAW;
			}

			if (self::WINS_PLAYER_TWO[$game[1]] === $game[0]) {
				$score_two += self::POINTS_WIN;
			}

			$this->_puzzleOne[] = $score_two;
		}
	}

	private function _partTwo(): void
	{
		foreach ($this->_combinations as $game) {
			switch ($game[1]) {
			    case self::ROCK_PLAYER_TWO: 	//lose
					$score = self::POINTS_LOSE;
					$score += self::POINTS_PLAYER_TWO[self::WINS_PLAYER_ONE[$game[0]]];
			        break;
			    case self::PAPER_PLAYER_TWO:	// draw
					$score = self::POINTS_DRAW;
					$score += self::POINTS_PLAYER_TWO[self::DRAWS[$game[0]]];
			        break;
			    case self::SCISSOR_PLAYER_TWO:	// win
					$score = self::POINTS_WIN;
					$score += self::POINTS_PLAYER_ONE[self::WINS_PLAYER_TWO[$game[1]]];
			        break;
			}

			$this->_puzzleTwo[] = $score;
		}
	}
}

new Day02();