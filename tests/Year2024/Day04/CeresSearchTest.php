<?php

declare(strict_types=1);

namespace AoCTest\Year2024\Day04;

use AoC\Enums\Files;
use AoC\Year2024\Day04\CeresSearch;
use PHPUnit\Framework\TestCase;

class CeresSearchTest extends TestCase
{
	/**
	 * @test
	 */
	public function exampleTest(): void
	{
		$example = new CeresSearch(Files::EXAMPLE);
		$this->assertEquals(18, $example->partOne());
		$this->assertEquals(9, $example->partTwo());
	}

	/**
	 * @test
	 */
	public function inputTest(): void
	{
		$imput = new CeresSearch(Files::INPUT);
		$this->assertEquals(2718, $imput->partOne());
		$this->assertEquals(2046, $imput->partTwo());
	}
}