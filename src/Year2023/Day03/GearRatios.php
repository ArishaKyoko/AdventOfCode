<?php

declare(strict_types=1);

namespace AoC\Year2023\Day03;

use AoC\Base;

class GearRatios extends Base
{
	public function partOne(): int {
        $partNumbers = [];
        foreach ($this->fileArray as $linenumber => $line) {
            $lineChars = str_split($line);

            $prevLineChars = (isset($this->fileArray[$linenumber - 1]) ? str_split($this->fileArray[$linenumber - 1]) : []);
            $nextLineChars = (isset($this->fileArray[$linenumber + 1]) ? str_split($this->fileArray[$linenumber + 1]) : []);

            $countChars = count($lineChars);

            $foundNumber = false;
            $number = null;
            $foundSpecialChar = false;
            foreach ($lineChars as $position => $char) {
                if (is_numeric($char)) {
                    if (!$foundNumber
                        && (
                            (!empty($prevLineChars[$position - 1]) && $prevLineChars[$position - 1] !== '.')
                            || (!empty($lineChars[$position - 1]) && $lineChars[$position - 1] !== '.')
                            || (!empty($nextLineChars[$position - 1]) && $nextLineChars[$position - 1] !== '.')
                        )
                    ) {
                        $foundSpecialChar = true;
                    }
                    $foundNumber = true;

                    if (
                        (!empty($prevLineChars[$position]) && $prevLineChars[$position] !== '.')
                        || (!empty($nextLineChars[$position]) && $nextLineChars[$position] !== '.')
                    ) {
                        $foundSpecialChar = true;
                    }

                    $number .= $char;

                    if ($position === ($countChars - 1) && $foundSpecialChar) {
                        $partNumbers[] = (int) $number;
                    }
                } else if ($foundNumber) {
                    if (
                        (!empty($prevLineChars[$position]) && $prevLineChars[$position] !== '.')
                        || ($char !== '.')
                        || (!empty($nextLineChars[$position]) && $nextLineChars[$position] !== '.')
                    ) {
                        $foundSpecialChar = true;
                    }

                    if ($foundSpecialChar) {
                        $partNumbers[] = (int) $number;
                        $foundSpecialChar = false;
                    }

                    $foundNumber = false;
                    $number = null;
                }
            }
        }

        return array_sum($partNumbers);
    }

	public function partTwo(): int {
        $ratioNumbers = [];

        return array_sum($ratioNumbers);
    }
}
