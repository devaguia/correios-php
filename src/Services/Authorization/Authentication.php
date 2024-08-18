<?php

namespace Correios\Services\Authorization;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;

class Authentication extends AbstractRequest
{
    private string $username;
    private string $password;
    private string $dr;
    private object $cartaoPostagem;
    private string $contract;
    private string $token;
    private \DateTime $tokenExpiration;
    public function __construct(string $username, string $password, string $contract, bool $isTestMode = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->contract = $contract;
        $this->cartaoPostagem = (object) [];

        $this->setEnvironment($isTestMode ? 'sandbox' : 'production');
        $this->setEndpoint('token/v1/autentica/cartaopostagem');
        $this->setMethod('POST');

        $this->buildBody();
        $this->buildHeaders();
    }

    private function buildBody(): void
    {
        $this->setBody([
            'numero' => $this->contract
        ]);
    }

    private function buildHeaders(): void
    {
        $this->setHeaders([
            'Authorization' => 'Basic ' . base64_encode("$this->username:$this->password"),
            'Content-Type'  => 'application/json'
        ]);
    }

    public function generateToken(): void
    {
        try {
            $this->sendRequest();
            $data = $this->getResponseBody();

            if (isset($data->token) && isset($data->expiraEm)) {
                $this->token = $data->token;
                $this->tokenExpiration = new \DateTime($data->expiraEm);
            }
            // Set DR and Contract
            if (isset($data->cartaoPostagem->dr) && isset($data->cartaoPostagem->contrato)) {
                $this->cartaoPostagem->dr = $data->cartaoPostagem->dr;
                $this->cartaoPostagem->contract = $data->cartaoPostagem->contrato;
            }
        } catch (ApiRequestException $e) {
            $this->errors[$e->getCode()] = $e->getMessage();
        }
    }

    public function setCartaoPostagem(object $cartaoPostagem): void
    {
        $this->cartaoPostagem = $cartaoPostagem;
    }

    public function getDr(): string
    {
        return $this->cartaoPostagem->dr ?? '';
    }

    public function getContract(): string
    {
        return $this->cartaoPostagem->contract ?? '';
    }

    public function getToken(): string
    {
        return $this->token ?? '';
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getTokenExpiration(): \DateTime
    {
        return $this->tokenExpiration ?? new \DateTime();
    }
}

