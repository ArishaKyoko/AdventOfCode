<?php
declare(strict_types=1);

namespace AoC\Year2022\Day04;

use AoC\Enums\Files;

require '../../../vendor/autoload.php';

$example = new CampCleanup(Files::EXAMPLE);
$example->output();

echo PHP_EOL . PHP_EOL;

$input = new CampCleanup(Files::INPUT);
$input->output();