<?php

namespace Correios\Includes;

class Settings
{
    public static function getServiceCodes(): array
    {
        return [
            '04162' => 'Código 01',
            '04596' => 'Código 02'
        ];
    }

    public static function getEnvironmentUrl(bool $isTestMode = false): string
    {
        return $isTestMode ? 'https://apihom.correios.com.br' : 'https://api.correios.com.br';
    }
}
