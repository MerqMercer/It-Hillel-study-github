<?php

require_once "vendor/autoload.php";

$shawarmaBeef = new \Hillel\ShawarmaBeef();
$shawarmaFromOdessa = new \Hillel\ShawarmaFromOdessa();
$shawarmaLamb = new \Hillel\ShawarmaLamb();

echo $shawarmaBeef->getTitle();
echo '<br>';
echo $shawarmaBeef->getCost();
echo '<br>';
var_dump($shawarmaBeef->getIngredients());
echo '<br>';
echo '<br>';
echo $shawarmaFromOdessa->getTitle();
echo '<br>';
echo $shawarmaFromOdessa->getCost();
echo '<br>';
var_dump($shawarmaFromOdessa->getIngredients());
echo '<br>';
echo '<br>';
echo $shawarmaLamb->getTitle();
echo '<br>';
echo $shawarmaLamb->getCost();
echo '<br>';
var_dump($shawarmaLamb->getIngredients());
echo '<br>';
echo '<br>';

$shawarmaCalculator = new \Hillel\ShawarmaCalculator();
$shawarmaCalculator->add($shawarmaBeef);
$shawarmaCalculator->add($shawarmaLamb);

var_dump($shawarmaCalculator->ingridients());
echo '<br>';
echo '<br>';
var_dump($shawarmaCalculator->price());
