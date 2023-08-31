<?php

use Correios\Includes\Settings;

dataset('settings', dataset: [new Settings()]);

describe('getServiceCodes() method', function() {
    test('It should be possible to access the getServiceCodes() method', function(Settings $settings) {
        $serviceCodes = $settings->getServiceCodes();
        expect($serviceCodes)
            ->toBeArray()
            ->not->toBeEmpty();
    })->with('settings');
});

describe('getEnvironmentUrl() method', function() {
    test('It should be possible to access the getEnvironmentUrl()', function(Settings $settings) {
        $url = $settings->getEnvironmentUrl();
        expect($url)
            ->not->toBeEmpty()
            ->toBeString();
    })->with('settings');

    test('The getEnvironmentUrl() method should return the production url when we use the default isTestMode param', function(Settings $settings) {
        $url = $settings->getEnvironmentUrl();
        expect($url)
            ->not->toBeEmpty()
            ->toBeString()
            ->toBe('https://api.correios.com.br');
    })->with('settings');

    test('The getEnvironmentUrl() method should return the production url when we set the isTestMode param as false', function(Settings $settings) {
        $url = $settings->getEnvironmentUrl(false);
        expect($url)
            ->not->toBeEmpty()
            ->toBeString()
            ->toBe('https://api.correios.com.br');
    })->with('settings');

    test('The getEnvironmentUrl() method should return the production url when we set the isTestMode param as true', function(Settings $settings) {
        $url = $settings->getEnvironmentUrl(true);
        expect($url)
            ->not->toBeEmpty()
            ->toBeString()
            ->toBe('https://apihom.correios.com.br');
    })->with('settings');
});