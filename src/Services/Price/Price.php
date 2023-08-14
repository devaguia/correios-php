<?php

namespace Correios\Services\Price;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;

class Price extends AbstractRequest
{
    private string $requestNumber;
    private string $lotId;
    public function __construct(string $requestNumber)
    {
        $this->requestNumber = $requestNumber;
        $this->lotId = $requestNumber . 'LT';
    }

    public function get(array $serviceCodes, array $products, string $originCep, $destinyCep): array
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

