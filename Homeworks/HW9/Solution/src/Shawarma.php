<?php

namespace Hillel;

class Shawarma {

    protected $cost;
    protected $ingridients;
    protected $title;

    public function __construct() {

    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function setIngredients(array $ingridients): void
    {
        $this->ingridients = $ingridients;
    }

    public function getIngredients(): array
    {
        return $this->ingridients;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
