<?php


$correios = new Correios(username:'user', password:'password', contract:'contract', isTestMode:true, drNumber: '');

//rastro
$correios->tracking()->get(codRastreio: 'AASD546115A');
$correios->tracking()->getResponseBody();
$correios->tracking()->getResponseCode();
$correios->tracking()->getErros();

//preço
$correios->price()->get(
    serviceCodes:['04162'],
    cepInicial:'71930000',
    cepFinal:'05336010'
);
$correios->price()->getResponseBody();
$correios->price()->getResponseCode();
$correios->price()->getErros();

//prazo
$correios->date()->get(
    serviceCodes:['04162'],
    products:[300],
    cepInicial:'71930000',
    cepFinal:'05336010'
);
$correios->date()->getResponseBody();
$correios->date()->getResponseCode();
$correios->date()->getErros();

//cep
$correios->cep()->get(cep: '35024190');
$correios->cep()->getResponseBody();
$correios->cep()->getResponseCode();
$correios->cep()->getErros();

//address
$correios->address()->get(
    cep: '35024190',
    uf: 'MG',
    localidade: 'localidade',
    bairro: 'bairro',
    siglaUnidade: '',
    tipoCEP: 2,
    clique: '',
    caixaPostal: '',
    locker: '',
    agenciaModular: '',
    cepInicial: '',
    cepFinal: '',
    numeroBairro: 0,
    numeroCaixaPostal: '',
    page: 1,
    size: 50,
    sort: ''
);
$correios->address()->getResponseBody();
$correios->address()->getResponseCode();
$correios->address()->getErros();

