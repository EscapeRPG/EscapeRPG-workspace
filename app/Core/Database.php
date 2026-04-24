<?php

namespace App\Core;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function get(): PDO
    {
        if (!self::$pdo) {
            $config = require __DIR__ . '/../../config/database.php';
            self::$pdo = new PDO(
                $config['dsn'],
                $config['user'],
                $config['password'],
                $config['options'] ?? [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$pdo;
    }
}
