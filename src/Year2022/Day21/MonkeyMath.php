<?php
declare(strict_types=1);

namespace AoC\Year2022\Day21;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class MonkeyMath
{
	use CanReadFiles;
    
    public function __construct()
	{
		$monkeysExample = $this->getArrayFromFile('example.txt');
		$monkeys = $this->getArrayFromFile('input.txt');

		echo 'The Number of Root: ' . $this->_partOne($monkeysExample) . " (example)\n";
		echo 'The Number of Root: ' . $this->_partOne($monkeys) . "\n";

		echo "\n";

		echo 'The Number of Root: ' . $this->_partTwo($monkeysExample) . " (example)\n";
		echo 'The Number of Root: ' . $this->_partTwo($monkeys) . "\n";
	}

	/**
	 * @param string $filename
	 * @return array
	 */
    private function getArrayFromFile(string $filename): array
	{
		$fileData = $this->getFileData($filename);

		$_monkeys = [];
		foreach ($fileData as $monkey) {
			/** @var array $explode */
			$explode = explode(' ', $monkey);
			$monkeyname = str_replace(':', '', $explode[0]);

			if (count($explode) > 2) {
				$_monkeys[$monkeyname] = [
					'monkey_1' => $explode[1],
					'monkey_2' => $explode[3],
					'operation' => $explode[2],
				];
			}

			if (count($explode) === 2) {
				$_monkeys[$monkeyname] = (int) $explode[1];
			}
		}

		return $_monkeys;
	}

	/**
	 * @param array $monkeys
	 * @return int
	 */
	private function _partOne(array $monkeys): int
	{
		return $this->_calculate($monkeys['root'], $monkeys);
	}
	
	private function _partTwo(array $monkeys): void
	{

	}

	/**
	 * @param int|array $monkey
	 * @param array $allMonkeys
	 * @return int
	 */
	private function _calculate($monkey, array $allMonkeys): int
	{
		if (is_numeric($monkey)) {
			return $monkey;
		}

		$result = 0;
		switch ($monkey['operation']) {
			case '+':
				$result = $this->_calculate($allMonkeys[$monkey['monkey_1']], $allMonkeys) + $this->_calculate($allMonkeys[$monkey['monkey_2']], $allMonkeys);
				break;
			case '-':
				$result = $this->_calculate($allMonkeys[$monkey['monkey_1']], $allMonkeys) - $this->_calculate($allMonkeys[$monkey['monkey_2']], $allMonkeys);
				break;
			case '*':
				$result = $this->_calculate($allMonkeys[$monkey['monkey_1']], $allMonkeys) * $this->_calculate($allMonkeys[$monkey['monkey_2']], $allMonkeys);
				break;
			case '/':
				$result = $this->_calculate($allMonkeys[$monkey['monkey_1']], $allMonkeys) / $this->_calculate($allMonkeys[$monkey['monkey_2']], $allMonkeys);
				break;
		}

		return $result;
	}
}
new MonkeyMath();