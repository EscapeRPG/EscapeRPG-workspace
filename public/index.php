<?php
$sessionConfig = require __DIR__ . '/../config/session.php';
$sessionLifetime = (int) ($sessionConfig['lifetime'] ?? 0);

if ($sessionLifetime > 0) {
    ini_set('session.gc_maxlifetime', (string) $sessionLifetime);
    session_set_cookie_params([
        'lifetime' => $sessionLifetime,
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
    ]);
}

if (!empty($sessionConfig['save_path']) && is_string($sessionConfig['save_path'])) {
    ini_set('session.save_path', $sessionConfig['save_path']);
}

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Services\Account\AuthService;

define('BASE_PATH', dirname(__DIR__));

$router = new Router();
require_once __DIR__ . '/../app/Helpers/helpers.php';
const BASE_URL = '';
AuthService::bootstrap();
require_once __DIR__ . '/../config/routes.php';

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
