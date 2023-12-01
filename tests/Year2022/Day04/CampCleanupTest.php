<?php
declare(strict_types=1);

namespace AoCTest\Year2022\Day04;

use AoC\Enums\Files;
use AoC\Year2022\Day04\CampCleanup;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../../vendor/autoload.php';

class CampCleanupTest extends TestCase
{
	public function test(): void
	{
		$example = new CampCleanup(Files::EXAMPLE);
		$this->assertEquals(2, $example->partOne());
        $this->assertEquals(4, $example->partTwo());

        $input = new CampCleanup(Files::INPUT);
        $this->assertEquals(562, $input->partOne());
		$this->assertEquals(924, $input->partTwo());
	}
}