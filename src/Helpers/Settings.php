<?php

use Correios\Includes\Settings;

if (!function_exists('settings')) {
    function settings(): Settings
    {
        return new Settings();
    }
}