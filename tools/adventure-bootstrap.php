<?php

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
require_once dirname(__DIR__) . '/vendor/autoload.php';
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}
if (!defined('BASE_URL')) {
    define('BASE_URL', '');
}
require_once BASE_PATH . '/app/Helpers/helpers.php';
