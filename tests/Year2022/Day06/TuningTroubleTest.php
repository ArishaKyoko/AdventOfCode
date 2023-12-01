<?php
declare(strict_types=1);

namespace AoCTest\Year2022\Day06;

use AoC\Enums\Files;
use AoC\Year2022\Day06\TuningTrouble;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class TuningTroubleTest extends TestCase
{
	public function test(): void
	{
        $example1 = new TuningTrouble(Files::EXAMPLE_ONE);
		$this->assertEquals(7, $example1->partOne());
        $this->assertEquals(19, $example1->partTwo());
        $example2 = new TuningTrouble(Files::EXAMPLE_TWO);
		$this->assertEquals(5, $example2->partOne());
        $this->assertEquals(23, $example2->partTwo());
        $example3 = new TuningTrouble(Files::EXAMPLE_THREE);
		$this->assertEquals(6, $example3->partOne());
        $this->assertEquals(23, $example3->partTwo());
        $example4 = new TuningTrouble(Files::EXAMPLE_FOUR);
		$this->assertEquals(10, $example4->partOne());
        $this->assertEquals(29, $example4->partTwo());
        $example5 = new TuningTrouble(Files::EXAMPLE_FIVE);
		$this->assertEquals(11, $example5->partOne());
        $this->assertEquals(26, $example5->partTwo());

        $input = new TuningTrouble(Files::INPUT);
        $this->assertEquals(1912, $input->partOne());
		$this->assertEquals(2122, $input->partTwo());
	}
}