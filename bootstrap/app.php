<?php

declare(strict_types=1);

use EscapeRPG\Framework\Application;
use EscapeRPG\Framework\Controller\HomeController;
use EscapeRPG\Framework\Http\Router;
use EscapeRPG\Framework\Infrastructure\Session\SessionGameStateRepository;
use EscapeRPG\Framework\Infrastructure\View\PhpViewRenderer;

$root = dirname(__DIR__);

session_start();

$config = require $root . '/config/app.php';
$routes = require $root . '/config/routes.php';

$view = new PhpViewRenderer($root . '/templates');
$gameStateRepository = new SessionGameStateRepository();
$homeController = new HomeController($view, $gameStateRepository, $config);

$router = new Router();

foreach ($routes as $route) {
    $router->add(
        $route['method'],
        $route['path'],
        [$homeController, $route['action']]
    );
}

return new Application($router, $config);
