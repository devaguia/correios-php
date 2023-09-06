<?php

namespace Correios;

use Correios\Services\{
    Address\Cep,
    Authorization\Authentication,
    Date\Date,
    Price\Price,
    Tracking\Tracking
};

class Correios
{
    private Authentication $authentication;
    private Price $price;
    private Date $date;
    private Cep $address;
    private Tracking $tracking;
    private string $requestNumber;
    private string $lotId;
    private string $postcard;
    private array $errors = [];

    public function __construct(string $username, string $password, string $postcard, bool $isTestMode = false, string $token = '')
    {
        $this->requestNumber = time();
        $this->postcard      = $postcard;

        $this->authenticate($username, $password, $postcard, $isTestMode, $token);
    }

    public function tracking(bool $reset = false): Tracking
    {
        if(!isset($this->tracking) || $reset) {
            $this->tracking = new Tracking($this->authentication);
        }

        return $this->tracking;
    }

    public function price(bool $reset = false): Price
    {
        if(!isset($this->price) || $reset) {
            $this->price = new Price($this->authentication, $this->requestNumber);
        }

        return $this->price;
    }

    public function date(bool $reset = false): Date
    {
        if(!isset($this->date) || $reset) {
            $this->date = new Date($this->authentication, $this->requestNumber);
        }

        return $this->date;
    }

    public function address(bool $reset = false): Cep
    {
        if(!isset($this->address) || $reset) {
            $this->address = new Cep($this->authentication);
        }

        return $this->address;
    }

    public function authentication(): Authentication
    {
        return $this->authentication;
    }

    private function authenticate(string $username, string $password, string $postcard, bool $isTestMode, string $token): void
    {
        $this->authentication = new Authentication($username, $password, $postcard, $isTestMode);
        if ($token) {
            $this->authentication->setToken($token);
            return;
        }

        $this->authentication->generateToken();
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
