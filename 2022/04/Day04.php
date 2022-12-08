<?php
declare(strict_types=1);

class Day04
{
	private array $_pairs;
	private int $_partOne = 0;
	private int $_partTwo = 0;

	public function __construct()
	{
		$this->getArrayFromFile();

		$this->_partOne();
		echo 'Pairs with one range fully contains: ' . $this->_partOne . "\n";

		$this->_partTwo();
		echo 'Pairs with Overlap range contains: ' . $this->_partTwo . "\n";
	}

	public function getArrayFromFile(): void
	{
		$fileData = file('input.txt');

		if (!is_array($fileData)) {
			return;
		}

		foreach ($fileData as $iValue) {
			/** @var array $explode */
			$explode = explode(',', $iValue);
			$this->_pairs[] = [
				$explode[0],
				str_replace("\n", '', $explode[1]),
			];
		}
	}

	private function _partOne(): void
	{
		foreach ($this->_pairs as $pairs) {
			/** @var array $exp_1 */
			$exp_1 = explode('-', $pairs[0]);
			/** @var array $exp_2 */
			$exp_2 = explode('-', $pairs[1]);

			$little_1 = (int) $exp_1[0];
			$big_1 = (int) $exp_1[1];
			$little_2 = (int) $exp_2[0];
			$big_2 = (int) $exp_2[1];

			if (
				($little_1 >= $little_2 && $big_1 <= $big_2)
				|| ($little_2 >= $little_1 && $big_2 <= $big_1)
			) {
				$this->_partOne++;
			}
		}
	}

	private function _partTwo(): void
	{
		foreach ($this->_pairs as $pairs) {
			/** @var array $exp_1 */
			$exp_1 = explode('-', $pairs[0]);
			/** @var array $exp_2 */
			$exp_2 = explode('-', $pairs[1]);

			$little_1 = (int) $exp_1[0];
			$big_1 = (int) $exp_1[1];
			$little_2 = (int) $exp_2[0];
			$big_2 = (int) $exp_2[1];

			if (
				(
					($little_2 >= $little_1 && $little_2 <= $big_1)
					|| ($big_2 >= $little_1 && $big_2 <= $big_1)
				)
				|| (
					($little_1 >= $little_2 && $little_1 <= $big_2)
					|| ($big_1 >= $little_2 && $big_1 <= $big_2)
				)
			) {
				$this->_partTwo++;
			}
		}
	}
}
new Day04();