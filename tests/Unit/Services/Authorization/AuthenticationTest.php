<?php

use Correios\Services\Authorization\Authentication;
use function Pest\Faker\fake;

$username = fake()->userName();
$contract = fake()->regexify('[0-9]{10}');
$password = fake()->password();
$token    = fake()->regexify('[0-9]{10}[A-Z]{5}[a-z]{5}');
$dr       = fake()->regexify('[0-9]{10}');

dataset('username', [$username]);
dataset('password', [$password]);
dataset('contract', [$contract]);
dataset('token', [$token]);
dataset('dr', [$dr]);

test('It should be possible instance the authentication class without generate any errors in the array list', function(string $username, string $password, string $contract) {
    $authentication = new Authentication($username, $password, $contract, true);
    expect($authentication)
        ->toBeInstanceOf(Authentication::class);
})->with('username', 'password', 'contract');

describe('generateToken() method', function() {
    test('It should be possible to use the generateToken() method without generate any Exception', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect(
            fn() => $authentication->generateToken()
        )->not->toThrow(Exception::class);

    })->with('username', 'password', 'contract');
});

describe('getToken() method', function() {
    test('It should be possible to access the generated token using the getToken() method', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getToken())
            ->not->toBeNull();
    })->with('username', 'password', 'contract');

    test('The getToken() method must return a string', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getToken())
            ->not->toBeNull()
            ->toBeString();
    })->with('username', 'password', 'contract');
});

describe('getTokenExpiration() method', function() {
    test('It should be possible to access the generated token expiration using the getTokenExpiration() method', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getTokenExpiration())
            ->not->toBeNull();
    })->with('username', 'password', 'contract');

    test('The getTokenExpiration() method must return an instance of DateTime class', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getTokenExpiration())
            ->not->toBeNull()
            ->toBeInstanceOf(DateTime::class);
    })->with('username', 'password', 'contract');
});

describe('setToken() method', function() {
    test('It should be possible to use the setToken() method', function(string $username, string $password, string $contract, string $token) {
        $authentication = new Authentication($username, $password, $contract, true);

        expect(fn() =>
            $authentication->setToken($token)
        )->not->toThrow(Exception::class);

    })->with('username', 'password', 'contract', 'token');

    test('It should be possible to access the token inserted using the setToken(), using the getToken() method', function(string $username, string $password, string $contract, string $token) {
        $authentication = new Authentication($username, $password, $contract, true);

        $authentication->setToken($token);
        expect($authentication->getToken())
            ->not->toBeNull()
            ->toBeString()
            ->toBe($token);

    })->with('username', 'password', 'contract', 'token');
});

describe('getErrors() method', function() {
    test('It should be possible to access the errors property using the getErrors() method', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getErrors())
            ->not->toBeNull();

    })->with('username', 'password', 'contract');

    test('The getErrors() method must return an array', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getErrors())
            ->not->toBeNull()
            ->toBeArray();

    })->with('username', 'password', 'contract');
});

describe('getResponseBody() method', function() {
    test('It should be possible to access the responseBody property using the getResponseBody() method', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getResponseBody())
            ->not->toBeNull();

    })->with('username', 'password', 'contract');

    test('The getResponseBody() method must return an instance of stdClass', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getResponseBody())
            ->not->toBeNull()
            ->toBeInstanceOf(stdClass::class);

    })->with('username', 'password', 'contract');
});

describe('getResponseCode() method', function() {
    test('It should be possible to access the responseCode property using the getResponseCode() method', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getResponseCode())
            ->not->toBeNull();

    })->with('username', 'password', 'contract');

    test('The getResponseCode() method must return an int number', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        expect($authentication->getResponseCode())
            ->not->toBeNull()
            ->toBeInt();

    })->with('username', 'password', 'contract');
});


describe('getDr() method', function() {
    test('It should be possible to use the getDr() method', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        $authentication->getToken();

        expect(fn() =>
        $authentication->getDr()
        )->not->toThrow(Exception::class);

    })->with('username', 'password', 'contract');

    test('The getDr() method must return a string', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        $authentication->getToken();

        expect($authentication->getDr())
            ->not->toBeNull()
            ->toBeString();

    })->with('username', 'password', 'contract');
});

describe('getContract() method', function() {
    test('It should be possible to use the getContract() method', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        $authentication->getToken();
        
        expect(fn() =>
        $authentication->getToken()
        )->not->toThrow(Exception::class);

    })->with('username', 'password', 'contract');

    test('The getContract() method must return a string', function(string $username, string $password, string $contract) {
        $authentication = new Authentication($username, $password, $contract, true);
        $authentication->getToken();

        expect($authentication->getContract())
            ->not->toBeNull()
            ->toBeString();

    })->with('username', 'password', 'contract');
});