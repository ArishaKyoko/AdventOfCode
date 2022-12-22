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

		echo 'Sum of total sizes at most 100000: ' . $this->_partOne($structureExample) . " (example)\n";
		echo 'Sum of total sizes at most 100000: ' . $this->_partOne($structure) . "\n";

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
		$dirSizes = self::_getDirSizes($structure);

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
		foreach ($list as $item) {
			/** @var array $explode */
			$explode = explode(' ', $item);

			if ($explode[1] === self::COMMAND_LS) {
				continue;
			}

			if ($explode[1] === self::COMMAND_CD) {
				if ($explode[2] === self::COMMAND_TOP) {
					continue;
				}

				$currentDir = $explode[2];
			}

			if (is_numeric($explode[0])) {
				$file = [$explode[1] => (int) $explode[0]];
				$structure[$currentDir] = empty($structure[$currentDir]) ? $file : array_merge($structure[$currentDir], $file);
			}

			if ($explode[0] === self::COMMAND_DIR) {
				$structure[$currentDir][$explode[1]] = self::COMMAND_DIR;
			}
		}

		return $structure;

		// not in using, is for nested structure
//		$structureReverse = array_reverse($structure);
//		foreach ($structureReverse as &$dir) {
//			foreach ($dir as $filename => $size) {
//				if ($size === self::COMMAND_DIR) {
//					$dir[$filename] = $structureReverse[$filename];
//				}
//			}
//		}
//		unset($dir);
//
//		$structure = array_reverse($structureReverse);
//		return array_slice($structure, 0, 1);
	}

	private static function _getDirSizes(array $structure): array
	{
		$dirSizes = [];
		$tmp = [];
		foreach (array_reverse($structure) as $dir => $files) {
			if (!isset($dirSizes[$dir])) {
				$dirSizes[$dir] = 0;
			}

			foreach ($files as $filename => $size) {
				if ($size === self::COMMAND_DIR) {
					if (empty($dirSizes[$filename])) {
						$tmp[$dir][] = $filename;
						continue;
					}
					$dirSizes[$dir] += $dirSizes[$filename];
					continue;
				}

				$dirSizes[$dir] += $size;
			}
		}

		foreach ($tmp as $tmpDir => $tmpFiles) {
			foreach ($tmpFiles as $tmpFile) {
				$dirSizes[$tmpDir] += $dirSizes[$tmpFile];
			}
		}

		return array_reverse($dirSizes);
	}
}
new NoSpaceLeftOnDevice();