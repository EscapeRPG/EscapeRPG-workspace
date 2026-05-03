<?php

namespace App\Services\Adventures\Support;

/**
 * Charge les fichiers de contenu déclaratif des aventures.
 */
class AdventureContent
{
    /**
     * Retourne le contenu brut d'une scène.
     *
     * @return array<string, mixed>
     */
    public function scene(array $config, string $scene): array
    {
        $path = $this->contentPath($config, $scene);

        if ($path === null || !is_file($path)) {
            return [];
        }

        $content = require $path;

        return is_array($content) ? $content : [];
    }

    /**
     * Retourne une variante de contenu pour une scène donnée.
     *
     * @return array<string, mixed>
     */
    public function variant(array $config, string $scene, string $variant = 'default'): array
    {
        $content = $this->scene($config, $scene);
        $variants = $content['variants'] ?? [];
        $resolved = $variants[$variant] ?? $variants['default'] ?? [];

        return is_array($resolved) ? $resolved : [];
    }

    /**
     * Construit le chemin absolu du fichier de contenu de la scène.
     */
    private function contentPath(array $config, string $scene): ?string
    {
        $basePath = $config['content_path'] ?? null;
        if (!is_string($basePath) || $basePath === '') {
            return null;
        }

        $contentFile = $config['content_files'][$scene] ?? $scene;
        if (!is_string($contentFile) || $contentFile === '') {
            $contentFile = $scene;
        }

        return dirname(__DIR__, 3) . '/Content/' . trim($basePath, '/') . '/' . trim($contentFile, '/') . '.php';
    }
}
