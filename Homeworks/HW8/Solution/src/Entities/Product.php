<?php

namespace Hillel\Entities;

use Hillel\Casts\ArrayCast;
use Hillel\Casts\MoneyCast;
use Hillel\Casts\DateTimeCast;

class Product
{
    private float $price;

    private string $attributes;

    private int $updatedAt;

    protected $casts = [
        'price' => MoneyCast::class,
        'attributes' => ArrayCast::class,
        'updatedAt' => DateTimeCast::class,
    ];

    public function __construct($price, $attributes, $updatedAt)
    {
        $this->price = $price;
        $this->attributes = $attributes;
        $this->updatedAt = $updatedAt;
    }

    public function __set($variable, $value)
    {
        if ($this->checkProductVariable($variable)) {
            $this->$variable = $this->casts[$variable]::set($value);
        }
    }

    public function __get($variable)
    {
        if ($this->checkProductVariable($variable)) {
            return $this->casts[$variable]::get($this->$variable);
        }
    }

    public function checkProductVariable($variable)
    {
        if (isset($this->$variable)) {
            return true;
        } else {
            throw new \Exception('Invalid Field');
        }
    }

    public function camelToDashed($string)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $string));
    }

    public function __toString(): string
    {
        $fields = array_keys($this->casts);
        $arr = array();

        foreach ($fields as $field) {
            $arr[$this->camelToDashed($field)] = $this->casts[$field]::get($this->$field);
        }

        return print_r($arr, true);
    }
}
