<?php
declare(strict_types=1);

namespace AoC;

use AoC\Enums\Files;
use AoC\Traits\CanReadFiles;

require __DIR__ . '/../vendor/autoload.php';

class Base
{
	use CanReadFiles;

    protected array $fileArray = [];
    protected string $file = '';
    protected static string $year = '';
    protected static string $day = '';

    /**
     * @return void
     */
    public function getArrayFromFile(): void
    {
        $this->fileArray = $this->getFileData();
    }

    protected function setFile(Files $name): void
    {
        $this->file = __DIR__ . DIRECTORY_SEPARATOR . static::$year . DIRECTORY_SEPARATOR . static::$day . DIRECTORY_SEPARATOR . $name->value;
    }
}