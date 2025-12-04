<?php

declare(strict_types=1);

namespace AoCTest\Year2020\Day01;

use AoC\Enums\Files;
use AoC\Year2020\Day01\ReportRepair;
use PHPUnit\Framework\TestCase;

class ReportRepairTest extends TestCase
{
	/**
	 * @test
	 */
	public function exampleTest(): void
	{
		$example = new ReportRepair(Files::EXAMPLE);
		$this->assertEquals(514579, $example->partOne());
		$this->assertEquals(241861950, $example->partTwo());
	}

	/**
	 * @test
	 */
	public function inputTest(): void
	{
		$input= new ReportRepair(Files::INPUT);
		$this->assertEquals(996075, $input->partOne());
		$this->assertEquals(0, $input->partTwo());
	}
}