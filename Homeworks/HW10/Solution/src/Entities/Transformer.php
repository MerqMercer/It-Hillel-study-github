<?php

namespace Hillel\Entities;

class Transformer
{
    protected int $speed = 0;
    protected int $weight = 0;
    protected int $height = 0;
    public function getSpeed()
    {
        return $this->speed;
    }
    public function setSpeed(int $speed)
    {
        $this->speed = $speed;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function setHeight(int $height)
    {
        $this->height = $height;
    }
}
