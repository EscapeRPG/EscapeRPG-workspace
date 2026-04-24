<?php

$config = [
    'dsn' => 'mysql:host=localhost;dbname=escaperpg;charset=utf8mb4',
    'user' => 'root',
    'password' => '',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];

$localConfigPath = __DIR__ . '/database.local.php';

if (file_exists($localConfigPath)) {
    $localConfig = require $localConfigPath;

    if (is_array($localConfig)) {
        $config = array_replace($config, $localConfig);
    }
}

return $config;
