<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day01;

use AoC\Enums\Files;
use AoC\Year2022\Day01\CalorieCounting;
use PHPUnit\Framework\TestCase;

class CalorieCountingTest extends TestCase
{
    /**
     * @test
     */
	public function exampleTest(): void
	{
		$example = new CalorieCounting(Files::EXAMPLE);
		$this->assertEquals(24000, $example->partOne());
		$this->assertEquals(45000, $example->partTwo());
	}

    /**
     * @test
     */
	public function inputTest(): void
	{
		$input = new CalorieCounting(Files::INPUT);
		$this->assertEquals(70374, $input->partOne());
		$this->assertEquals(204610, $input->partTwo());
	}
}
