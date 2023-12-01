<?php
declare(strict_types=1);

namespace AoC\Year2022\Day05;

use AoC\Base;
use AoC\Enums\ExampleSwitch;
use AoC\Enums\Files;

class SupplyStacks extends Base
{
    protected static string $year = 'Year2022';
    protected static string $day = 'Day05';

	private array $_crates = [
        [
            1 => ['Z', 'J', 'G'],
            2 => ['Q', 'L', 'R', 'P', 'W', 'F', 'V', 'C'],
            3 => ['F', 'P', 'M', 'C', 'L', 'G', 'R'],
            4 => ['L', 'F', 'B', 'W', 'P', 'H', 'M'],
            5 => ['G', 'C', 'F', 'S', 'V', 'Q'],
            6 => ['W', 'H', 'J', 'Z', 'M', 'Q', 'T', 'L'],
            7 => ['H', 'F', 'S', 'B', 'V'],
            8 => ['F', 'J', 'Z', 'S'],
            9 => ['M', 'C', 'D', 'P', 'F', 'H', 'B', 'T'],
        ],
        [
            1 => ['Z', 'N'],
            2 => ['M', 'C', 'D'],
            3 => ['P'],
        ]
    ];

    private ExampleSwitch $modus;

    public function __construct(Files $filename, ExampleSwitch $modus)
    {
        $this->modus = $modus;
        $this->setFile($filename);
        $this->getArrayFromFile();
    }

    public function output(): void
    {
        echo 'Output Part One: ' . $this->partOne();
        echo PHP_EOL;
        echo 'Output Part Two: ' . $this->partTwo();
    }

	public function getArrayFromFile(): void
    {
        $fileData = $this->getFileData();

		$fileToArray = [];
		foreach ($fileData as $iValue) {
			if (!preg_match('/move (?<amount>\d+) from (?<from>\d+) to (?<to>\d+)/', $iValue)) {
				continue;
			}

			$fileToArray[] = $iValue;
		}

		$this->fileArray = $fileToArray;
	}

    /**
     * @return string
     */
	public function partOne(): string
	{
        $crates = $this->_crates[$this->modus->value];
		foreach ($this->fileArray as $rearrangement) {
			[$move, $from, $to] = self::_splitRearrangements($rearrangement);

			for ($i = 1; $i <= $move; $i++) {
				$slice = $crates[$from][count($crates[$from])-1];
				$crates[$to][] = $slice;
				unset($crates[$from][count($crates[$from])-1]);
			}

			// reset array indexes
			foreach ($crates as &$crate) {
				$crate = array_values($crate);
			}
			unset($crate);
		}

		$endsUp = [];
		foreach ($crates as $crate) {
			$endsUp[] = $crate[count($crate)-1];
		}

		return implode('', $endsUp);
	}

    /**
     * @return string
     */
	public function partTwo(): string
	{
        $crates = $this->_crates[$this->modus->value];
		foreach ($this->fileArray as $rearrangement) {
			[$move, $from, $to] = self::_splitRearrangements($rearrangement);

			//todo
			$slice = [];
			for ($i = 1; $i <= $move; $i++) {
				$slice[] = $crates[$from][count($crates[$from])-1];
				array_pop($crates[$from]);
			}
			$crates[$to] = array_merge($crates[$to], array_reverse($slice));

			// reset array indexes
			foreach ($crates as &$crate) {
				$crate = array_values($crate);
			}
			unset($crate);
		}

		$endsUp = [];
		foreach ($crates as $crate) {
			$endsUp[] = $crate[count($crate)-1];
		}

		return implode('', $endsUp);
	}

	/**
	 * @param string $rearrangement
	 * @return int[]
	 */
	private static function _splitRearrangements(string $rearrangement): array
	{
		/** @var array $explode */
		$explode = explode(' ', $rearrangement);
		return [
			(int) $explode[1], //move
			(int) $explode[3], //from
			(int) $explode[5], //to
		];
	}
}
