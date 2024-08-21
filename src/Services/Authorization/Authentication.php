<?php

namespace Correios\Services\Authorization;

use Correios\Exceptions\ApiRequestException;
use Correios\Services\AbstractRequest;

class Authentication extends AbstractRequest
{
    private string $username;
    private string $password;
    private string $dr;
    private string $contract;
    private string $postcard;
    private string $token;
    private \DateTime $tokenExpiration;
    public function __construct(string $username, string $password, string $postcard, bool $isTestMode = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->postcard = $postcard;

        $this->setEnvironment($isTestMode ? 'sandbox' : 'production');
        $this->setEndpoint('token/v1/autentica/cartaopostagem');
        $this->setMethod('POST');

        $this->buildBody();
        $this->buildHeaders();
    }

    private function buildBody(): void
    {
        $this->setBody([
            'numero' => $this->postcard
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
            $this->setTokenProperties($data);
            $this->setContract($data);
            $this->setDr($data);
            
        } catch (ApiRequestException $e) {
            $this->errors[$e->getCode()] = $e->getMessage();
        }
    }

    private function setTokenProperties(object $data): void
    {
        if (isset($data->token) && isset($data->expiraEm)) {
            $this->token = $data->token;
            $this->tokenExpiration = new \DateTime($data->expiraEm);
        }
    }

    public function getDr(): string
    {
        return $this->dr ?? '';
    }

    private function setDr(object $data): void
    {
        if (isset($data->cartaoPostagem->dr)) {
            $this->dr = $data->cartaoPostagem->dr;
        }
    }

    public function getContract(): string
    {
        return $this->contract ?? '';
    }

    private function setContract(object $data): void
    {
        if (isset($data->cartaoPostagem->contrato)) {
            $this->contract = $data->cartaoPostagem->contrato;
        }
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

