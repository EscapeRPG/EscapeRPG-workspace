<?php

namespace App\Services\Adventures\Support;

/**
 * Helpers declaratifs pour rendre les fichiers app/Content plus lisibles.
 */
class Content
{
    /**
     * @return array{type: string, text: string}
     */
    public static function paragraph(string $text): array
    {
        return [
            'type' => 'paragraph',
            'text' => $text,
        ];
    }

    /**
     * @param array<int, string> $paragraphs
     * @return array{type: string, paragraphs: array<int, string>}
     */
    public static function paragraphs(array $paragraphs): array
    {
        return [
            'type' => 'paragraphs',
            'paragraphs' => $paragraphs,
        ];
    }

    /**
     * @return array{type: string, paragraphs: array<int, string>}
     */
    public static function narrative(string $path): array
    {
        return NarrativeText::paragraphs($path);
    }

    /**
     * @return array<string, mixed>
     */
    public static function image(string $src, string $alt, string $class = 'enigme', array $extra = []): array
    {
        return $extra + [
            'type' => 'image',
            'src' => $src,
            'alt' => $alt,
            'class' => $class,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public static function linkedImage(string $src, string $alt, string $class = 'enigme', array $extra = []): array
    {
        return $extra + [
            'type' => 'linked_image',
            'src' => $src,
            'alt' => $alt,
            'class' => $class,
        ];
    }

    /**
     * @param array<int, array<string, mixed>> $hotspots
     * @return array<string, mixed>
     */
    public static function interactiveImage(
        string $src,
        string $alt,
        array $hotspots = [],
        string $class = 'enigmelieu',
        array $extra = []
    ): array {
        return $extra + [
            'type' => 'interactive_image',
            'src' => $src,
            'alt' => $alt,
            'class' => $class,
            'hotspots' => $hotspots,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public static function hotspot(
        string $class,
        string $value,
        ?string $src = null,
        string $alt = '',
        array $extra = []
    ): array {
        $hotspot = $extra + [
            'class' => $class,
            'value' => $value,
        ];

        if ($src !== null) {
            $hotspot['src'] = $src;
        }

        if ($alt !== '') {
            $hotspot['alt'] = $alt;
        }

        return $hotspot;
    }

    /**
     * @return array<string, mixed>
     */
    public static function action(string $label, string $value, string $class = 'action', string $name = 'action', array $extra = []): array
    {
        return $extra + [
            'label' => $label,
            'name' => $name,
            'value' => $value,
            'class' => $class,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public static function ask(string $label, string $name, string $value, array $extra = []): array
    {
        return self::action($label, $value, 'ask', $name, $extra);
    }

    /**
     * @return array{type: string}
     */
    public static function comments(): array
    {
        return ['type' => 'comments'];
    }

    /**
     * @return array<string, mixed>
     */
    public static function stateEquals(string $state, mixed $value): array
    {
        return ['state' => $state, 'equals' => $value];
    }

    /**
     * @return array<string, mixed>
     */
    public static function stateNotEquals(string $state, mixed $value): array
    {
        return ['state' => $state, 'not_equals' => $value];
    }

    /**
     * @return array<string, mixed>
     */
    public static function stateTruthy(string $state): array
    {
        return ['state' => $state, 'truthy' => true];
    }

    /**
     * @return array<string, mixed>
     */
    public static function stateFalsy(string $state): array
    {
        return ['state' => $state, 'falsy' => true];
    }

    /**
     * @return array<string, mixed>
     */
    public static function inventoryHas(string $item): array
    {
        return ['inventory' => $item, 'contains' => true];
    }

    /**
     * @return array<string, mixed>
     */
    public static function inventoryMissing(string $item): array
    {
        return ['inventory' => $item, 'contains' => false];
    }
}
