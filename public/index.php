<?php

declare(strict_types=1);

use EscapeRPG\Framework\Application;

$root = dirname(__DIR__);

require $root . '/src/Support/autoload.php';

$config = require $root . '/config/app.php';
$request = Request::fromGlobals($config['base_path'] ?? '');
$app = require $root . '/bootstrap/app.php';
$response = $app->handle($request);
$response->send();
