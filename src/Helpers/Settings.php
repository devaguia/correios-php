<?php

declare(strict_types=1);

use Correios\Includes\Settings;

if (!function_exists('settings')) {
    function settings(): Settings
    {
        return new Settings();
    }
}