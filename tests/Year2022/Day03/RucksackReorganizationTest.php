<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day03;

use AoC\Enums\Files;
use AoC\Year2022\Day03\RucksackReorganization;
use PHPUnit\Framework\TestCase;

class RucksackReorganizationTest extends TestCase
{
    /**
     * @test
     */
	public function exampleTest(): void
	{
		$example = new RucksackReorganization(Files::EXAMPLE);
		$this->assertEquals(157, $example->partOne());
		$this->assertEquals(70, $example->partTwo());
	}

    /**
     * @test
     */
	public function inputTest(): void
	{
		$input = new RucksackReorganization(Files::INPUT);
		$this->assertEquals(7817, $input->partOne());
		$this->assertEquals(2444, $input->partTwo());
	}
}
