<?php

declare(strict_types=1);

namespace AoCTest\Year2022\Day08;

use AoC\Enums\Files;
use AoC\Year2022\Day08\TreetopTreeHouse;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class TreetopTreeHouseTest extends TestCase
{
	public function test(): void
	{
		$example = new TreetopTreeHouse(Files::EXAMPLE);
		//		$this->assertEquals(21, $example->partOne());
		//      $this->assertEquals(, $example->partTwo());

		$input = new TreetopTreeHouse(Files::INPUT);
		//      $this->assertEquals(0, $input->partOne());
		//		$this->assertEquals(, $input->partTwo());
	}
}
