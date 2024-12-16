<?php

declare(strict_types=1);

namespace AoCTest\Year2024\Day11;

use AoC\Enums\Files;
use AoC\Year2024\Day11\PlutonianPebbles;
use PHPUnit\Framework\TestCase;

class PlutonianPebblesTest extends TestCase
{
	/**
	 * @test
	 */
	public function exampleTest(): void
	{
		$example = new PlutonianPebbles(Files::EXAMPLE);
		$this->assertEquals(55312, $example->partOne());
		$this->assertEquals(0, $example->partTwo());
	}

	/**
	 * @test
	 */
	public function inputTest(): void
	{
		$input = new PlutonianPebbles(Files::INPUT);
//		$this->assertEquals(194782, $input->partOne());
		$this->assertEquals(0, $input->partTwo());
	}
}