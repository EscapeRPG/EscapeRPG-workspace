<?php

namespace App\Core;

/**
 * Gère des blocs de rendu simples à l'intérieur des layouts.
 */
class View
{
    private static array $blocks = [];
    private static array $blockStack = [];

    /**
     * Démarre la capture d'un bloc nommé.
     */
    public static function start(string $name): void
    {
        self::$blockStack[] = $name;
        ob_start();
    }

    /**
     * Termine la capture du bloc courant et stocke son contenu.
     */
    public static function end(): void
    {
        $currentBlock = array_pop(self::$blockStack);

        if ($currentBlock === null) {
            return;
        }

        self::$blocks[$currentBlock] = ob_get_clean();
    }

    /**
     * Retourne le contenu précédemment capturé pour un bloc.
     */
    public static function get(string $name): string
    {
        return self::$blocks[$name] ?? '';
    }
}
