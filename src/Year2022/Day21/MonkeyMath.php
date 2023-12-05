<?php
declare(strict_types=1);

namespace AoC\Year2022\Day21;

use AoC\Base;

class MonkeyMath extends Base
{
    public function getArrayFromFile(): void
    {
		$fileData = $this->getFileData();

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

		$this->fileArray = $_monkeys;
	}

    /**
     * @return int
     */
	public function partOne(): int
	{
		return $this->_calculate($this->fileArray['root'], $this->fileArray);
	}
	
	public function partTwo(): void
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
