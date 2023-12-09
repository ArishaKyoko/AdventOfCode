<?php

declare(strict_types=1);

namespace AoCTest\Year2023\Day08;

use AoC\Enums\Files;
use AoC\Year2023\Day08\HauntedWasteland;
use PHPUnit\Framework\TestCase;

class HauntedWastelandTest extends TestCase
{
    /**
     * @test
     */
    public function example1Test(): void
    {
        $example1 = new HauntedWasteland(Files::EXAMPLE_ONE);
        $this->assertEquals(2, $example1->partOne());

//        $example3 = new HauntedWasteland((Files::EXAMPLE_THREE));
//        $this->assertEquals(6, $example3->partTwo());
    }

    /**
     * @test
     */
    public function example2Test(): void
    {
        $example2 = new HauntedWasteland(Files::EXAMPLE_TWO);
        $this->assertEquals(6, $example2->partOne());

//        $example3 = new HauntedWasteland((Files::EXAMPLE_THREE));
//        $this->assertEquals(6, $example3->partTwo());
    }

    /**
     * @test
     */
    public function inputTest(): void
    {
        $input = new HauntedWasteland(Files::INPUT);
        $this->assertEquals(14429, $input->partOne());
//        $this->assertEquals(10921547990923, $input->partTwo());
    }
}