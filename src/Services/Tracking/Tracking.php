<?php

namespace Correios\Services\Tracking;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;

class Tracking extends AbstractRequest
{
    public function get(string $trackingCode): array
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

