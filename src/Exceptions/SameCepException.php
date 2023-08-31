<?php

namespace Correios\Exceptions;

class SameCepException extends \UnexpectedValueException
{
    public function __construct(string $cep)
    {
        parent::__construct("O CEP de origem e o CEP de destino não podem ser iguais! O CEP enviado ($cep) está sendo utilizado como destino e origem!", 1005);
    }
}