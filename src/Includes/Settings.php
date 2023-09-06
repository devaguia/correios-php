<?php

namespace Correios\Includes;

class Settings
{
    public function getServiceCodes(): array
    {
        return [
            '80152' => 'CARTA SIMPLES SELO E SE PCTE',
            '80160' => 'CARTA SIMPLES CHANCELA PCTE',
            '04227' => 'MINI ENVIOS',
            '04391' => 'MINI ENVIOS',
            '04235' => 'MINI ENVIOS',
            '4510'  => 'PAC',
            '04596' => 'PAC',
            '04600' => 'PAC',
            '04669' => 'PAC CONTRATO',
            '03085' => 'PAC CONTRATO',
            '03298' => 'PAC CONTRATO',
            '03336' => 'PAC CONTRATO',
            '03328' => 'PAC CONTRATO GDES FORMATOS',
            '04618' => 'PAC GF',
            '04693' => 'PAC GF CONTRATO',
            '39870' => 'PAC LOG+',
            '04677' => 'PAC REVERSO',
            '04014' => 'SEDEX',
            '04553' => 'SEDEX',
            '04561' => 'SEDEX',
            '04537' => 'SEDEX GF',
            '40215' => 'SEDEX 10',
            '03158' => 'SEDEX 10',
            '40169' => 'SEDEX 12',
            '03140' => 'SEDEX 12',
            '04162' => 'SEDEX CONTRATO',
            '03050' => 'SEDEX CONTRATO',
            '03220' => 'SEDEX CONTRATO',
            '04138' => 'SEDEX GF CONTRATO',
            '03204' => 'SEDEX HOJE',
            '40290' => 'SEDEX HOJE',
            '39888' => 'SEDEX LOG+',
            '04170' => 'SEDEX REVERSO',
            '03069' => 'SEDEX CONTRATO',
            '03212' => 'SEDEX CONTRATO GDES FORMATOS',
            '03280' => 'SEDEX CONTRATO',
        ];
    }

    public function getEnvironmentUrl(bool $isTestMode = false): string
    {
        return $isTestMode ? 'https://apihom.correios.com.br' : 'https://api.correios.com.br';
    }
}
