<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day01;

use AoC\Enums\Files;
use AoC\Year2022\Day01\CalorieCounting;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class CalorieCountingTest extends TestCase
{
	public function test(): void
	{
		$example = new CalorieCounting(Files::EXAMPLE);
		$this->assertEquals(24000, $example->partOne());
		$this->assertEquals(45000, $example->partTwo());

		$input = new CalorieCounting(Files::INPUT);
		$this->assertEquals(70374, $input->partOne());
		$this->assertEquals(204610, $input->partTwo());
	}
}
