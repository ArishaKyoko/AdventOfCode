<?php
declare(strict_types=1);

namespace AoC\Year2022\Day07;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new NoSpaceLeftOnDevice(Files::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

$input = new NoSpaceLeftOnDevice(Files::INPUT);
$input->output();