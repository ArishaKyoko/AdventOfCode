<?php
declare(strict_types=1);

namespace AoCTest\Year2022\Day21;

use AoC\Enums\Files;
use AoC\Year2022\Day21\MonkeyMath;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class MonkeyMathTest extends TestCase
{
	public function test(): void
	{
        $example = new MonkeyMath(Files::EXAMPLE);
		$this->assertEquals(152, $example->partOne());
//      $this->assertEquals(, $example->partTwo());

        $input = new MonkeyMath(Files::INPUT);
        $this->assertEquals(168502451381566, $input->partOne());
//		$this->assertEquals(, $input->partTwo());
	}
}