<?php
use Correios\Correios;
use function Pest\Faker\fake;

$username = fake()->userName();
$contract = fake()->regexify('[0-9]{10}');
$password = fake()->password();

dataset('username', [$username]);
dataset('password', [$password]);
dataset('contract', [$contract]);
dataset('correios', [new Correios($username, $password, $contract, true)]);


test('It should be possible to instance the Correios class', function(string $username, string $password, string $contract){
    $correios = new Correios($username, $password, $contract, true);

    expect($correios)
        ->not->toBeNull()
        ->toBeInstanceOf(Correios::class);

})->with('username', 'password', 'contract');

describe('tracking() method', function() {
    test('It should be possible to access the tracking method', function(Correios $correios){
        expect($correios->tracking())
            ->not->toBeNull();

    })->with('correios');

    test('The tracking() method should return an instance of Correios\Services\Tracking\Tracking', function(Correios $correios){
        expect($correios->tracking('AA123456789BR'))
            ->toBeInstanceOf(\Correios\Services\Tracking\Tracking::class);

    })->with('correios');
});

describe('price() method', function() {
    test('It should be possible to access the price method', function(Correios $correios){
        expect($correios->price())
            ->not->toBeNull();

    })->with('correios');

    test('The price() method should return an instance of Correios\Services\Price\Price', function(Correios $correios){
        expect($correios->price())
            ->toBeInstanceOf(\Correios\Services\Price\Price::class);

    })->with('correios');
});

describe('date() method', function() {
    test('It should be possible to access the date() method', function(Correios $correios){
        expect($correios->date())
            ->not->toBeNull();

    })->with('correios');

    test('The date() method should return an instance of Correios\Services\Date\Date', function(Correios $correios){
        expect($correios->date())
            ->toBeInstanceOf(\Correios\Services\Date\Date::class);

    })->with('correios');
});

describe('address() method', function() {
    test('It should be possible to access the address() method', function(Correios $correios){
        expect($correios->address())
            ->not->toBeNull();

    })->with('correios');

    test('The address() method should return an instance of Correios\Services\Address\Cep', function(Correios $correios){
        expect($correios->address())
            ->toBeInstanceOf(\Correios\Services\Address\Cep::class);

    })->with('correios');
});

describe('authentication() method', function() {
    test('It should be possible to access the authentication() method', function(Correios $correios){
        expect($correios->authentication())
            ->not->toBeNull();

    })->with('correios');

    test('The authentication() method should return an instance of Correios\Services\Authorization\Authentication', function(Correios $correios){
        expect($correios->authentication())
            ->toBeInstanceOf(\Correios\Services\Authorization\Authentication::class);

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