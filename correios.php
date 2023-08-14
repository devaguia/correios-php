<?php


$correios = new \Correios\Correios(username:'user', password:'password', contract:'contract', isTestMode:true);

//rastro
$correios->tracking()->get(codRastreio: 'AASD546115A');
$correios->tracking()->getResponseBody();
$correios->tracking()->getResponseCode();
$correios->tracking()->getErrors();

//preço
$correios->price()->get(
    serviceCodes:['04162'],
    cepInicial:'71930000',
    cepFinal:'05336010'
);
$correios->price()->getResponseBody();
$correios->price()->getResponseCode();
$correios->price()->getErrors();

//prazo
$correios->date()->get(
    serviceCodes:['04162'],
    products:[300],
    cepInicial:'71930000',
    cepFinal:'05336010'
);
$correios->date()->getResponseBody();
$correios->date()->getResponseCode();
$correios->date()->getErrors();

//cep
$correios->address()->get(cep: '35024190');
$correios->address()->getResponseBody();
$correios->address()->getResponseCode();
$correios->address()->getErrors();
