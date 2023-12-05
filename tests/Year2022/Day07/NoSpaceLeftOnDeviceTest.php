<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day07;

use AoC\Enums\Files;
use AoC\Year2022\Day07\NoSpaceLeftOnDevice;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class NoSpaceLeftOnDeviceTest extends TestCase
{
	public function test(): void
	{
		$example = new NoSpaceLeftOnDevice(Files::EXAMPLE);
		$this->assertEquals(95437, $example->partOne());
		//        $this->assertEquals(, $example->partTwo());

//		$input = new NoSpaceLeftOnDevice(Files::INPUT);
//		$this->assertEquals(0, $input->partOne());
		//		$this->assertEquals(, $input->partTwo());
	}
}
