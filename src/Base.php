<?php
declare(strict_types=1);

namespace AoC;

use AoC\Enums\Files;
use AoC\Traits\CanReadFiles;
use AoC\Traits\CanSetYearAndDate;

require __DIR__ . '/../vendor/autoload.php';

class Base
{
	use CanReadFiles;
    use CanSetYearAndDate;

    protected array $fileArray = [];
    protected string $file = '';

    public function __construct(Files $filename)
    {
        $this->setDayAndYear();
        $this->setFile($filename);
        $this->getArrayFromFile();
    }

    /**
     * @return void
     */
    public function getArrayFromFile(): void
    {
        $this->fileArray = $this->getFileData();
    }

    protected function setFile(Files $name): void
    {
        $this->file = __DIR__ . DIRECTORY_SEPARATOR . $this->year . DIRECTORY_SEPARATOR . $this->day . DIRECTORY_SEPARATOR . $name->value;
    }
}