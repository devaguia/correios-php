<?php

use Correios\Correios;
use Correios\Services\Address\Cep;
use Correios\Services\Authorization\Authentication;
use Correios\Services\Date\Date;
use Correios\Services\Price\Price;
use Correios\Services\Tracking\Tracking;
use function Pest\Faker\fake;

$username = fake()->userName();
$postcard = fake()->regexify('[0-9]{10}');
$password = fake()->password();

dataset('username', [$username]);
dataset('password', [$password]);
dataset('postcard', [$postcard]);
dataset('correios', [new Correios($username, $password, $postcard, true)]);


test('It should be possible to instance the Correios class', function(string $username, string $password, string $postcard){
    $correios = new Correios($username, $password, $postcard, true);

    expect($correios)
        ->not->toBeNull()
        ->toBeInstanceOf(Correios::class);

})->with('username', 'password', 'postcard');

describe('tracking() method', function() {
    test('It should be possible to access the tracking method', function(Correios $correios){
        expect($correios->tracking())
            ->not->toBeNull();

    })->with('correios');

    test('The tracking() method should return an instance of Correios\Services\Tracking\Tracking', function(Correios $correios){
        expect($correios->tracking('AA123456789BR'))
            ->toBeInstanceOf(Tracking::class);

    })->with('correios');
});

describe('price() method', function() {
    test('It should be possible to access the price method', function(Correios $correios){
        expect($correios->price())
            ->not->toBeNull();

    })->with('correios');

    test('The price() method should return an instance of Correios\Services\Price\Price', function(Correios $correios){
        expect($correios->price())
            ->toBeInstanceOf(Price::class);

    })->with('correios');
});

describe('date() method', function() {
    test('It should be possible to access the date() method', function(Correios $correios){
        expect($correios->date())
            ->not->toBeNull();

    })->with('correios');

    test('The date() method should return an instance of Correios\Services\Date\Date', function(Correios $correios){
        expect($correios->date())
            ->toBeInstanceOf(Date::class);

    })->with('correios');
});

describe('address() method', function() {
    test('It should be possible to access the address() method', function(Correios $correios){
        expect($correios->address())
            ->not->toBeNull();

    })->with('correios');

    test('The address() method should return an instance of Correios\Services\Address\Cep', function(Correios $correios){
        expect($correios->address())
            ->toBeInstanceOf(Cep::class);

    })->with('correios');
});

describe('authentication() method', function() {
    test('It should be possible to access the authentication() method', function(Correios $correios){
        expect($correios->authentication())
            ->not->toBeNull();

    })->with('correios');

    test('The authentication() method should return an instance of Correios\Services\Authorization\Authentication', function(Correios $correios){
        expect($correios->authentication())
            ->toBeInstanceOf(Authentication::class);

    })->with('correios');
});


describe('getErrors() method', function() {
    test('It should be possible to access the getErrors() method', function(Correios $correios){
        expect($correios->getErrors())
            ->not->toBeNull();
    })->with('correios');

    test('The getErrors() method should return an array of strings', function(Correios $correios){
        expect($correios->getErrors())
            ->toBeArray();
    })->with('correios');
});

describe('getLotId() method', function() {
    test('It should be possible to access the getLotId() method', function(Correios $correios){
        expect($correios->getLotId())
            ->not->toBeNull();
    })->with('correios');

    test('The getLotId() method must return the same value that was entered in the setLotId() method', function(Correios $correios){
        $timestamp = time();
        $correios->setLotId($timestamp);

        expect($correios->getLotId())
            ->toBe((string) $timestamp);
    })->with('correios');
});

describe('getRequestNumber() method', function() {
    test('It should be possible to access the getRequestNumber() method', function(Correios $correios){
        expect($correios->getRequestNumber())
            ->not->toBeNull();
    })->with('correios');

    test('The getRequestNumber() method must return the same value that was entered in the setRequestNumber() method', function(Correios $correios){
        $timestamp = time();
        $correios->setRequestNumber($timestamp);

        expect($correios->getRequestNumber())
            ->toBe((string) $timestamp);
    })->with('correios');
});