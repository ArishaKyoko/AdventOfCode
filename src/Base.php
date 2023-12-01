<?php
declare(strict_types=1);

namespace AoC;

use AoC\Traits\CanReadFiles;

require __DIR__ . '/../vendor/autoload.php';

class Base
{
	use CanReadFiles;

    protected array $fileArray = [];

    /**
     * @param string $filename
     * @return void
     */
    public function getArrayFromFile(string $filename): void
    {
        $this->fileArray = $this->getFileData($filename);
    }
}