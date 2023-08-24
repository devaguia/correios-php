<?php

namespace Correios\Includes;

class Product
{
    private float $weight;
    private float $width;
    private float $height;
    private float $length;
    private float $diameter;
    private float $cubicWeight;

    public function __construct(
        float $weight,
        float $width = 0,
        float $height = 0,
        float $length = 0,
        float $diameter = 0,
        float $cubicWeight = 0
    ) {
        $this->weight      = $weight;
        $this->width       = $width;
        $this->height      = $height;
        $this->length      = $length;
        $this->diameter    = $diameter;
        $this->cubicWeight = $cubicWeight;
    }

    public function getWeight(): float
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

    public function getDiameter(): float
    {
        return $this->diameter;
    }

    public function getCubicWeight(): float
    {
        return $this->cubicWeight;
    }
}
