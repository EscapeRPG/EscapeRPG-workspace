<?php

namespace App\Core\Middleware;

use App\Services\AuthService;

class AdminMiddleware
{
    public static function handle(): void
    {
        if (!AuthService::isAdmin()) {
            header('Location: /login');
            exit;
        }
    }
}
