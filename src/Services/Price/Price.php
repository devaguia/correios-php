<?php

namespace Correios\Services\Price;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;
use Correios\Services\Authorization\Authentication;

class Price extends AbstractRequest
{
    private string $requestNumber;
    private string $lotId;
    private array $serviceCodes;
    private array $products;
    private array $parametrosProduto;
    private array $body;
    private $token;

    public function __construct(Authentication $authentication, string $requestNumber)
    {
        $this->requestNumber = $requestNumber;
        $this->lotId = $requestNumber . 'LT';
        $this->authentication = $authentication;

        $this->setMethod('POST');
        $this->setEndpoint('preco/v1/nacional');
        $this->setEnvironment($this->authentication->getEnvironment());
        $this->buildHeaders();
    }

    private function buildBody($serviceCodes, $products, $originCep, $destinyCep): void
    {

        foreach ($serviceCodes as $service) {
            foreach ($products as $product) {
                $parametrosProduto[] = ["coProduto" => $service,
                    "psObjeto" => $product["weight"],
                    "cepOrigem" => $originCep,
                    "cepDestino" => $destinyCep,
                    "nuRequisicao" => $this->requestNumber];
            }
        }
        $this->setBody([
            'idLote' => $this->lotId,
            'parametrosProduto' => $parametrosProduto,
        ]);

    }


    public function get(array $serviceCodes, array $products, string $originCep, string $destinyCep, string $contract = '', int $dr = 0): array
    {
        try {
            $this->buildBody($serviceCodes, $products, $originCep, $destinyCep);
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
