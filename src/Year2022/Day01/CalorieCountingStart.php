<?php
declare(strict_types=1);

namespace AoC\Year2022\Day01;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new CalorieCounting(Files::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

$input = new CalorieCounting(Files::INPUT);
$input->output();