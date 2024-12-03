<?php

declare(strict_types=1);

namespace AoCTest\Year2024\Day03;

use AoC\Enums\Files;
use AoC\Year2024\Day03\MullItOver;
use PHPUnit\Framework\TestCase;

class MullItOverTest extends TestCase
{
	/**
	 * @test
	 */
	public function exampleTest(): void
	{
		$example1 = new MullItOver(Files::EXAMPLE_ONE);
		$this->assertEquals(161, $example1->partOne());

		$example2 = new MullItOver(Files::EXAMPLE_TWO);
		$this->assertEquals(48, $example2->partTwo());
	}

	/**
	 * @test
	 */
	public function inputTest(): void
	{
		$imput = new MullItOver(Files::INPUT);
		$this->assertEquals(169021493, $imput->partOne());
		$this->assertEquals(111762583, $imput->partTwo());
	}
}