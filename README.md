# Correios PHP
Correios API library for PHP

* **[Utilização Básica (Basic Usage)](#usage)**
* **[Respostas API (API Response)](#response)**
* **[Autenticação (Authentication)](#auth)**
* **[Árvore de Arquivos (File Tree)](#tree)**

<br/>

<h2 id="usage">Utilização Básica (Basic Usage)</h2>

### Configuração (Setup)
```PHP
// Parâmetros obrigatórios - Required Paramns
$correios = new \Correios\Correios(
    username: 'user',
    password: 'password',
    contract: 'contract',
    isTestMode: true
);

// Parâmetros opcionais - Optional parameters
$correios = new \Correios\Correios(
    username: 'user',
    password: 'password',
    contract: 'contract',
    isTestMode: true,
    token: 'string',
    lotId: 'string'
);
```

### Rastro (Tracking)
```PHP
$response = $correios->tracking()->get(trackingCode: 'AASD546115A');
```

### Preço (Price)
```PHP
// Parâmetros obrigatórios - Required Paramns
$correios->price()->get(
    serviceCodes:['04162'],
    products:[
        ['weight' => 300]
    ],
    originCep:'71930000',
    destinyCep:'05336010'
);

// Parâmetros opcionais - Optional parameters
$correios->price()->get(
    serviceCodes:['04162'],
    products:[
        [
          'weight'      => 300,
          'type'        => "string",
          'length'      => 0,
          'height'      => 200,
          'width'       => 200,
          'diameter'    => 0,
          'cubicWeight' => 0
        ]
    ],
    originCep:'71930000',
    destinyCep:'05336010',
    contract: true,
    dr: 20
);
```

### Prazo (Date)
```PHP
// Parâmetros obrigatórios - Required Paramns
$response = $correios->date()->get(
    serviceCodes: ['39870'],
    originCep: '71930000',
    destinyCep: '05336010'
);

// Parâmetros opcionais - Optional parameters
$correios->date()->get(
    serviceCodes:['04162'],
    originCep:'71930000',
    destinyCep:'05336010',
    postDate: '2023-01-01T01:01:01.001Z'
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
// Gerando um novo token - Generating a new token
$correios = new \Correios\Correios(
    username: 'user',
    password: 'password',
    contract: 'contract',
    isTestMode: true
);

$token           = $correios->authentication()->getToken();
$tokenExpiration = $correios->authentication()->getTokenExpiration();
$responseBody    = $correios->authentication()->getResponseBody();
$responseCode    = $correios->authentication()->getResponseCode();
$errors          = $correios->authentication()->getErrors();


// Usando um token gerado anteriormente - Using a token generated earlie
$correios = new \Correios\Correios(
    username: 'user',
    password: 'password',
    contract: 'contract',
    isTestMode: true
    token: 'generatedToken'
);

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

