<?php

namespace App\Model;

class Humidity
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0 || $value > 1) {
            throw new \InvalidArgumentException();
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
