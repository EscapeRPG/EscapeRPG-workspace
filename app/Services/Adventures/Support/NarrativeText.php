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

    public static function raw(string $path): string
    {
        [$filePath, $section] = self::splitSection($path);
        $file = self::resolvePath($filePath);
        $contents = file_get_contents($file);

        if ($contents === false) {
            throw new RuntimeException("Unable to read narrative file: {$file}");
        }

        $contents = str_replace(["\r\n", "\r"], "\n", trim($contents, "\xEF\xBB\xBF \t\n\r\0\x0B"));

        if ($section !== null) {
            return self::extractSection($contents, $section, $filePath);
        }

        return $contents;
    }

    /**
     * @return array<int, string>
     */
    public static function paragraphList(string $path): array
    {
        $contents = self::raw($path);
        if ($contents === '') {
            return [];
        }

        $paragraphs = array_values(array_filter(
            array_map('trim', preg_split("/\n{2,}/", $contents) ?: []),
            static fn (string $paragraph): bool => $paragraph !== ''
        ));

        return array_map([self::class, 'renderInlineMarkdown'], $paragraphs);
    }

    /**
     * @return array{0: string, 1: ?string}
     */
    private static function splitSection(string $path): array
    {
        $parts = explode('#', $path, 2);

        return [
            $parts[0],
            isset($parts[1]) && trim($parts[1]) !== '' ? trim($parts[1]) : null,
        ];
    }

    private static function extractSection(string $contents, string $section, string $path): string
    {
        $lines = explode("\n", $contents);
        $capturing = false;
        $sectionLines = [];

        foreach ($lines as $line) {
            if (preg_match('/^#{2,}\s+(.+?)\s*$/', $line, $matches) === 1) {
                $heading = trim($matches[1]);

                if ($capturing) {
                    break;
                }

                $capturing = $heading === $section;
                continue;
            }

            if ($capturing) {
                $sectionLines[] = $line;
            }
        }

        if (!$capturing && $sectionLines === []) {
            throw new RuntimeException("Missing narrative section: content/adventures/{$path}.md#{$section}");
        }

        return trim(implode("\n", $sectionLines));
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

    private static function renderInlineMarkdown(string $text): string
    {
        return preg_replace_callback(
            '/\[([^\]]+)]\(([^)\s]+)\)/',
            static function (array $matches): string {
                $label = htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8');
                $href = htmlspecialchars($matches[2], ENT_QUOTES, 'UTF-8');
                $external = preg_match('/^https?:\/\//i', $matches[2]) === 1;
                $target = $external ? ' target="_blank" rel="noreferrer"' : '';

                return '<a href="' . $href . '"' . $target . '>' . $label . '</a>';
            },
            $text
        ) ?? $text;
    }
}
