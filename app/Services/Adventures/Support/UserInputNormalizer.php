<?php

namespace App\Services\Adventures\Support;

trait UserInputNormalizer
{
    protected function normalizeInput(string $value): string
    {
        $value = function_exists('mb_strtolower')
            ? mb_strtolower(trim($value), 'UTF-8')
            : strtolower(trim($value));
        $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value) ?: $value;

        return preg_replace('/[^a-z0-9]/', '', $value) ?? '';
    }

    /**
     * @param array<int, string> $allowed
     */
    protected function resolveInput(string $value, array $allowed, string $fallback = 'unknown'): string
    {
        $normalized = $this->normalizeInput($value);

        return in_array($normalized, $allowed, true) ? $normalized : $fallback;
    }

    protected function inputMatches(string $value, string $expected): bool
    {
        return $this->normalizeInput($value) === $this->normalizeInput($expected);
    }
}
