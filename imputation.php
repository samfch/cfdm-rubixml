<?php

use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Transformers\MissingDataImputer;
use Rubix\ML\Transformers\NumericStringConverter;
use Rubix\ML\Transformers\RandomHotDeckImputer;

require_once 'vendor/autoload.php';

$dataset = Labeled::fromIterator(new CSV('dataset/cars.csv', true))
->apply(new NumericStringConverter())
->apply(new RandomHotDeckImputer());

print_r($dataset->samples());