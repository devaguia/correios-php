# Correios PHP
Correios API library for PHP

* **[Utilização Básica (Basic Usage)](#usage)**
* **[Respostas API (API Response)](#response)**
* **[Autenticação (Authentication)](#auth)**
* **[Árvore de Arquivos (File Tree)](#tree)**

<br/>

<h2 id="usage">Utilização Básica (Basic Usage)</h2>

### Configuração (Configurate)
```PHP
$correios = new \Correios\Correios(
    username: 'user',
    password: 'password',
    contract: 'contract',
    isTestMode: true
);
```

### Prazo (Tracking)
```PHP
$response = $correios->tracking()->get(trackingCode: 'AASD546115A');
```

### Preço (Price)
```PHP
$response = $correios->price()->get(
    serviceCodes: ['39870'],
    products: [300],
    originCep: '71930000',
    destinyCep: '05336010'
);
```

### Prazo (Date)
```PHP
$response = $correios->date()->get(
    serviceCodes: ['39870'],
    originCep: '71930000',
    destinyCep: '05336010'
);
```

### Endereço (Address)
```PHP
$response = $correios->address()->get(cep: '05336010');
```

<br/>

<h2 id="response">Respostas API (API Response)</h2>

```PHP
$responseBody = $response->getResponseBody();
$responseCode = $response->getResponseCode();

if (empty($responseBody)) {
    $errors = $response->getErrors();
}
```

<br/>

<h2 id="auth">Autenticação (Authentication)</h2>

```PHP
$token           = $correios->authentication()->getToken();
$tokenExpiration = $correios->authentication()->getTokenExpiration();

$responseBody    = $correios->authentication()->getResponseBody();
$responseCode    = $correios->authentication()->getResponseCode();
$errors          = $correios->authentication()->getErrors();
```

<br/>

<h2 id="tree">File Tree</h2>

```
.
├── composer.json
├── composer.lock
├── correios.php
├── LICENSE
├── phpunit.xml
├── phpunit.xml.bak
├── README.md
├── src
│   ├── Correios.php
│   ├── Exceptions
│   │   ├── ApiRequestException.php
│   │   └── InvalidCorreiosServiceCode.php
│   ├── Helpers
│   │   └── Settings.php
│   ├── Includes
│   │   ├── Address.php
│   │   └── Product.php
│   └── Services
│       ├── AbstractRequest.php
│       ├── Address
│       │   └── Cep.php
│       ├── Authorization
│       │   └── Authentication.php
│       ├── Date
│       │   └── Date.php
│       ├── Price
│       │   └── Price.php
│       └── Tracking
│           └── Tracking.php
└── tests
    ├── Feature
    └── Unit
        ├── CorreiosTest.php
        ├── Helpers
        │   └── SettingsTest.php
        ├── Includes
        │   ├── AddressTest.php
        │   └── ProductTest.php
        └── Services
            ├── Address
            │   └── CepTest.php
            ├── Authorization
            │   └── AuthenticationTest.php
            ├── Date
            │   └── DateTest.php
            ├── Price
            │   └── PriceTest.php
            └── Tracking
                └── TrackingTest.php

```

