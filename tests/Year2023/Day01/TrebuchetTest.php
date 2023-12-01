<?php
declare(strict_types=1);

namespace AoCTest\Year2023\Day01;

use AoC\Enums\Files;
use AoC\Year2023\Day01\Trebuchet;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class TrebuchetTest extends TestCase
{
    public function test()
    {
        $example1 = new Trebuchet(Files::EXAMPLE_ONE);
        $this->assertEquals(142, $example1->partOne());

        $example2 = new Trebuchet(Files::EXAMPLE_TWO);
        $this->assertEquals(281, $example2->partTwo());

        $input = new Trebuchet(Files::INPUT);
        $this->assertEquals(53334, $input->partOne());
        $this->assertEquals(52834, $input->partTwo());
    }

}
