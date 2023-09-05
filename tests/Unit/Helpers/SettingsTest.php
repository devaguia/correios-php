<?php

use function Pest\Faker\fake;

test('It should be possible to access the global settings() method', function() {
    $exists = function_exists('settings');
    expect($exists)->toBeTruthy();
});

test('It should be possible to use the getServiceCodes() method from the global settings() method', function() {
    expect(
        fn() => settings()->getServiceCodes()
    )->not->toThrow(Exception::class);
});

test('It should be possible to use the getEnvironmentUrl() method from the global settings() method', function() {
    expect(
        fn() => settings()->getEnvironmentUrl('sandbox')
    )->not->toThrow(Exception::class);
});

