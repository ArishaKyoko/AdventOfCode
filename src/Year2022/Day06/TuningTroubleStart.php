<?php
declare(strict_types=1);

namespace AoC\Year2022\Day06;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example1 = new TuningTrouble(Files::EXAMPLE_ONE);
$example1->output();

echo PHP_EOL . PHP_EOL;

$example2 = new TuningTrouble(Files::EXAMPLE_TWO);
$example2->output();

echo PHP_EOL . PHP_EOL;

$example3 = new TuningTrouble(Files::EXAMPLE_THREE);
$example3->output();

echo PHP_EOL . PHP_EOL;

$example4 = new TuningTrouble(Files::EXAMPLE_FOUR);
$example4->output();

echo PHP_EOL . PHP_EOL;

$example5 = new TuningTrouble(Files::EXAMPLE_FIVE);
$example5->output();

echo PHP_EOL . PHP_EOL;

$input = new TuningTrouble(Files::INPUT);
$input->output();