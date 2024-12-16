<?php
declare(strict_types=1);

namespace AoC\Year2024\Day04;

use AoC\Base;
use AoC\Enums\Files;
use AoC\Traits\CanFindPositions;
use function array_map;
use function count;
use function explode;
use function str_split;

class CeresSearch extends Base
{
	use CanFindPositions;
	/** @var array<string[]> $chars */
	private array $chars;

	public function __construct(Files $filename)
	{
		parent::__construct($filename);

		foreach ($this->fileArray as $string) {
			$this->chars[] = str_split($string);
		}

		$this->list = $this->chars;
	}

	public function partOne(): int|string
	{
		$counter = 0;
		for ($i = 0; $i < count($this->chars); $i++) {
			for ($j = 0; $j < count($this->chars[$i]); $j++) {
				if ($this->findPosition($i, $j, 'X')) {
					// horizontal rechts
					if (
						$this->findPosition($i, $j + 1, 'M')
						&& $this->findPosition($i, $j + 2, 'A')
						&& $this->findPosition($i, $j + 3, 'S')
					) {
						$counter++;
					}

					// horizontal links
					if (
						$this->findPosition($i, $j - 1, 'M')
						&& $this->findPosition($i, $j - 2, 'A')
						&& $this->findPosition($i, $j - 3, 'S')
					) {
						$counter++;
					}

					// vertikal unten
					if (
						$this->findPosition($i + 1, $j, 'M')
						&& $this->findPosition($i + 2, $j, 'A')
						&& $this->findPosition($i + 3, $j, 'S')
					) {
						$counter++;
					}

					// vertikal hoch
					if (
						$this->findPosition($i - 1, $j, 'M')
						&& $this->findPosition($i - 2, $j, 'A')
						&& $this->findPosition($i - 3, $j, 'S')
					) {
						$counter++;
					}

					// diagonal rechts unten
					if (
						$this->findPosition($i + 1, $j + 1, 'M')
						&& $this->findPosition($i + 2, $j + 2, 'A')
						&& $this->findPosition($i + 3, $j + 3, 'S')
					) {
						$counter++;
					}

					// diagonal links unten
					if (
						$this->findPosition($i + 1, $j - 1, 'M')
						&& $this->findPosition($i + 2, $j - 2, 'A')
						&& $this->findPosition($i + 3, $j - 3, 'S')
					) {
						$counter++;
					}

					// diagonal rechts hoch
					if (
						$this->findPosition($i - 1, $j + 1, 'M')
						&& $this->findPosition($i - 2, $j + 2, 'A')
						&& $this->findPosition($i - 3, $j + 3, 'S')
					) {
						$counter++;
					}

					// diagonal links hoch
					if (
						$this->findPosition($i - 1, $j - 1, 'M')
						&& $this->findPosition($i - 2, $j - 2, 'A')
						&& $this->findPosition($i - 3, $j - 3, 'S')
					) {
						$counter++;
					}
				}
			}
		}

		return $counter;
	}

	public function partTwo(): int|string
	{
		$counter = 0;
		for ($i = 0; $i < count($this->chars); $i++) {
			for ($j = 0; $j < count($this->chars[$i]); $j++) {
				if ($this->findPosition($i, $j, 'A')) {
					if (
						$this->findPositionTopLeft($i, $j, 'M')
						&& $this->findPositionDownRight($i, $j, 'S')
					) {
						if (
							(
								$this->findPositionTopRight($i, $j, 'M')
								&& $this->findPositionDownLeft($i, $j, 'S')
							) || (
								$this->findPositionDownLeft($i, $j, 'M')
								&& $this->findPositionTopRight($i, $j, 'S')
							)
						) {
							$counter++;
						}
					} else if (
						$this->findPositionTopRight($i, $j, 'M')
						&& $this->findPositionDownLeft($i, $j, 'S')
					) {
						if (
							(
								$this->findPositionTopLeft($i, $j, 'M')
								&& $this->findPositionDownRight($i, $j, 'S')
							) || (
								$this->findPositionDownRight($i, $j, 'M')
								&& $this->findPositionTopLeft($i, $j, 'S')
							)
						) {
							$counter++;
						}
					} else if (
						$this->findPositionDownRight($i, $j, 'M')
						&& $this->findPositionTopLeft($i, $j, 'S')
					) {
						if (
							(
								$this->findPositionDownLeft($i, $j, 'M')
								&& $this->findPositionTopRight($i, $j, 'S')
							) || (
								$this->findPositionTopRight($i, $j, 'M')
								&& $this->findPositionDownLeft($i, $j, 'S')
							)
						) {
							$counter++;
						}
					} else if (
						$this->findPositionDownLeft($i, $j, 'M')
						&& $this->findPositionTopRight($i, $j, 'S')
					) {
						if (
							(
								$this->findPositionTopLeft($i, $j, 'M')
								&& $this->findPositionDownRight($i, $j, 'S')
							) || (
								$this->findPositionDownRight($i, $j, 'M')
								&& $this->findPositionTopLeft($i, $j, 'S')
							)
						) {
							$counter++;
						}
					}
				}
			}
		}

		return $counter;
	}
}
