<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day03;

use AoC\Enums\Files;
use AoC\Year2022\Day03\RucksackReorganization;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class RucksackReorganizationTest extends TestCase
{
	public function test(): void
	{
		$example = new RucksackReorganization(Files::EXAMPLE);
		$this->assertEquals(157, $example->partOne());
		$this->assertEquals(70, $example->partTwo());

		$input = new RucksackReorganization(Files::INPUT);
		$this->assertEquals(7817, $input->partOne());
		$this->assertEquals(2444, $input->partTwo());
	}
}
