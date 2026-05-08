<?php

namespace App\Services\Adventures\Support;

use RuntimeException;

/**
 * Charge du texte narratif depuis le dossier racine content/adventures.
 */
class NarrativeText
{
    /**
     * @return array{type: string, paragraphs: array<int, string>}
     */
    public static function paragraphs(string $path): array
    {
        return [
            'type' => 'paragraphs',
            'paragraphs' => self::paragraphList($path),
        ];
    }

    /**
     * @return array{type: string, text: string}
     */
    public static function paragraph(string $path): array
    {
        return [
            'type' => 'paragraph',
            'text' => implode("\n\n", self::paragraphList($path)),
        ];
    }

    /**
     * @return array<int, string>
     */
    public static function paragraphList(string $path): array
    {
        $file = self::resolvePath($path);
        $contents = file_get_contents($file);

        if ($contents === false) {
            throw new RuntimeException("Unable to read narrative file: {$file}");
        }

        $contents = str_replace(["\r\n", "\r"], "\n", trim($contents));
        if ($contents === '') {
            return [];
        }

        return array_values(array_filter(
            array_map('trim', preg_split("/\n{2,}/", $contents) ?: []),
            static fn (string $paragraph): bool => $paragraph !== ''
        ));
    }

    private static function resolvePath(string $path): string
    {
        $relativePath = trim($path, '/\\');
        if (!str_ends_with($relativePath, '.md')) {
            $relativePath .= '.md';
        }

        $file = dirname(__DIR__, 4) . '/content/adventures/' . $relativePath;
        if (!is_file($file)) {
            throw new RuntimeException("Missing narrative file: content/adventures/{$relativePath}");
        }

        return $file;
    }
}
