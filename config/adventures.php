<?php

$adventures = [];

foreach (glob(__DIR__ . '/adventures/*.php') ?: [] as $path) {
    $config = require $path;
    if (!is_array($config) || empty($config['slug']) || !is_string($config['slug'])) {
        continue;
    }

    $adventures[$config['slug']] = $config;
}

return $adventures;
