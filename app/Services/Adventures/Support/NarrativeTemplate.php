<?php

namespace App\Services\Adventures\Support;

/**
 * Rend quelques jetons narratifs dépendants de l'état sans sortir le texte du Markdown.
 */
class NarrativeTemplate
{
    /**
     * @param array<string, mixed> $content
     * @param array<string, mixed> $state
     * @return array<string, mixed>
     */
    public static function renderContent(array $content, array $state): array
    {
        return self::renderValue($content, $state);
    }

    /**
     * @param mixed $value
     * @param array<string, mixed> $state
     * @return mixed
     */
    private static function renderValue(mixed $value, array $state): mixed
    {
        if (is_string($value)) {
            return self::renderString($value, $state);
        }

        if (!is_array($value)) {
            return $value;
        }

        foreach ($value as $key => $item) {
            $value[$key] = self::renderValue($item, $state);
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $state
     */
    private static function renderString(string $text, array $state): string
    {
        return preg_replace_callback(
            '/{{\s*([^{}]+?)\s*}}/u',
            static fn (array $matches): string => self::resolveToken(trim($matches[1]), $state),
            $text
        ) ?? $text;
    }

    /**
     * @param array<string, mixed> $state
     */
    private static function resolveToken(string $token, array $state): string
    {
        $feminine = (bool)($state['feminin'] ?? false);

        if (str_starts_with($token, 'accord:')) {
            return self::chooseGenderedValue(substr($token, 7), $feminine);
        }

        if (preg_match('/^fem:(.*?)\|masc:(.*)$/us', $token, $matches) === 1) {
            return $feminine ? $matches[1] : $matches[2];
        }

        if (preg_match('/^masc:(.*?)\|fem:(.*)$/us', $token, $matches) === 1) {
            return $feminine ? $matches[2] : $matches[1];
        }

        return match ($token) {
            'rank' => $feminine ? 'commandante' : 'commandant',
            'Rank' => $feminine ? 'Commandante' : 'Commandant',
            'pjprenom' => self::escape((string)($state['pjprenom'] ?? '')),
            'pjnom' => self::escape((string)($state['pjnom'] ?? '')),
            'PJNom' => self::escape(self::upper((string)($state['pjnom'] ?? ''))),
            'pjfullname' => self::displayName($state),
            default => '{{' . $token . '}}',
        };
    }

    private static function chooseGenderedValue(string $value, bool $feminine): string
    {
        $parts = explode('|', $value, 2);
        if (count($parts) !== 2) {
            return '{{accord:' . $value . '}}';
        }

        return $feminine ? $parts[1] : $parts[0];
    }

    /**
     * @param array<string, mixed> $state
     */
    private static function displayName(array $state): string
    {
        $firstName = trim((string)($state['pjprenom'] ?? ''));
        $lastName = trim(self::upper((string)($state['pjnom'] ?? '')));

        return self::escape(trim($firstName . ' ' . $lastName));
    }

    private static function upper(string $value): string
    {
        return function_exists('mb_strtoupper') ? mb_strtoupper($value, 'UTF-8') : strtoupper($value);
    }

    private static function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
