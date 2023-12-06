<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day04;

use AoC\Enums\Files;
use AoC\Year2022\Day04\CampCleanup;
use PHPUnit\Framework\TestCase;

class CampCleanupTest extends TestCase
{
    /**
     * @test
     */
	public function exmpleTest(): void
	{
		$example = new CampCleanup(Files::EXAMPLE);
		$this->assertEquals(2, $example->partOne());
		$this->assertEquals(4, $example->partTwo());
	}

    /**
     * @test
     */
	public function inputTest(): void
	{
		$input = new CampCleanup(Files::INPUT);
		$this->assertEquals(562, $input->partOne());
		$this->assertEquals(924, $input->partTwo());
	}
}
