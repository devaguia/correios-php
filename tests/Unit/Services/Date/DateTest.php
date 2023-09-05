<?php

use Correios\Includes\Settings;
use Correios\Exceptions\{
    InvalidCepException,
    SameCepException
};
use Correios\Services\{
    Date\Date,
    Authorization\Authentication
};

use function Pest\Faker\fake;

$settings     = new Settings();
$serviceCodes = array_keys($settings->getServiceCodes());
$serviceCode  = $serviceCodes[fake()->numberBetween(0, count($serviceCodes) - 1)];

$originCep    = fake()->regexify('[0-9]{8}');
$destinyCep   = fake()->regexify('[0-9]{8}');
$contract     = fake()->regexify('[0-9]{10}');
$dr           = fake()->numberBetween(1,99);

$authentication = new Authentication(
    fake()->userName(),
    fake()->regexify('[0-9]{10}'),
    fake()->password(),
    true
);

$date = new Date($authentication, time());

dataset('authentication', [$authentication]);
dataset('date', [$date]);
dataset('serviceCode', [$serviceCode]);
dataset('originCep', [$originCep]);
dataset('destinyCep', [$destinyCep]);
dataset('contract', [$contract]);
dataset('dr', [$dr]);

test('It should be possible to instance the Date class without generate any errors', function(Authentication $authentication) {
    $date = new Date($authentication, time());
    expect($date)
        ->toBeInstanceOf(Date::class);
})->with('authentication');

describe('get() method', function() {
    test('It should be possible to use the get() method without generate any Exception', function(Authentication $authentication, string $serviceCode, string $originCep, string $destinyCep) {
        $date = new Date($authentication, time());
        expect(
            fn() => $date->get(
                [$serviceCode],
                $originCep,
                $destinyCep
            )
        )->not->toThrow(Exception::class);

    })->with('authentication', 'serviceCode', 'originCep', 'destinyCep');

    test('The get() method should generate an InvalidCepException when we use an invalid CEP', function(Authentication $authentication, string $serviceCode, string $destinyCep) {
        $date = new Date($authentication, time());
        expect(
            fn() => $date->get(
                [$serviceCode],
                fake()->regexify('[0-9]{7}'),
                $destinyCep
            )
        )->toThrow(InvalidCepException::class);

    })->with('authentication', 'serviceCode', 'destinyCep');

    test('The get() method should generate a SameCepException when we use the same CEP for destiny and origin', function(Authentication $authentication, string $serviceCode, string $originCep) {
        $date = new Date($authentication, time());
        expect(
            fn() => $date->get(
                [$serviceCode],
                $originCep,
                $originCep
            )
        )->toThrow(SameCepException::class);

    })->with('authentication', 'serviceCode', 'originCep');

    test('The get() method must to return an array', function(Authentication $authentication, string $serviceCode, string $originCep, string $destinyCep) {
        $date = new Date($authentication, time());
        $response = $date->get(
            [$serviceCode],
            $originCep,
            $destinyCep
        );
        expect($response)
            ->toBeArray();

    })->with('authentication', 'serviceCode', 'originCep', 'destinyCep');
});

describe('getErrors() method', function() {
    test('It should be possible to access the errors property using the getErrors() method', function(Date $date) {
        expect($date->getErrors())
            ->not->toBeNull();

    })->with('date');

    test('The getErrors() method must return an array', function(Date $date) {
        expect($date->getErrors())
            ->not->toBeNull()
            ->toBeArray();

    })->with('date');
});

describe('getResponseBody() method', function() {
    test('It should be possible to access the responseBody property using the getResponseBody() method', function(Date $date) {
        expect($date->getResponseBody())
            ->not->toBeNull();

    })->with('date');

    test('The getResponseBody() method must return an instance of stdClass', function(Date $date) {
        expect($date->getResponseBody())
            ->not->toBeNull()
            ->toBeInstanceOf(stdClass::class);

    })->with('date');
});

describe('getResponseCode() method', function() {
    test('It should be possible to access the responseCode property using the getResponseCode() method', function(Date $date) {
        expect($date->getResponseCode())
            ->not->toBeNull();

    })->with('date');

    test('The getResponseCode() method must return an int number', function(Date $date) {
        expect($date->getResponseCode())
            ->not->toBeNull()
            ->toBeInt();

    })->with('date');
});