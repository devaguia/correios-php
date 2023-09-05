<?php

use Correios\Includes\Cep;

if (!function_exists('cep')) {
    function cep(): Cep
    {
        return new Cep();
    }
}