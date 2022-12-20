<?php
declare(strict_types=1);

namespace AoC\Traits;

Trait CanReadFiles
{
	public function getFileData(string $filename): array
	{
		$fileData = file($filename, FILE_IGNORE_NEW_LINES);

		if (!is_array($fileData)) {
			return [];
		}

		return $fileData;
	}
}