<?php

declare(strict_types=1);

namespace AoCTest\Year2024\Day01;

use AoC\Enums\Files;
use AoC\Year2024\Day01\HistorianHysteria;
use PHPUnit\Framework\TestCase;

class HistorianHysteriaTest extends TestCase
{
    /**
     * @test
     */
    public function exampleTest(): void
    {
        $example = new HistorianHysteria(Files::EXAMPLE);
        $this->assertEquals(11, $example->partOne());
        $this->assertEquals(31, $example->partTwo());
    }

    /**
     * @test
     */
    public function inputTest(): void
    {
        $input = new HistorianHysteria(Files::INPUT);
        $this->assertEquals(1388114, $input->partOne());
        $this->assertEquals(23529853, $input->partTwo());
    }
}