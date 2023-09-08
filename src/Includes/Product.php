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
    private float $vlDeclarado;
    private string $vlDeclaradoCodigo;

    public function __construct(
        float $weight,
        float $width = 0,
        float $height = 0,
        float $length = 0,
        float $diameter = 0,
        float $cubicWeight = 0,
        float $vlDeclarado = 0,
        string $vlDeclaradoCodigo = ""
    ) {
        $this->weight      = $weight;
        $this->width       = $width;
        $this->height      = $height;
        $this->length      = $length;
        $this->diameter    = $diameter;
        $this->cubicWeight = $cubicWeight;
        $this->vlDeclarado = $vlDeclarado;
        $this->vlDeclaradoCodigo = $vlDeclaradoCodigo;
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

    public function getVlDeclarado(): float
    {
        return $this->vlDeclarado;
    }

    public function getVlDeclaradoCodigo(): string
    {
        return $this->vlDeclaradoCodigo;
    }
}
