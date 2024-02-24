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
    /**
     * @var int Tipo do objeto.
     * 1 - Envelope (Default);
     * 2 - Caixa;
     * 3 - Rolo
     */
    private int $objectType;

    public function __construct(
        float $weight,
        float $width = 0,
        float $height = 0,
        float $length = 0,
        float $diameter = 0,
        float $cubicWeight = 0,
        int   $objectType = 1
    ) {
        $this->weight      = $weight;
        $this->width       = $width;
        $this->height      = $height;
        $this->length      = $length;
        $this->diameter    = $diameter;
        $this->cubicWeight = $cubicWeight;
        $this->objectType  = $objectType;
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

    public function getObjectType(): int
    {
        return $this->objectType;
    }
}
