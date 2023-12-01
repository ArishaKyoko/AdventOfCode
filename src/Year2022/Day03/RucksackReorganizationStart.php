<?php
declare(strict_types=1);

namespace AoC\Year2022\Day03;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new RucksackReorganization(Files::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

$input = new RucksackReorganization(Files::INPUT);
$input->output();