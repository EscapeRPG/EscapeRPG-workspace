<?php

namespace App\Services\Adventures\Support;

use InvalidArgumentException;

/** Adapte des scènes regroupées au format de configuration historique. */
final class SceneModules
{
    /** @return array<string, array<string, mixed>> */
    public static function discover(string $directory): array
    {
        $modules = [];
        $files = glob(rtrim($directory, '/\\') . '/*/scene.php') ?: [];
        sort($files, SORT_STRING);
        foreach ($files as $file) {
            $id = basename(dirname($file));
            if (!preg_match('/^[a-z0-9_]+$/D', $id)) {
                throw new InvalidArgumentException("Invalid scene directory: {$id}");
            }
            $module = require $file;
            if (!is_array($module) || !is_string($module['label'] ?? null)
                || !is_array($module['variants'] ?? null) || $module['variants'] === []
                || !is_array($module['flow'] ?? null)) {
                throw new InvalidArgumentException("Scene module must define label, variants and flow: {$file}");
            }
            $module['_file'] = $file;
            $modules[$id] = $module;
        }
        return $modules;
    }

    public static function apply(array $config, string $directory): array
    {
        $config['scene_modules_path'] = $directory;
        foreach (self::discover($directory) as $id => $module) {
            if (array_key_exists($id, $config['scenes'] ?? [])) {
                throw new InvalidArgumentException("Scene declared both in legacy config and module: {$id}");
            }
            $config['scenes'][$id] = ['label' => $module['label']];
            if (isset($module['view'])) {
                $config['scenes'][$id]['view'] = $module['view'];
            }
            $config['scene_module_files'][$id] = $module['_file'];
            $config['scene_definitions'][$id] = $module['flow'];
            if (isset($module['handler'])) {
                if (!is_string($module['handler']) || !is_a($module['handler'], \App\Services\Adventures\Engine\AdventureSceneHandler::class, true)) {
                    throw new InvalidArgumentException("Invalid scene handler: {$id}");
                }
                $config['scene_definitions'][$id]['handler'] = $module['handler'];
            }
            $route = $module['url'] ?? $id;
            if (!is_string($route) || trim($route, '/') === '') {
                throw new InvalidArgumentException("Invalid scene URL: {$id}");
            }
            $route = trim($route, '/');
            if (in_array($route, $config['scene_urls'] ?? [], true)) {
                throw new InvalidArgumentException("Duplicate scene URL: {$route}");
            }
            $config['scene_urls'][$id] = $route;
            if ($route !== $id) {
                $config['scene_aliases'][$route] = $id;
            }
        }
        return $config;
    }

    /** Définitions consommées par le constructeur du flow GAEA-1. */
    public static function flows(string $directory, array $legacy = []): array
    {
        foreach (self::discover($directory) as $id => $module) {
            if (array_key_exists($id, $legacy)) {
                throw new InvalidArgumentException("Scene flow declared twice: {$id}");
            }
            $legacy[$id] = $module['flow'];
            if (isset($module['handler'])) {
                $legacy[$id]['handler'] = $module['handler'];
            }
        }
        return $legacy;
    }
}
