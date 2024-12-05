<?php

declare(strict_types=1);

namespace AoCTest\Year2024\Day02;

use AoC\Enums\Files;
use AoC\Year2024\Day02\RedNosedReports;
use PHPUnit\Framework\TestCase;

class RedNosedReportsTest extends TestCase
{
	/**
	 * @test
	 */
	public function exampleTest(): void
	{
		$example = new RedNosedReports(Files::EXAMPLE);
		$this->assertEquals(2, $example->partOne());
		$this->assertEquals(4, $example->partTwo());
	}

	/**
	 * @test
	 */
	public function inputTest(): void
	{
		$input = new RedNosedReports(Files::INPUT);
		$this->assertEquals(631, $input->partOne());
		$this->assertEquals(665, $input->partTwo());
	}
}