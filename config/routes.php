<?php
/** @var Router $router */

use App\Controllers\AdventurePageController;
use App\Controllers\AuthController;
use App\Controllers\MainController;
use App\Controllers\MemberController;
use App\Core\Router;
use App\Core\Middleware\AuthMiddleware;
use App\Core\Middleware\GuestMiddleware;

$router->get(['/', '/index'], [MainController::class, 'index']);
$router->get('/login', [AuthController::class, 'showLogin'], [GuestMiddleware::class]);
$router->post('/login', [AuthController::class, 'login'], [GuestMiddleware::class]);
$router->get('/register', [AuthController::class, 'showRegister'], [GuestMiddleware::class]);
$router->post('/register', [AuthController::class, 'register'], [GuestMiddleware::class]);
$router->post('/logout', [AuthController::class, 'logout'], [AuthMiddleware::class]);
$router->get('/membres', [MemberController::class, 'search']);
$router->get('/mon-compte', [MemberController::class, 'showCurrent'], [AuthMiddleware::class]);
$router->get('/profil/edit', [MemberController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/profil/edit', [MemberController::class, 'update'], [AuthMiddleware::class]);
$router->get('/membres/{id}', [MemberController::class, 'show']);
$router->post('/membres/{id}/amis', [MemberController::class, 'addFriend'], [AuthMiddleware::class]);
$router->get('/aventures/{slug}', [AdventurePageController::class, 'show']);
$router->post('/aventures/{slug}', [AdventurePageController::class, 'update']);
$router->get('/aventures/{slug}/sauvegarde', [AdventurePageController::class, 'showSave']);
$router->post('/aventures/{slug}/sauvegarde', [AdventurePageController::class, 'submitSave']);
$router->get('/aventures/{slug}/chargement', [AdventurePageController::class, 'showLoad']);
$router->post('/aventures/{slug}/chargement', [AdventurePageController::class, 'submitLoad']);
$router->get('/aventures/{slug}/manoir/*', [AdventurePageController::class, 'showPath']);
$router->post('/aventures/{slug}/manoir/*', [AdventurePageController::class, 'updatePath']);
$router->get('/aventures/{slug}/107parkavenue/*', [AdventurePageController::class, 'showPath']);
$router->post('/aventures/{slug}/107parkavenue/*', [AdventurePageController::class, 'updatePath']);
$router->get('/aventures/{slug}/{scene}', [AdventurePageController::class, 'show']);
$router->post('/aventures/{slug}/{scene}', [AdventurePageController::class, 'update']);
