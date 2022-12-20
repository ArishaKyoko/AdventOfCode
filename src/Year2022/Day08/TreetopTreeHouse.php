<?php
declare(strict_types=1);

namespace AoC\Year2022\Day08;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class TreetopTreeHouse
{
	use CanReadFiles;

	private array $_items = [];
	private array $_partOne = [];
	private array $_partTwo = [];
    
    public function __construct()
	{
		$this->getArrayFromFile();

		$this->_partOne();
		echo '';

		$this->_partTwo();
		echo '';
	}
    
    private function getArrayFromFile(): void
	{

	}
	
	private function _partOne(): void
	{

	}
	
	private function _partTwo(): void
	{

	}
}
new TreetopTreeHouse();