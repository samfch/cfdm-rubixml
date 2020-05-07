<?php
require_once './vendor/autoload.php';

use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\CrossValidation\Reports\MulticlassBreakdown;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Transformers\NumericStringConverter;

$dataset = Labeled::fromIterator(new CSV('dataset/iris.csv',true))
->apply(new NumericStringConverter());

// print_r($dataset->labels());
// exit();

$estimator = new KNearestNeighbors();

$estimator->train($dataset);

if ($estimator->trained()){
    echo "training selesai \n";
} else {
    echo "training gagal!";
}

$test_data = [
    [5.2, 3.7, 1.9, 0.3],
    [3.2, 3.7, 2.4, 1.3],
    [4.0, 4.0, 3.1, 1.6]
];

$test_labels = ['setosa','setosa','versicolor'];

$data_test = new Unlabeled($test_data);

$prediction = $estimator->predict($data_test);

// print_r($prediction);

$report = new MulticlassBreakdown();

$result = $report->generate($prediction, $test_labels);

print_r($result);