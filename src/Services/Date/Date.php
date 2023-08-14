<?php

namespace Correios\Services\Date;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;

class Date extends AbstractRequest
{
    private string $requestNumber;
    private string $lotId;
    public function __construct(string $requestNumber)
    {
        $this->requestNumber = $requestNumber;
        $this->lotId = $requestNumber . 'LT';
    }

    public function get(array $serviceCodes, $originCep, $destinyCep): array
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

