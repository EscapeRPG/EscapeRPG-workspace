<?php

namespace App\Core\Middleware;

use App\Services\Account\AuthService;

/**
 * Restreint l'accès aux visiteurs non connectés.
 */
class GuestMiddleware
{
    /**
     * Redirige vers le compte si un membre est déjà connecté.
     */
    public static function handle(): void
    {
        if (AuthService::check()) {
            header('Location: /mon-compte');
            exit;
        }
    }
}
