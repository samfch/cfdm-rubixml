<?php
require_once './vendor/autoload.php';

use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\CrossValidation\Reports\MulticlassBreakdown;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Transformers\NumericStringConverter;

$dataset = Labeled::fromIterator(new CSV('dataset/iris.csv', true))
->apply(new NumericStringConverter());

[$training, $testing] = $dataset->split(0.8);

$estimator = new KNearestNeighbors();

$estimator->train($training);

if ($estimator->trained()){
    echo "training selesai \n";
} else {
    echo "training gagal \n";
}

$prediction = $estimator->predict($testing);

print_r($prediction);

$report = new MulticlassBreakdown();

$result = $report->generate($prediction, $testing->labels());

print_r($result);