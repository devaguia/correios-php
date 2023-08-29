<?php

namespace Correios\Services\Date;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;
use Correios\Services\Authorization\Authentication;

class Date extends AbstractRequest
{
    private string $requestNumber;
    private string $lotId;
    private array $serviceCodes;
    private array $products;
    private array $parametrosPrazo;
    private array $body;
    private $token;

    public function __construct(Authentication $authentication, string $requestNumber)
    {
        $this->requestNumber = $requestNumber;
        $this->lotId = $requestNumber . 'LT';
        $this->authentication = $authentication;
        
        $this->setMethod('POST');
        $this->setEndpoint('prazo/v1/nacional');
        $this->setEnvironment($this->authentication->getEnvironment());
        $this->buildHeaders();
    }

    private function buildBody($serviceCodes, $originCep, $destinyCep): void
    {
        foreach ($serviceCodes as $service) {
            $parametrosPrazo[] = ["coProduto" => $service,
                                    "cepOrigem" => $originCep,
                                    "cepDestino" => $destinyCep,
                                    "nuRequisicao" => $this->requestNumber];
        }

        $this->setBody([
            'idLote' => $this->lotId,
            'parametrosPrazo' => $parametrosPrazo,
        ]);

    }

    public function get(array $serviceCodes, $originCep, $destinyCep): array
    {
        try {
            $this->buildBody($serviceCodes, $originCep, $destinyCep);
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

    private function buildHeaders(): void
    {
        $this->setHeaders([
            'Authorization' => 'Basic ' . $this->token,
        ]);
    }

}
