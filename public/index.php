<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Services\AuthService;

define('BASE_PATH', dirname(__DIR__));

$router = new Router();
require_once __DIR__ . '/../app/Helpers/helpers.php';
const BASE_URL = '';
AuthService::bootstrap();
require_once __DIR__ . '/../config/routes.php';

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
