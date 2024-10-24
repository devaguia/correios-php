<?php

namespace Correios\Includes\Traits;

use Correios\Exceptions\SameCepException;

trait CepHandler
{
    private string $originCep  = '';
    private string $destinyCep = '';
    private function validateCep(string $originCep, string $destinyCep): void
    {
        $this->originCep = cep()->validate($originCep);
        $this->destinyCep = cep()->validate($destinyCep);

        if ($this->originCep === $this->destinyCep) {
            throw new SameCepException($this->originCep);
        }
    }
}
