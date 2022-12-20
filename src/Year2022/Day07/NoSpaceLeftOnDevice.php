<?php
declare(strict_types=1);

namespace AoC\Year2022\Day07;

use AoC\Traits\CanReadFiles;

require '../../../vendor/autoload.php';

class NoSpaceLeftOnDevice
{
	use CanReadFiles;

	private const COMMAND_CD = 'cd';
	private const COMMAND_TOP = '..';
	private const COMMAND_LS = 'ls';
	private const COMMAND_DIR = 'dir';

	private array $_list = [];
	private array $_dirStructure = [];
	private array $_partOne = [];
	private array $_partTwo = [];
    
    public function __construct()
	{
		$this->getArrayFromFile();
		$this->_createDirStructure();

		$this->_partOne();
		echo '';

		$this->_partTwo();
		echo '';
	}
    
    private function getArrayFromFile(): void
	{
		$this->_list = $this->getFileData('example.txt');
//		$this->_list = $this->getFileData('input.txt');
	}

	private function _partOne(): void
	{

	}

	private function _partTwo(): void
	{

	}

	private function _createDirStructure(): void
	{
		//todo under construction

		$structure = [];

		foreach ($this->_list as $item) {

		}

		$this->_dirStructure = $structure;
	}
}
new NoSpaceLeftOnDevice();