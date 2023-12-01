<?php
declare(strict_types=1);

namespace AoC\Year2023\Day01;

require '../../../vendor/autoload.php';

$trebuchetExampleOne = new Trebuchet('example_one.txt');
$trebuchetExampleOne->output();

$trebuchetExampleTwo = new Trebuchet('example_two.txt');
$trebuchetExampleTwo->output();

$trebuchet = new Trebuchet('input.txt');
$trebuchet->output();
