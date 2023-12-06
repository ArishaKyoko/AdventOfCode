<?php

declare(strict_types=1);

namespace AoCTest\Year2023\Day04;

use AoC\Enums\Files;
use AoC\Year2023\Day04\Scratchcards;
use PHPUnit\Framework\TestCase;

class ScratchcardsTest extends TestCase
{
	/**
	 * @test
	 */
	public function exampleTest(): void
	{
		$example = new Scratchcards(Files::EXAMPLE);
		$this->assertEquals(13, $example->partOne());
		$this->assertEquals(30, $example->partTwo());
	}

	/**
	 * @test
	 */
	public function inputTest(): void
	{
		$input = new Scratchcards(Files::INPUT);
		$this->assertEquals(17803, $input->partOne());
		$this->assertEquals(5554894, $input->partTwo());
	}
}
