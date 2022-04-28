<?php

//require_once "vendor/autoload.php";
require_once "MyAutoloader.php";

$color = new \Hillel\Color(201, 202, 203);
$mixedColor = $color->mix(new \Hillel\Color(101, 102, 103));

var_dump($mixedColor->getRed(), $mixedColor->getGreen(), $mixedColor->getBlue());

if (!$color->equals($mixedColor))
{
    echo "<br>";
    echo "Цвета не равны";
}
