<?php
declare(strict_types=1);

namespace AoC\Year2022\Day21;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new MonkeyMath(Files::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

$input = new MonkeyMath(Files::INPUT);
$input->output();