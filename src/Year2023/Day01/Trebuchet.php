<?php
declare(strict_types=1);

namespace AoC\Year2023\Day01;

use AoC\Base;
use AoC\Enums\Files;

class Trebuchet extends Base
{
    protected static string $year = 'Year2023';
    protected static string $day = 'Day01';

    public function __construct(Files $filename)
    {
        $this->setFile($filename);
        $this->getArrayFromFile();
    }

    public function output(): void
    {
        echo 'Output Part One: ' . $this->partOne();
        echo PHP_EOL;
        echo 'Output Part Two: ' . $this->partTwo();
    }

    public function partOne(): int
    {
        $digitPairs = [];

        foreach ($this->fileArray as $string) {
            $pregResult = [];
            if (preg_match_all('/\d/', $string, $pregResult)) {
                $digitPairs[] = (int) ($pregResult[0][0] . $pregResult[0][count($pregResult[0])-1]);
            }
        }

        return array_sum($digitPairs);
    }

    public function partTwo(): int
    {
        $digitPairs = [];

        $numbersInWords = [
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
        ];

        foreach ($this->fileArray as $string) {
            $pregResult = [];
            if (preg_match_all('/((' . implode('|', array_keys($numbersInWords)) . ')|\d)/', $string, $pregResult)) {
                $digitPairs[] = (int) (($numbersInWords[$pregResult[0][0]] ?? $pregResult[0][0]) . ($numbersInWords[$pregResult[0][count($pregResult[0])-1]] ?? $pregResult[0][count($pregResult[0])-1]));
            }
        }

        return array_sum($digitPairs);
    }
}
