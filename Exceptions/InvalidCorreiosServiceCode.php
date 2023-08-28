<?php

namespace Correios\Exceptions;

class InvalidCorreiosServiceCode extends \UnexpectedValueException
{
    public function __construct(string $code)
    {
        parent::__construct(
            "Códido de serviço inválido! O código fornecido($code) não existe ou ainda não está em nossa base de dados!",
            1003
        );
    }
}
