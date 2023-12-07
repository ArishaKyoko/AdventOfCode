<?php

declare(strict_types=1);

namespace AoCTest\Year2023\Day03;

use AoC\Enums\Files;
use AoC\Year2023\Day03\GearRatios;
use PHPUnit\Framework\TestCase;

class GearRatiosTest extends TestCase
{
    /**
     * @test
     */
    public function exampleTest() :void
	{
		$example = new GearRatios(Files::EXAMPLE);
		$this->assertEquals(4361, $example->partOne());
//		$this->assertEquals(467835, $example->partTwo());
	}

    /**
     * @test
     */
    public function inputTest() :void
	{
		$input = new GearRatios(Files::INPUT);
		$this->assertEquals(543867, $input->partOne());
//		$this->assertEquals(0, $input->partTwo());
	}

}
