<?php
declare(strict_types=1);

namespace AoCTest\Year2022\Day01;

use AoC\Year2022\Day01\CalorieCounting;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class CalorieCountingTest extends TestCase
{
	public function test(): void
	{
		$calorieCounting = new CalorieCounting();

		$elves = $calorieCounting->getArrayFromFile('../../../src/Year2022/Day01/input.txt');
		$elvesExample = $calorieCounting->getArrayFromFile('../../../src/Year2022/Day01/example.txt');

		$elvesSumExample = $calorieCounting->_partOne($elvesExample);
		$elvesSum = $calorieCounting->_partOne($elves);

		$this->assertEquals(max($elvesSumExample), 24000);
		$this->assertEquals(max($elvesSum), 70374);

		$topThreeElvesCaloriesExample = $calorieCounting->_partTwo($elvesSumExample);
		$topThreeElvesCalories = $calorieCounting->_partTwo($elvesSum);

		$this->assertEquals(array_sum($topThreeElvesCaloriesExample), 45000);
		$this->assertEquals(array_sum($topThreeElvesCalories), 204610);
	}
}