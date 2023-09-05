<?php

use Correios\Exceptions\InvalidCepException;
use Correios\Includes\Cep;
use function Pest\Faker\fake;

dataset('cep', dataset: [new Cep()]);
dataset('postcode', dataset: [fake()->regexify('[0-9]{8}')]);

describe('cleanUp() method', function() {
    test('It should be possible to access the cleanUp() method', function(Cep $cep, string $postcode) {
        $cleanUp = $cep->cleanUp($postcode);
        expect($cleanUp)
            ->not->toBeNull()
            ->toBeString()
            ->toBe(preg_replace("/[^0-9.]/", '', $postcode));
    })->with('cep', 'postcode');
});

describe('validate() method', function() {
    test('It should be possible to access the validate() method', function(Cep $cep, string $postcode) {
        $object = $cep->validate($postcode);
        expect($object)
            ->not->toBeNull()
            ->toBeString()
            ->toBe(preg_replace("/[^0-9.]/", '', $postcode));
    })->with('cep', 'postcode');

    test('The validate() method should generate an InvalidCepException when is used an invalid Cep', function(Cep $cep) {
        expect(
            fn() => $cep->validate(fake()->regexify('[0-9]{7}'))
        )->toThrow(InvalidCepException::class);
    })->with('cep');
});