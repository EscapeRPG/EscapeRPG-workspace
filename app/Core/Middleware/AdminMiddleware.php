<?php

namespace App\Core\Middleware;

use App\Services\Account\AuthService;

/**
 * Restreint l'accès aux utilisateurs administrateurs.
 */
class AdminMiddleware
{
    /**
     * Redirige vers la connexion si l'utilisateur n'est pas administrateur.
     */
    public static function handle(): void
    {
        if (!AuthService::isAdmin()) {
            header('Location: /login');
            exit;
        }
    }
}
