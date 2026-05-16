<?php

namespace App\Services\Adventures\Support;

use App\Services\Adventures\Engine\AdventureState;

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

    /**
     * @param array<int, mixed> $current
     * @param array<int, mixed> $added
     * @return array<int, string>
     */
    protected function mergeStringList(array $current, array $added): array
    {
        return array_values(array_unique(array_filter(
            array_merge($current, $added),
            static fn (mixed $item): bool => is_string($item) && $item !== '',
        )));
    }

    /**
     * @param array<int, mixed> $items
     * @param array<int, mixed> $removed
     * @return array<int, string>
     */
    protected function removeStringList(array $items, array $removed): array
    {
        return array_values(array_filter(
            $items,
            static fn (mixed $item): bool => is_string($item) && $item !== '' && !in_array($item, $removed, true),
        ));
    }

    /**
     * @param array<int, string> $notes
     * @return array<int, string>
     */
    protected function mergeNotes(AdventureState $state, array $notes): array
    {
        return $this->mergeStringList((array) $state->get('notes', []), $notes);
    }

    /**
     * @param array<int, string> $items
     * @return array<int, string>
     */
    protected function mergeInventory(AdventureState $state, array $items): array
    {
        return $this->mergeStringList((array) $state->get('inventory', []), $items);
    }

    /**
     * @param array<int, string> $items
     * @return array<int, string>
     */
    protected function removeInventory(AdventureState $state, array $items): array
    {
        return $this->removeStringList((array) $state->get('inventory', []), $items);
    }
}
