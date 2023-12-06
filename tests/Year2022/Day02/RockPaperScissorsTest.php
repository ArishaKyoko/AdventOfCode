<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day02;

use AoC\Enums\Files;
use AoC\Year2022\Day02\RockPaperScissors;
use PHPUnit\Framework\TestCase;

class RockPaperScissorsTest extends TestCase
{
    /**
     * @test
     */
	public function exampleTest(): void
	{
		$example = new RockPaperScissors(Files::EXAMPLE);
		$this->assertEquals(15, $example->partOne());
		$this->assertEquals(12, $example->partTwo());
	}

    /**
     * @test
     */
	public function inputTest(): void
	{
		$input = new RockPaperScissors(Files::INPUT);
		$this->assertEquals(10595, $input->partOne());
		$this->assertEquals(9541, $input->partTwo());
	}
}
