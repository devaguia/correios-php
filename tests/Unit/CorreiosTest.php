<?php
use Correios\Correios;

$username   = 'bvcbltda';
$contract   = '9912420493';
$password   = 'inANUOVQBvAmRbAVemRqmpZhQFMYzGL1fsPcXQiH';

dataset('username', [$username]);
dataset('password', [$password]);
dataset('contract', [$contract]);
dataset('cep', ['71930000']);
dataset('originCep', ['71930000']);
dataset('destinyCep', ['05336010']);
dataset('product', [300]);
dataset('serviceCode', ['04162']);
dataset('correios', [new Correios($username, $password, $contract, true)]);



test('It should be possible to instance the Correios class', function(string $username, string $password, string $contract){
    $correios = new Correios($username, $password, $contract, true);

    expect($correios)
        ->not->toBeNull()
        ->toBeInstanceOf(Correios::class);

})->with('username', 'password', 'contract');

describe('tracking method', function() {
    test('It should be possible to access the tracking method', function(Correios $correios){
        expect($correios->tracking('AA123456789BR'))
            ->not->toBeNull();

    })->with('correios');

    test('The tracking() method should return an instance of Correios\Services\Tracking\Tracking', function(Correios $correios){
        expect($correios->tracking('AA123456789BR'))
            ->toBeInstanceOf(\Correios\Services\Tracking\Tracking::class);

    })->with('correios');
});

describe('price method', function() {
    test('It should be possible to access the price method', function(Correios $correios, string $serviceCode, int $product, string $originCep, string $destinyCep){
        expect($correios->price([$serviceCode], [$product], $originCep, $destinyCep))
            ->not->toBeNull();

    })->with('correios', 'serviceCode', 'product', 'originCep', 'destinyCep');

    test('The price() method should return an instance of Correios\Services\Price\Price', function(Correios $correios, string $serviceCode, int $product, string $originCep, string $destinyCep){
        expect($correios->price([$serviceCode], [$product], $originCep, $destinyCep))
            ->toBeInstanceOf(\Correios\Services\Price\Price::class);

    })->with('correios', 'serviceCode', 'product', 'originCep', 'destinyCep');
});

describe('date method', function() {
    test('It should be possible to access the date method', function(Correios $correios, string $serviceCode, string $originCep, string $destinyCep){
        expect($correios->date([$serviceCode], $originCep, $destinyCep))
            ->not->toBeNull();

    })->with('correios', 'serviceCode', 'originCep', 'destinyCep');

    test('The date() method should return an instance of Correios\Services\Date\Date', function(Correios $correios, string $serviceCode, string $originCep, string $destinyCep){
        expect($correios->date([$serviceCode], $originCep, $destinyCep))
            ->toBeInstanceOf(\Correios\Services\Date\Date::class);

    })->with('correios', 'serviceCode', 'originCep', 'destinyCep');
});

describe('address method', function() {
    test('It should be possible to access the address method', function(Correios $correios, string $cep){
        expect($correios->address($cep))
            ->not->toBeNull();

    })->with('correios', 'cep');

    test('The address() method should return an instance of Correios\Services\Address\Cep', function(Correios $correios, string $cep){
        expect($correios->address($cep))
            ->toBeInstanceOf(\Correios\Services\Address\Cep::class);

    })->with('correios', 'cep');
});

describe('authentication method', function() {
    test('It should be possible to access the authentication method', function(Correios $correios){
        expect($correios->authentication())
            ->not->toBeNull();

    })->with('correios');

    test('The authentication() method should return an instance of Correios\Services\Authorization\Authentication', function(Correios $correios){
        expect($correios->authentication())
            ->toBeInstanceOf(\Correios\Services\Authorization\Authentication::class);

    })->with('correios');
});

describe('getErrors method', function() {
    test('It should be possible to access the getErrors method', function(Correios $correios){
        expect($correios->getErrors())
            ->not->toBeNull();
    })->with('correios');

    test('The getErrors() method should return an array of strings', function(Correios $correios){
        expect($correios->getErrors())
            ->toBeArray();
    })->with('correios');
});