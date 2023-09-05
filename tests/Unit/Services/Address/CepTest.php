<?php

use Correios\Exceptions\InvalidCepException;
use Correios\Services\Address\Cep;
use Correios\Services\Authorization\Authentication;
use function Pest\Faker\fake;

$cep = fake()->regexify('[0-9]{8}');
$authentication = new Authentication(
    fake()->userName(),
    fake()->regexify('[0-9]{10}'),
    fake()->password(),
    true
);

dataset('authentication', [$authentication]);
dataset('cep', [$cep]);

test('It should be possible to instance the Cep class without generate any errors', function(Authentication $authentication) {
    $address = new Cep($authentication);
    expect($address)
        ->toBeInstanceOf(Cep::class);


})->with('authentication');

describe('get() method', function() {
    test('It should be possible to use the get() method without generate any Exception', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect(
            fn() => $address->get($cep)
        )->not->toThrow(Exception::class);

    })->with('authentication', 'cep');

    test('The get() method should generate an InvalidCepException when is used with an invalid Cep', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect(
            fn() => $address->get(fake()->regexify('[0-9]{7}'))
        )->toThrow(InvalidCepException::class);

    })->with('authentication', 'cep');

    test('The get() method must to return an array', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect($address->get($cep))
            ->toBeArray();

    })->with('authentication', 'cep');
});

describe('getErrors() method', function() {
    test('It should be possible to access the errors property using the getErrors() method', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect($authentication->getErrors())
            ->not->toBeNull();

    })->with('authentication', 'cep');

    test('The getErrors() method must return an array', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect($authentication->getErrors())
            ->not->toBeNull()
            ->toBeArray();

    })->with('authentication', 'cep');
});

describe('getResponseBody() method', function() {
    test('It should be possible to access the responseBody property using the getResponseBody() method', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect($authentication->getResponseBody())
            ->not->toBeNull();

    })->with('authentication', 'cep');

    test('The getResponseBody() method must return an instance of stdClass', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect($authentication->getResponseBody())
            ->not->toBeNull()
            ->toBeInstanceOf(stdClass::class);

    })->with('authentication', 'cep');
});

describe('getResponseCode() method', function() {
    test('It should be possible to access the responseCode property using the getResponseCode() method', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect($authentication->getResponseCode())
            ->not->toBeNull();

    })->with('authentication', 'cep');

    test('The getResponseCode() method must return an int number', function(Authentication $authentication, string $cep) {
        $address = new Cep($authentication);
        expect($authentication->getResponseCode())
            ->not->toBeNull()
            ->toBeInt();

    })->with('authentication', 'cep');
});