<?php

namespace App\Core;

class Config
{
    private static array $items = [];

    public static function get(string $key, mixed $default = null): mixed
    {
        [$file, $nestedKey] = array_pad(explode('.', $key, 2), 2, null);

        if (!array_key_exists($file, self::$items)) {
            $path = BASE_PATH . '/config/' . $file . '.php';
            self::$items[$file] = file_exists($path) ? require $path : [];
        }

        $value = self::$items[$file];

        if ($nestedKey === null || $nestedKey === '') {
            return $value;
        }

        foreach (explode('.', $nestedKey) as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }

            $value = $value[$segment];
        }

        return $value;
    }
}
