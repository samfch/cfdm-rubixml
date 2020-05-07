<?php
require_once('./vendor/autoload.php');

use Rubix\ML\Datasets\Labeled;

$sample = [
    [3, 4, 50.5],
    [4, 5, 10.5],
    [1, 7, 62.7],
    [4, 2, 31.8],
];

$label = ['pria', 'wanita', 'pria', 'wanita'];

$dataset = new Labeled($sample, $label);

print_r($dataset);