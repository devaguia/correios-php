<?php

namespace Correios\Includes\Traits;
use Correios\Exceptions\SameCepException;
use Correios\Exceptions\InvalidCepException;

trait CepHandler
{
    private string $originCep  = '';
    private string $destinyCep = '';
    private function validateCep(string $cep): string
    {
        $cleanCep = cep()->validate($cep);

        if ($this->originCep === $cleanCep || $this->destinyCep === $cleanCep) {
            throw new SameCepException($cep);
        }

        return $cleanCep;
    }
}