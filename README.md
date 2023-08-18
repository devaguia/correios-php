# Correios PHP
Correios API library for PHP

## Basic Usage

```PHP

$correios = new \Correios\Correios(
    username:'user',
    password:'password',
    contract:'contract',
    isTestMode:true
);

//tracking
$correios->tracking()->get(trackingCode: 'AASD546115A');
$correios->tracking()->getResponseBody();
$correios->tracking()->getResponseCode();
$correios->tracking()->getErrors();

//price
$correios->price()->get(
    serviceCodes:['04162'],
    products:[300],
    originCep:'71930000',
    destinyCep:'05336010'
);
$correios->price()->getResponseBody();
$correios->price()->getResponseCode();
$correios->price()->getErrors();

//date
$correios->date()->get(
    serviceCodes:['04162'],
    originCep:'71930000',
    destinyCep:'05336010'
);
$correios->date()->getResponseBody();
$correios->date()->getResponseCode();
$correios->date()->getErrors();

//cep
$correios->address()->get(cep: '35024190');
$correios->address()->getResponseBody();
$correios->address()->getResponseCode();
$correios->address()->getErrors();


```
