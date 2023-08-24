<?php

use function Pest\Faker\fake;
use Correios\Includes\Product;

$weight = fake()->numberBetween(1,1000);
$width  = fake()->randomFloat(1, 1, 100);
$height = fake()->randomFloat(1, 1, 100);
$length = fake()->randomFloat(1, 1, 100);

dataset('weight', [$weight]);
dataset('width', [$width]);
dataset('height', [$height]);
dataset('length', [$length]);
dataset('product', [new Product($weight, $width, $height, $length)]);


describe('weight property', function() {
    test('It should be possible to access the weight property using the getWeight() method', function(Product $product){
        expect($product->getWeight())
            ->not->toBeNull()
            ->toBeFloat();
    })->with('product');

    test('The getWeight() method must return the same value insert on the constructor method', function(Product $product, float $weight){
        expect($product->getWeight())
            ->not->toBeNull()
            ->toBeFloat()
            ->toBe($weight);
    })->with('product', 'weight');
});

describe('width property', function() {
    test('It should be possible to access the width property using the getWidth() method', function(Product $product){
        expect($product->getWidth())
            ->not->toBeNull()
            ->toBeFloat();
    })->with('product');

    test('The getWidth() method must return the same value insert on the constructor method', function(Product $product, float $width){
        expect($product->getWidth())
            ->not->toBeNull()
            ->toBeFloat()
            ->toBe($width);
    })->with('product', 'width');
});

describe('height property', function() {
    test('It should be possible to access the height property using the getHeight() method', function(Product $product){
        expect($product->getHeight())
            ->not->toBeNull()
            ->toBeFloat();
    })->with('product');

    test('The getHeight() method must return the same value insert on the constructor method', function(Product $product, float $height){
        expect($product->getHeight())
            ->not->toBeNull()
            ->toBeFloat()
            ->toBe($height);
    })->with('product', 'height');
});

describe('length property', function() {
    test('It should be possible to access the height property using the getLength() method', function(Product $product){
        expect($product->getLength())
            ->not->toBeNull()
            ->toBeFloat();
    })->with('product');

    test('The getLength() method must return the same value insert on the constructor method', function(Product $product, float $length){
        expect($product->getLength())
            ->not->toBeNull()
            ->toBeFloat()
            ->toBe($length);
    })->with('product', 'length');
});

describe('diameter property', function() {
    test('It should be possible to access the diameter property using the getDiameter() method', function(Product $product){
        expect($product->getDiameter())
            ->not->toBeNull()
            ->toBeFloat();
    })->with('product');

    test('The getDiameter() method must return the same value insert on the constructor method', function(Product $product, float $diameter){
        expect($product->getDiameter())
            ->not->toBeNull()
            ->toBeFloat()
            ->toBe($diameter);
    })->with('product', 'diameter');
});

describe('cubicWeight property', function() {
    test('It should be possible to access the cubicWeight property using the getCubicWeight() method', function(Product $product){
        expect($product->getCubicWeight())
            ->not->toBeNull()
            ->toBeFloat();
    })->with('product');

    test('The getCubicWeight() method must return the same value insert on the constructor method', function(Product $product, float $cubicWeight){
        expect($product->getCubicWeight())
            ->not->toBeNull()
            ->toBeFloat()
            ->toBe($cubicWeight);
    })->with('product', 'cubicWeight');
});

