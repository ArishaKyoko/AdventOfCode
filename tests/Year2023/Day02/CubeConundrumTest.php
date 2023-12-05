<?php

declare(strict_types=1);

namespace AoCTest\Year2023\Day02;

use AoC\Enums\Files;
use AoC\Year2023\Day02\CubeConundrum;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class CubeConundrumTest extends TestCase
{
    /**
     * @test
     */
    public function test() :void
	{
		$example = new CubeConundrum(Files::EXAMPLE);
		$this->assertEquals(8, $example->partOne());
		$this->assertEquals(2286, $example->partTwo());

		$input = new CubeConundrum(Files::INPUT);
		$this->assertEquals(2528, $input->partOne());
		$this->assertEquals(67363, $input->partTwo());
	}

}
