<?php

namespace Correios;

use Correios\Helpers\Settings;
use Correios\Services\{
    Authorization\Authentication,
    Address\Cep,
    Date\Date,
    Price\Price,
    Tracking\Tracking
};

class Correios
{
    private Authentication $authentication;
    private string $requestNumber;
    private string $lotId;
    private string $contract;
    private array $errors = [];

    public function __construct(string $username, string $password, string $contract, bool $isTestMode = false, string $token = '')
    {
        $this->requestNumber = time();
        $this->lotId         = $this->requestNumber . 'LT';
        $this->contract      = $contract;

        $this->authenticate($username, $password, $contract, $isTestMode, $token);
    }

    public function tracking(string $trackingCode): Tracking
    {
        return new Tracking($trackingCode);
    }

    public function price(array $serviceCodes, array $products, string $originCep, string $destinyCep): Price
    {
        return new Price($serviceCodes, $products, $originCep, $destinyCep);
    }

    public function date(array $serviceCodes, string $originCep, string $destinyCep): Date
    {
        return new Date($serviceCodes, $originCep, $destinyCep);
    }

    public function address(string $cep): Cep
    {
        return new Cep($cep);
    }

    public function authentication(): Authentication
    {
        return $this->authentication;
    }

    private function authenticate(string $username, string $password, string $contract, bool $isTestMode, string $token): void
    {
        $this->authentication = new Authentication($username, $password, $contract, $isTestMode);
        if ($token) {
            $this->authentication->setToken($token);
            return;
        }

        $this->authentication->generateToken();
    }

    private function validateServiceCode(string $code): string
    {
        $codes = Settings::getServiceCodes();

        if (!isset($codes[$code])) {
            throw new InvalidCorreiosServiceCode($code);
        }
        return $code;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
