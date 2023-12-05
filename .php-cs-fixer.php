<?php
declare(strict_types=1);
use PhpCsFixer\Config;

$config = new Config();
$config->setRiskyAllowed(true);
$config->setIndent("\t");
$config->setLineEnding("\n");
$config->setCacheFile('.php-cs-fixer.cache');

$config->getFinder()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
;

$config->setRules([
    '@PER-CS2.0' => true,

    'declare_strict_types' => true,
    'strict_comparison' => true,
    'strict_param' => true,

    'array_syntax' => true,

    'phpdoc_order' => true,
    'phpdoc_separation' => true,

    'no_unused_imports' => true,
]);

return $config;