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
        switch ($variable) {
            case 'price':
                $this->price = $this->casts['price']::set($value);
                break;
            case 'attributes':
                $this->attributes = $this->casts['attributes']::set($value);
                break;
            case 'updatedAt':
                $this->updatedAt = $this->casts['updatedAt']::set($value);
                break;
        }
    }

    public function __get($variable)
    {
        switch ($variable) {
            case 'price':
                return $this->casts['price']::get($this->price);
            case 'attributes':
                return $this->casts['attributes']::get($this->attributes);
            case 'updatedAt':
                return $this->casts['updatedAt']::get($this->updatedAt);
        }
    }

    public function __toString(): string
    {
        $arr = [
            'price' => $this->casts['price']::get($this->price),
            'attributes' => $this->casts['attributes']::get($this->attributes),
            'updated_at' => $this->casts['updatedAt']::get($this->updatedAt)
        ];
        return print_r($arr, true);
    }
}
