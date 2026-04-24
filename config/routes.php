<?php
/** @var Router $router */

use App\Controllers\MainController;
use App\Core\Router;

$router->get(['/', '/index'], [MainController::class, 'index']);
