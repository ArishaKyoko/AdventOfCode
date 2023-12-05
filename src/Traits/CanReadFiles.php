<?php

declare(strict_types=1);

namespace AoC\Traits;

trait CanReadFiles
{
	public function getFileData(): array
	{
		$fileData = file($this->file, FILE_IGNORE_NEW_LINES);

		if (!is_array($fileData)) {
			return [];
		}

		return $fileData;
	}
}
