<?php
declare(strict_types=1);

namespace AoC\Year2023\Day01;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example1 = new Trebuchet(Files::EXAMPLE_ONE);
$example1->output();

echo PHP_EOL . PHP_EOL;

$example2 = new Trebuchet(Files::EXAMPLE_TWO);
$example2->output();

echo PHP_EOL . PHP_EOL;

$input = new Trebuchet(Files::INPUT);
$input->output();
