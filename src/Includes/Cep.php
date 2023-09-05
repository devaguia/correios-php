<?php

namespace Correios\Includes;

use Correios\Exceptions\InvalidCepException;

class Cep
{
    public function cleanUp(string $cep): string
    {
        return preg_replace("/[^0-9.]/", '', $cep);
    }

    public function validate(string $cep): string
    {
        $clean = $this->cleanUp($cep);

        if (!preg_match("/^\d{8}$/", $clean)) {
            throw new InvalidCepException($cep);
        }

        return $clean;
    }
}
