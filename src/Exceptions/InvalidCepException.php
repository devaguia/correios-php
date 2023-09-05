<?php

namespace Correios\Exceptions;

class InvalidCepException extends \UnexpectedValueException
{
    public function __construct(string $cep)
    {
        parent::__construct("O CEP deve possuir 8 caracteres numéricos. O valor inserido ($cep) não se encaixa no padrão!", 1001);
    }
}