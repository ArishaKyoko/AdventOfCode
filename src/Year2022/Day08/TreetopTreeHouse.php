<?php
declare(strict_types=1);

namespace AoC\Year2022\Day08;

use AoC\Base;
use AoC\Enums\Files;

class TreetopTreeHouse extends Base
{
    protected static string $year = 'Year2022';
    protected static string $day = 'Day08';

	private array $_items = [];
	private array $_partOne = [];
	private array $_partTwo = [];

    public function __construct(Files $filename)
    {
        $this->setFile($filename);
        $this->getArrayFromFile();
    }

    public function output(): void
    {
        echo 'Output Part One: ' . $this->partOne();
        echo PHP_EOL;
        echo 'Output Part Two: ' . $this->partTwo();
    }
	
	public function partOne(): void
	{

	}
	
	public function partTwo(): void
	{

	}
}
