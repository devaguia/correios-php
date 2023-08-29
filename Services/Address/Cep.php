<?php

namespace Correios\Services\Address;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;

class Cep extends AbstractRequest
{
    public function get(string $cep): array
    {
        try {
            $this->sendRequest();
            return [];

        } catch (ApiRequestException $e) {
            $this->errors[$e->getCode()] = $e->getMessage();
            return [];
        }
    }
}

