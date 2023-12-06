<?php

declare(strict_types=1);

namespace AoCTest\Year2023\Day02;

use AoC\Enums\Files;
use AoC\Year2023\Day02\CubeConundrum;
use PHPUnit\Framework\TestCase;

class CubeConundrumTest extends TestCase
{
    /**
     * @test
     */
    public function exampleTest() :void
	{
		$example = new CubeConundrum(Files::EXAMPLE);
		$this->assertEquals(8, $example->partOne());
		$this->assertEquals(2286, $example->partTwo());
	}

    /**
     * @test
     */
    public function inputTest() :void
	{
		$input = new CubeConundrum(Files::INPUT);
		$this->assertEquals(2528, $input->partOne());
		$this->assertEquals(67363, $input->partTwo());
	}
}
