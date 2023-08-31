<?php

namespace Correios\Includes\Traits;
use Correios\Exceptions\SameCepException;
use WCCoreios\Exceptions\InvalidCepException;

trait CepHandler
{
    private string $originCep  = '';
    private string $destinyCep = '';
    private function validateCep(string $cep): string
    {
        $cleanCep = $this->cleanUpCep($cep);

        if (!preg_match("/^\d{8}$/", $cleanCep)) {
            throw new InvalidCepException($cep);
        }

        if ($this->originCep === $cleanCep || $this->destinyCep === $cleanCep) {
            throw new SameCepException($cep);
        }

        return $cleanCep;
    }

    private function cleanUpCep(string $cep): string
    {
        return preg_replace("/[^0-9.]/", '', $cep);
    }

}