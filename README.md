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
    postcard: 'postcard',
    isTestMode: true
);

// Parâmetros opcionais - Optional parameters
$correios = new \Correios\Correios(
    username: 'user',
    password: 'password',
    postcard: 'postcard',
    isTestMode: true,
    token: 'string'
);

// Use um número de requisição e ID do lot personalizado - Use a custom request number and Lot ID
$correios->setRequestNumber(requestNumber: '20230831');
$correios->setLotId(requestNumber: '20230831LT');
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
    postcard: '45655684865',
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
    postcard: 'postcard',
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
    postcard: 'postcard',
    isTestMode: true
    token: 'eyJhbGciOiJSUzUxMiJ9.eyJhbWJpZW50ZSI6IlBST0RVQ0FPIiwiaWQiOiI0MDExMjE1NDAwMDE5MCIsInBmbCI6IlBKIiwiY25waiI6IjQwMTEyMTU0MDAwMTkwIiwiY29udHJhdG8iOnsibnVtZXJvIjoiOTkxMjYxNjgzOSIsImRyIjoyMCwiYXBpIjpbMjcsMzQsMzUsNDEsNzYsODcsNTY2XX0sImlwIjoiMTcwLjc4LjY4Ljg2LDE3MC43OC42OC44NiIsImlhdCI6MTY5MjY0MTU2MywiaXNzIjoidG9rZW4tc2VydmljZSIsImV4cCI6MTY5MjcyNzk2MywianRpIjoiZGViMTczM2EtYmVjYS00NmIyLWFkNGYtYWQ5ZjBkYWFlZjhlIn0.uxJCCQFj0c1qzI4BGk9JWTh6TT_Drp7YaMbKQoT9m-ie5wXRun4cOuQdbj28MQR3IYuntB2B9C8aqSoa_eXADtvf4J2H-ZTWS0wAnxsxxkNf1lXmHYrD2jCgRMVgQ_2dy40uBt0bJyk0M9e4jNg2almtZMlAwjbVrgSbopuNrqhHe49GuDIuQzJLqsNC60mA6KberD9eSSNZsvHbgNYQysK0mZTkIFdWy8DBJ7b5FrbLzbeikqKbRW9pDj_3Q-YrxhwQ79ZjEF8dLiAU3BcCDHwOxpSv6HKD5984mz1VppFXcaBAsqW6oB9iCHrENjVqtRXa8mx0nqbjelyz0Of6qA'
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

