<?php

namespace App\Core;

class View
{
    private static array $blocks = [];
    private static string $currentBlock;

    public static function start(string $name): void
    {
        self::$currentBlock = $name;
        ob_start();
    }

    public static function end(): void
    {
        self::$blocks[self::$currentBlock] = ob_get_clean();
    }

    public static function get(string $name): string
    {
        return self::$blocks[$name] ?? '';
    }
}
