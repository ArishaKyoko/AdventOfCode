<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day07;

use AoC\Enums\Files;
use AoC\Year2022\Day07\NoSpaceLeftOnDevice;
use PHPUnit\Framework\TestCase;

class NoSpaceLeftOnDeviceTest extends TestCase
{
    /**
     * @test
     */
	public function exampleTest(): void
	{
		$example = new NoSpaceLeftOnDevice(Files::EXAMPLE);
		$this->assertEquals(95437, $example->partOne());
		//        $this->assertEquals(, $example->partTwo());
	}

    /**
     * @test
     */
//	public function inputTest(): void
//	{
//		$input = new NoSpaceLeftOnDevice(Files::INPUT);
//		$this->assertEquals(0, $input->partOne());
//        $this->assertEquals(, $input->partTwo());
//	}
}
