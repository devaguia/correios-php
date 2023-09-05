<?php

use Correios\Services\{
    Tracking\Tracking,
    Authorization\Authentication
};

use function Pest\Faker\fake;

$trackingCode   = fake()->regexify('[0-9]{10}[A-Z]{5}');
$authentication = new Authentication(
    fake()->userName(),
    fake()->regexify('[0-9]{10}'),
    fake()->password(),
    true
);

dataset('authentication', [$authentication]);
dataset('trackingCode', [$trackingCode]);

test('It should be possible to instance the Tracking class without generate any errors', function(Authentication $authentication) {
    $tracking = new Tracking($authentication);
    expect($tracking)
        ->toBeInstanceOf(Tracking::class);

})->with('authentication');

describe('get() method', function() {
    test('It should be possible to use the get() method without generate any Exception', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect(
            fn() => $tracking->get($trackingCode)
        )->not->toThrow(Exception::class);

    })->with('authentication', 'trackingCode');

    test('The get() method must to return an array', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect($tracking->get($trackingCode))
            ->toBeArray();

    })->with('authentication', 'trackingCode');
});

describe('getErrors() method', function() {
    test('It should be possible to access the errors property using the getErrors() method', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect($authentication->getErrors())
            ->not->toBeNull();

    })->with('authentication', 'trackingCode');

    test('The getErrors() method must return an array', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect($authentication->getErrors())
            ->not->toBeNull()
            ->toBeArray();

    })->with('authentication', 'trackingCode');
});

describe('getResponseBody() method', function() {
    test('It should be possible to access the responseBody property using the getResponseBody() method', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect($authentication->getResponseBody())
            ->not->toBeNull();

    })->with('authentication', 'trackingCode');

    test('The getResponseBody() method must return an instance of stdClass', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect($authentication->getResponseBody())
            ->not->toBeNull()
            ->toBeInstanceOf(stdClass::class);

    })->with('authentication', 'trackingCode');
});

describe('getResponseCode() method', function() {
    test('It should be possible to access the responseCode property using the getResponseCode() method', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect($authentication->getResponseCode())
            ->not->toBeNull();

    })->with('authentication', 'trackingCode');

    test('The getResponseCode() method must return an int number', function(Authentication $authentication, string $trackingCode) {
        $tracking = new Tracking($authentication);
        expect($authentication->getResponseCode())
            ->not->toBeNull()
            ->toBeInt();

    })->with('authentication', 'trackingCode');
});