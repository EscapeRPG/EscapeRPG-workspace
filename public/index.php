<?php

declare(strict_types=1);

use EscapeRPG\Framework\Application;
use EscapeRPG\Framework\Http\Request;

$root = dirname(__DIR__);

require $root . '/src/Support/autoload.php';

$app = require $root . '/bootstrap/app.php';
$request = Request::fromGlobals();
$response = $app->handle($request);
$response->send();
