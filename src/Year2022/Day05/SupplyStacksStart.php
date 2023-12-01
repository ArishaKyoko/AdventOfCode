<?php
declare(strict_types=1);

namespace AoC\Year2022\Day05;

use AoC\Enums\ExampleSwitch;
use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new SupplyStacks(Files::EXAMPLE, ExampleSwitch::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

$input = new SupplyStacks(Files::INPUT, ExampleSwitch::INPUT);
$input->output();