<?php

namespace Hillel;

class ShawarmaCalculator {

    private array $cart = array();

    public function __construct() {

    }

    public function add(Shawarma $shamarma): void
    {
        array_push($this->cart, $shamarma);
    }

    public function ingridients(): array
    {
        $ingridients = array();
        foreach($this->cart as $shawarma) {
            $ingridients = array_unique(array_merge($ingridients, $shawarma->getIngredients()));
        }
        return $ingridients;
    }

    public function price(): int
    {
        $price = 0;
        foreach($this->cart as $shawarma) {
            $price += $shawarma->getCost();
        }
        return $price;
    }

}
