<?php
declare(strict_types=1);

namespace AoC\Year2022\Day08;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new TreetopTreeHouse(Files::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

$input = new TreetopTreeHouse(Files::INPUT);
$input->output();