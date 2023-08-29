<?php

namespace Correios\Services\Price;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;
use Correios\Services\Authorization\Authentication;

class Price extends AbstractRequest
{
    private string $requestNumber;
    private string $lotId;
    public function __construct(Authentication $authentication, string $requestNumber)
    {
        $this->requestNumber  = $requestNumber;
        $this->lotId          = $requestNumber . 'LT';
        $this->authentication = $authentication;

        $this->setMethod('POST');
        $this->setEndpoint('preco/v1/nacional');
        $this->setEnvironment($this->authentication->getEnvironment());
    }

    private function buildBody(): void
    {
        $products = [];

        foreach ($this->products as $value) {
            $products[] = [
            ];
        }

        $this->setBody([
            'idLote' => $this->lotId,
            'parametrosProduto' => $products
        ]);
    }

    public function get(array $serviceCodes, array $products, string $originCep, string $destinyCep, string $contract = '', int $dr = 0): array
    {
        try {
            $this->sendRequest();
            $this->buildBody();

            return [
                'code' => $this->getResponseCode(),
                'data' => $this->getResponseBody()
            ];

        } catch (ApiRequestException $e) {
            $this->errors[$e->getCode()] = $e->getMessage();
            return [];
        }
    }
}

