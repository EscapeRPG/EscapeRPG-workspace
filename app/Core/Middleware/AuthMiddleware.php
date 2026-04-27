<?php

namespace App\Core\Middleware;

use App\Services\Account\AuthService;

/**
 * Restreint l'accès aux utilisateurs authentifiés.
 */
class AuthMiddleware
{
    /**
     * Redirige vers la connexion si aucun membre n'est connecté.
     */
    public static function handle(): void
    {
        if (!AuthService::check()) {
            header('Location: /login');
            exit;
        }
    }
}
