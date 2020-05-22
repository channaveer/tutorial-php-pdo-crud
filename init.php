<?php

if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'DEVELOPMENT');
}

$base_url = null;

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'DEVELOPMENT':
            $base_url = 'http://localhost/pdo/';
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL|E_STRICT);
            break;

        case 'PRODUCTION':
            $base_url = 'Production URL'; /* https://google.com */
            error_reporting(0);
            /* Mechanism to log errors */
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}
