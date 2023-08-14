<?php

namespace Correios\Services\Price;

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

    public function handleRequest(): array
    {
        return [];
    }
}

