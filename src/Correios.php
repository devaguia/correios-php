<?php

namespace Correios;

use Correios\Exceptions\InvalidCorreiosServiceCode;
use Correios\Includes\Settings;
use Correios\Services\{Address\Cep, Authorization\Authentication, Date\Date, Price\Price, Tracking\Tracking};

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
        $this->contract      = $contract;

        $this->authenticate($username, $password, $contract, $isTestMode, $token);
    }

    public function tracking(): Tracking
    {
        return new Tracking($this->authentication);
    }

    public function price(): Price
    {
        return new Price($this->authentication, $this->requestNumber);
    }

    public function date(): Date
    {
        return new Date($this->requestNumber);
    }

    public function address(): Cep
    {
        return new Cep;
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

    public function setRequestNumber(string $requestNumber): void
    {
        $this->requestNumber = $requestNumber;
    }

    public function setLotId(string $lotId): void
    {
        $this->lotId = $lotId;
    }
}
