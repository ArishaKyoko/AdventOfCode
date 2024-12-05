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
	}

	public function partOne(): int|string
	{
		$chars = $this->chars;
		$counter = 0;
		for ($i = 0; $i < count($chars); $i++) {
			for ($j = 0; $j < count($chars[$i]); $j++) {
				if ($this->findPosition($chars, $i, $j, 'X')) {
					// horizontal rechts
					if (
						$this->findPosition($chars, $i, $j + 1, 'M')
						&& $this->findPosition($chars, $i, $j + 2, 'A')
						&& $this->findPosition($chars, $i, $j + 3, 'S')
					) {
						$counter++;
					}

					// horizontal links
					if (
						$this->findPosition($chars, $i, $j - 1, 'M')
						&& $this->findPosition($chars, $i, $j - 2, 'A')
						&& $this->findPosition($chars, $i, $j - 3, 'S')
					) {
						$counter++;
					}

					// vertikal unten
					if (
						$this->findPosition($chars, $i + 1, $j, 'M')
						&& $this->findPosition($chars, $i + 2, $j, 'A')
						&& $this->findPosition($chars, $i + 3, $j, 'S')
					) {
						$counter++;
					}

					// vertikal hoch
					if (
						$this->findPosition($chars, $i - 1, $j, 'M')
						&& $this->findPosition($chars, $i - 2, $j, 'A')
						&& $this->findPosition($chars, $i - 3, $j, 'S')
					) {
						$counter++;
					}

					// diagonal rechts unten
					if (
						$this->findPosition($chars, $i + 1, $j + 1, 'M')
						&& $this->findPosition($chars, $i + 2, $j + 2, 'A')
						&& $this->findPosition($chars, $i + 3, $j + 3, 'S')
					) {
						$counter++;
					}

					// diagonal links unten
					if (
						$this->findPosition($chars, $i + 1, $j - 1, 'M')
						&& $this->findPosition($chars, $i + 2, $j - 2, 'A')
						&& $this->findPosition($chars, $i + 3, $j - 3, 'S')
					) {
						$counter++;
					}

					// diagonal rechts hoch
					if (
						$this->findPosition($chars, $i - 1, $j + 1, 'M')
						&& $this->findPosition($chars, $i - 2, $j + 2, 'A')
						&& $this->findPosition($chars, $i - 3, $j + 3, 'S')
					) {
						$counter++;
					}

					// diagonal links hoch
					if (
						$this->findPosition($chars, $i - 1, $j - 1, 'M')
						&& $this->findPosition($chars, $i - 2, $j - 2, 'A')
						&& $this->findPosition($chars, $i - 3, $j - 3, 'S')
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
		$chars = $this->chars;
		$counter = 0;
		for ($i = 0; $i < count($chars); $i++) {
			for ($j = 0; $j < count($chars[$i]); $j++) {
				if ($this->findPosition($chars, $i, $j, 'A')) {
					if (
						$this->findPositionTopLeft($chars, $i, $j, 'M')
						&& $this->findPositionDownRight($chars, $i, $j, 'S')
					) {
						if (
							(
								$this->findPositionTopRight($chars, $i, $j, 'M')
								&& $this->findPositionDownLeft($chars, $i, $j, 'S')
							) || (
								$this->findPositionDownLeft($chars, $i, $j, 'M')
								&& $this->findPositionTopRight($chars, $i, $j, 'S')
							)
						) {
							$counter++;
						}
					} else if (
						$this->findPositionTopRight($chars, $i, $j, 'M')
						&& $this->findPositionDownLeft($chars, $i, $j, 'S')
					) {
						if (
							(
								$this->findPositionTopLeft($chars, $i, $j, 'M')
								&& $this->findPositionDownRight($chars, $i, $j, 'S')
							) || (
								$this->findPositionDownRight($chars, $i, $j, 'M')
								&& $this->findPositionTopLeft($chars, $i, $j, 'S')
							)
						) {
							$counter++;
						}
					} else if (
						$this->findPositionDownRight($chars, $i, $j, 'M')
						&& $this->findPositionTopLeft($chars, $i, $j, 'S')
					) {
						if (
							(
								$this->findPositionDownLeft($chars, $i, $j, 'M')
								&& $this->findPositionTopRight($chars, $i, $j, 'S')
							) || (
								$this->findPositionTopRight($chars, $i, $j, 'M')
								&& $this->findPositionDownLeft($chars, $i, $j, 'S')
							)
						) {
							$counter++;
						}
					} else if (
						$this->findPositionDownLeft($chars, $i, $j, 'M')
						&& $this->findPositionTopRight($chars, $i, $j, 'S')
					) {
						if (
							(
								$this->findPositionTopLeft($chars, $i, $j, 'M')
								&& $this->findPositionDownRight($chars, $i, $j, 'S')
							) || (
								$this->findPositionDownRight($chars, $i, $j, 'M')
								&& $this->findPositionTopLeft($chars, $i, $j, 'S')
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
