<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day05;

use AoC\Enums\ExampleSwitch;
use AoC\Enums\Files;
use AoC\Year2022\Day05\SupplyStacks;
use PHPUnit\Framework\TestCase;

class SupplyStacksTest extends TestCase
{
    /**
     * @test
     */
	public function exampleTest(): void
	{
		$example = new SupplyStacks(Files::EXAMPLE, ExampleSwitch::EXAMPLE);
		$this->assertEquals('CMZ', $example->partOne());
		$this->assertEquals('MCD', $example->partTwo());
	}

    /**
     * @test
     */
	public function inputTest(): void
	{
		$input = new SupplyStacks(Files::INPUT, ExampleSwitch::INPUT);
		$this->assertEquals('WSFTMRHPP', $input->partOne());
		$this->assertEquals('GSLCMFBRP', $input->partTwo());
	}
}
