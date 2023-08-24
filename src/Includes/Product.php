<?php

namespace Correios\Includes;

class Product
{
    private int $weight;
    private float $width;
    private float $height;
    private float $length;
    public function __construct(int $weight, float $width, float $height, float $length)
    {
        $this->weight = $weight;
        $this->width  = $width;
        $this->height = $height;
        $this->length = $length;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getLength(): float
    {
        return $this->length;
    }
}
