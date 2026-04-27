<?php

namespace App\Core;

use PDO;

/**
 * Fournit une connexion PDO partagée à l'ensemble de l'application.
 */
class Database
{
    private static ?PDO $pdo = null;

    /**
     * Retourne l'instance PDO unique du processus courant.
     */
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
