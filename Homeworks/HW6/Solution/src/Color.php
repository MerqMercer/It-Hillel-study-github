<?php

namespace Hillel;

class Color {

    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function setRed(int $red): void
    {
        $this->checkRange($red);
        $this->red = $red;
    }

    private function setGreen(int $green): void
    {
        $this->checkRange($green);
        $this->green = $green;
    }

    private function setBlue(int $blue): void
    {
        $this->checkRange($blue);
        $this->blue = $blue;
    }

    public function equals(Color $anotherColor): bool
    {
        (bool) $isEqual = true;

        if ($this->red !== $anotherColor->getRed()) {
            $isEqual = false;
        } else if ($this->green !== $anotherColor->getGreen()) {
            $isEqual = false;
        } else if ($this->blue !== $anotherColor->getBlue()) {
            $isEqual = false;
        }

        return $isEqual;
    }

    public function mix(Color $anotherColor): Color
    {
        $newRed = intval( ($this->red + $anotherColor->getRed()) / 2 );
        $newGreen = intval( ($this->green + $anotherColor->getGreen()) / 2 );
        $newBlue = intval( ($this->blue + $anotherColor->getBlue()) / 2 );

        return new Color($newRed, $newGreen, $newBlue);
    }

    private function checkRange(int $colorVal): void
    {
        if ($colorVal < 0 || $colorVal > 255) {
            throw new Exception('Wrong Range, must be between 0 and 255');
        }
    }

}