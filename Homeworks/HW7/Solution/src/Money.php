<?php

namespace Hillel;

class Money {

    private $amount;
    private $currency;

    public function __construct(float $amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    public function getCurrency(): float
    {
        return $this->currency;
    }

    private function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    private function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function equals(Money $anotherMoney): bool
    {
        if ($this->currency->getisoCode() == $anotherMoney->currency->getIsoCode() && $this->amount == $anotherMoney->amount) {
            return true;
        }
        return false;
    }

    public function add(Money $anotherMoney): Money
    {
        if ($this->currency->getisoCode() == $anotherMoney->currency->getIsoCode()) {
            return new Money($this->amount + $anotherMoney->amount, $this->currency);
        }
        else {
            throw new \Exception('Diffirent currencies');            
        }
    }

}