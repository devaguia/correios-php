<?php

namespace Correios\Services\Date;

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

    public function handleRequest(): array
    {
        return [];
    }
}

