<?php

require_once 'vendor/autoload.php';

$factory = new \Hillel\Entities\TransformerFactory();

$factory->addType(new \Hillel\Entities\Transformer1());
$factory->addType(new \Hillel\Entities\Transformer2());

print_r($factory->createTransformer1(5));
echo '<br>';
print_r($factory->createTransformer2(2));
echo '<br>';

$mergeTransformer = new \Hillel\Entities\MergeTransformer();
$mergeTransformer->addTransformer(new \Hillel\Entities\Transformer2());
$mergeTransformer->addTransformer($factory->createTransformer2(2));

$factory->addType($mergeTransformer);

$transformer = reset($factory->createMergeTransformer(1));

echo $transformer->getSpeed();
echo '<br>';
echo $transformer->getWeight();
echo '<br>';
echo $transformer->getHeight();