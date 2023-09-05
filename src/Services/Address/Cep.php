<?php

namespace Correios\Services\Address;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\{
    AbstractRequest,
    Authorization\Authentication
};

class Cep extends AbstractRequest
{
    public function __construct(Authentication $authentication)
    {
        $this->authentication = $authentication;
        $this->setMethod('GET');
        $this->setEnvironment($this->authentication->getEnvironment());
    }

    public function get(string $cep): array
    {
        try {
            $this->setEndpoint('cep/v1/enderecos/' . cep()->validate($cep));
            $this->sendRequest();

            return [
                'code' => $this->getResponseCode(),
                'data' => $this->getResponseBody(),
            ];

        } catch (ApiRequestException $e) {
            $this->errors[$e->getCode()] = $e->getMessage();
            return [];
        }
    }
}
