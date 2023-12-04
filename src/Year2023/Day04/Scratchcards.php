<?php
declare(strict_types=1);

namespace AoC\Year2023\Day04;

use AoC\Base;
use AoC\Enums\Files;

class Scratchcards extends Base
{
    public function __construct(Files $filename)
    {
        $this->setDayAndYear(__NAMESPACE__);
        parent::__construct($filename);
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

        foreach ($fileData as $iValue) {
            [$card, $sets] = explode(': ', $iValue);
            [$winningNumbers, $numbers] = explode(' | ', $sets);

            preg_match('/(Card *)(\d*)/', $card, $_card);

            preg_match_all('/\d+/', $winningNumbers, $_winningNumbers);

            preg_match_all('/\d+/', $numbers, $_numbers);

            $this->fileArray[$_card[2]] = [
                'winning' => $_winningNumbers[0],
                'numbers' => $_numbers[0],
            ];
        }
    }

    public function partOne(): int
    {
        $winningCards = [];
        foreach ($this->fileArray as $cardNumber => $card) {
            $count  = count(array_intersect($card['winning'], $card['numbers']));
            $points = ($count > 1 ? pow(2, ($count-1)) : $count);
            $winningCards[$cardNumber] = $points;
        }

        return array_sum($winningCards);
    }

    public function partTwo(): int
    {
        $winningCards = [];
        foreach ($this->fileArray as $cardNumber => $card) {
            $winningCards[$cardNumber] = (
                isset($winningCards[$cardNumber])
                    ? $winningCards[$cardNumber] + 1
                    : 1
            );

            $count  = count(array_intersect($card['winning'], $card['numbers']));

            for($i = 1; $i <= $count; $i++) {
                $index = $cardNumber + $i;

                $winningCards[$index] = (
                    isset($winningCards[$index])
                        ? $winningCards[$index] + $winningCards[$cardNumber]
                        : $winningCards[$cardNumber]
                );
            }
        }

        return array_sum($winningCards);
    }
}
