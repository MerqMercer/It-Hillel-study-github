<?php

require_once "vendor/autoload.php";

$currency = new \Hillel\Currency('USD');
$currency2 = new \Hillel\Currency('EUR');
$currency3 = new \Hillel\Currency('USD');

$money = new \Hillel\Money(20, $currency);
$money2 = new \Hillel\Money(30, $currency2);
$money3 = new \Hillel\Money(20, $currency);

if(!$currency->equals($currency2)) {
    echo 'Currencies are not equal';
}

echo '<br>';

if(!$money->equals($money3)) {
    echo 'Money are not equal';
}

echo '<br>';

$money4 = $money->add($money3);
var_dump($money4);