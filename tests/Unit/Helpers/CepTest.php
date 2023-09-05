<?php

use function Pest\Faker\fake;

test('It should be possible to access the global cep() method', function() {
    $exists = function_exists('cep');
    expect($exists)->toBeTruthy();
});

test('It should be possible to use the cleanUp() method from the global get() method', function() {
    expect(
        fn() => cep()->cleanUp(fake()->regexify('12345-678'))
    )->not->toThrow(Exception::class);
});

test('It should be possible to use the validate() method from the global get() method', function() {
    expect(
        fn() => cep()->validate(fake()->regexify('[0-9]{8}'))
    )->not->toThrow(Exception::class);
});

