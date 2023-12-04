<?php
declare(strict_types=1);

namespace AoC\Year2022\Day08;

use AoC\Base;
use AoC\Enums\Files;

class TreetopTreeHouse extends Base
{
    public function __construct(Files $filename)
    {
        $this->setDayAndYear(__NAMESPACE__);
        parent::__construct($filename);
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
