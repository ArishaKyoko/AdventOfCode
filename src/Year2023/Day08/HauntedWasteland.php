<?php
declare(strict_types=1);

namespace AoC\Year2023\Day08;

use AoC\Base;

class HauntedWasteland extends Base
{
    private const START_LETTER = 'A';
    private const END_LETTER = 'Z';
    private const LEFT = 'L';
    private const RIGHT = 'R';

    /** @var string[] */
    private array $instructions = [];

    public function getArrayFromFile(): void
    {
        $fileArray = $this->getFileData();

        $this->instructions = str_split($fileArray[0]);
        $fileArray = array_splice($fileArray, 2);

        foreach ($fileArray as $iValue) {
            [$node, $nodes] = explode(' = ', $iValue);
            [$left, $right] = explode(', ', $nodes);

            $this->fileArray[$node] = [
                self::LEFT => mb_substr($left, 1),
                self::RIGHT => mb_substr($right, 0, 3),
            ];
        }
    }

    public function partOne(): int
    {
        $countInstructions = count($this->instructions);
        $steps = 0;

        $nextNode = str_pad(self::START_LETTER, 3, self::START_LETTER);
        while ($nextNode !== str_pad(self::END_LETTER, 3, self::END_LETTER)) {
            $nextNode = $this->fileArray[$nextNode][$this->instructions[$steps % $countInstructions]];
            $steps++;
        }

        return $steps;
    }

    public function partTwo(): int
    {
        return 0;
    }
}
