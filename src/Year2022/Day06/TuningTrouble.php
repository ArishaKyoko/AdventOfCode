<?php
declare(strict_types=1);

namespace AoC\Year2022\Day06;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class TuningTrouble
{
	use CanReadFiles;

	private array $_items = [];
    
    public function __construct()
	{

	}
    
    private function getArrayFromFile(): void
	{
//		$fileData = $this->getFileData('example.txt');
		$fileData = $this->getFileData('input.txt');


	}
}
new TuningTrouble();