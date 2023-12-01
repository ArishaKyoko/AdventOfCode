<?php
declare(strict_types=1);

namespace AoCTest\Year2023\Day01;

use AoC\Year2023\Day01\Trebuchet;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class TrebuchetTest extends TestCase
{
    public function test()
    {
        $trebuchetExampleOne = new Trebuchet('../../../src/Year2023/Day01/example_one.txt');
        $partOneExample = $trebuchetExampleOne->partOne();
        $this->assertEquals(142, array_sum($partOneExample));

        $trebuchetExampleTwo = new Trebuchet('../../../src/Year2023/Day01/example_two.txt');
        $partTwoExample = $trebuchetExampleTwo->partTwo();
        $this->assertEquals(281, array_sum($partTwoExample));


        $trebuchet = new Trebuchet('../../../src/Year2023/Day01/input.txt');

        $partOne = $trebuchet->partOne();
        $this->assertEquals(53334, array_sum($partOne));

        $partTwo = $trebuchet->partTwo();
        $this->assertEquals(52834, array_sum($partTwo));
    }

}
