<?php
declare(strict_types=1);

namespace AoC\Year2023\Day02;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new CubeConundrum(Files::EXAMPLE_ONE);
$example->output();

echo PHP_EOL . PHP_EOL;

echo PHP_EOL . PHP_EOL;

$input = new CubeConundrum(Files::INPUT);
$input->output();