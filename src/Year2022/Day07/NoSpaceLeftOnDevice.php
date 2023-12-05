<?php

declare(strict_types=1);

namespace AoC\Year2022\Day07;

use AoC\Base;

class NoSpaceLeftOnDevice extends Base
{
	private const COMMAND_CD = 'cd';
	private const COMMAND_TOP = '..';
	private const COMMAND_LS = 'ls';
	private const COMMAND_DIR = 'dir';

	public function partOne(): int
	{
		$structure = self::_buildDirStructure($this->fileArray);
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

	public function partTwo(): void {}

    /**
     * @param string[] $list
     * @return array<string, array<string, int|string>>
     */
	private static function _buildDirStructure(array $list): array
	{
		$structure = [];
		$currentDir = '';
		$prevDir = '';
		$path = [];
		foreach ($list as $item) {
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

    /**
     * @param array<string, int|string> $files
     * @param array<string, int> $dirSize
     * @param array<string, array<string, int|string>> $structure
     * @param string $dirname
     * @return void
     */
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
