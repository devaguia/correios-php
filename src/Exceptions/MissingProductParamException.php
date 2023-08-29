<?php

namespace Correios\Exceptions;

class MissingProductParamException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct(
            "O array de produtos deve obrigatoriamente possuir uma chave 'weight' com uma valor do tipo inteiro!",
            1003
        );
    }
}
