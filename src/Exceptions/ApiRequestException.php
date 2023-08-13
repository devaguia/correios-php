<?php

namespace Correios\Exceptions;

class ApiRequestException extends \RuntimeException
{
    public function __construct(object $response)
    {
        parent::__construct($this->getResponseMessage($response), 1000);
    }

    private function getResponseMessage(object $response): string
    {
        $message = 'Não foi possível realizar a requisição. Por favor, verifique os parâmetros enviados';

        if (isset($response->msgs)) {
            $message = end($response->msgs);
        }

        return $message;
    }
}