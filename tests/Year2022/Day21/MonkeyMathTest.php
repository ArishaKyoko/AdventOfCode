<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day21;

use AoC\Enums\Files;
use AoC\Year2022\Day21\MonkeyMath;
use PHPUnit\Framework\TestCase;

class MonkeyMathTest extends TestCase
{
    /**
     * @test
     */
	public function exampleTest(): void
	{
		$example = new MonkeyMath(Files::EXAMPLE);
		$this->assertEquals(152, $example->partOne());
		//      $this->assertEquals(, $example->partTwo());
	}

    /**
     * @test
     */
	public function inputTest(): void
	{
		$input = new MonkeyMath(Files::INPUT);
		$this->assertEquals(168502451381566, $input->partOne());
		//		$this->assertEquals(, $input->partTwo());
	}
}
