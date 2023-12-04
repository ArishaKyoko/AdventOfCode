<?php
declare(strict_types=1);

namespace AoC\Year2023\Day04;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new Scratchcards(Files::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

echo PHP_EOL . PHP_EOL;

$input = new Scratchcards(Files::INPUT);
$input->output();