<?php
declare(strict_types=1);

namespace AoC\Year2022\Day07;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class NoSpaceLeftOnDevice
{
	use CanReadFiles;

	private const COMMAND_CD = 'cd';
	private const COMMAND_TOP = '..';
	private const COMMAND_LS = 'ls';
	private const COMMAND_DIR = 'dir';
    
    public function __construct()
	{
		$listExample = $this->getArrayFromFile('example.txt');
		$list = $this->getArrayFromFile('input.txt');

		$structureExample = $this->_buildDirStructure($listExample);
		$structure = $this->_buildDirStructure($list);

		echo 'Sum of total sizes at most 100000: ' . $this->_partOne($structureExample) . " (example)\n"; // 95.437 right
		echo 'Sum of total sizes at most 100000: ' . $this->_partOne($structure) . "\n"; // 1.607.821 1.619.017 wrong

		echo "\n";

//		$this->_partTwo();
//		echo '';
	}
    
    private function getArrayFromFile(string $filename): array
	{
		return $this->getFileData($filename);
	}

	private function _partOne(array $structure): int
	{

		$dirSizes = [];
		self::_getDirSizes($structure['_/'], $dirSizes, $structure);

		$smallDirs = [];
		foreach ($dirSizes as $dir => $size) {
			if ($size <= 100000) {
				$smallDirs[$dir] = $size;
			}
		}

		return array_sum($smallDirs);
	}

	private function _partTwo(array $structure): void
	{

	}

	private static function _buildDirStructure(array $list): array
	{
		$structure = [];
		$currentDir = '';
		$prevDir = '';
		$path = [];
		foreach ($list as $item) {
			/** @var array $explode */
			$explode = explode(' ', $item);

			if ($explode[1] === self::COMMAND_LS) {
				continue;
			}

			if ($explode[1] === self::COMMAND_CD) {
				if ($explode[2] === self::COMMAND_TOP) {
					array_pop($path);
					$pathReverse = array_reverse($path);
					$prevDir = $pathReverse[1] ?? '';
					$currentDir = $pathReverse[0];
					continue;
				}

				$prevDir = $currentDir;
				$currentDir = $explode[2];
				$path[] = $currentDir;
				continue;
			}

			$index = $prevDir . '_' . $currentDir;

			if (is_numeric($explode[0])) {
				// $explode[0] => size | $explode[1] => filename
				$file = [$explode[1] => (int) $explode[0]];
				$structure[$index] = empty($structure[$index]) ? $file : array_merge($structure[$index], $file);
			}

			if ($explode[0] === self::COMMAND_DIR) {
				// $explode[0] => "dir" | $explode[1] => dirname
				$structure[$index][$explode[1]] = self::COMMAND_DIR;
			}
		}

		return $structure;
	}

	private static function _getDirSizes(array $files, array &$dirSize, array $structure, string $dirname = '_/'): void
	{
		$explode = explode('_', $dirname);
		$currentDir = $explode[1];

		foreach ($files as $filename => $size) {
			if (!isset($dirSize[$dirname])) {
				$dirSize[$dirname] = 0;
			}

			if ($size === self::COMMAND_DIR) {
				$index = $currentDir . '_' . $filename;
				self::_getDirSizes($structure[$index], $dirSize, $structure, $index);
				$dirSize[$dirname] += $dirSize[$index];
				continue;
			}

			$dirSize[$dirname] += $size;
		}
	}
}
new NoSpaceLeftOnDevice();