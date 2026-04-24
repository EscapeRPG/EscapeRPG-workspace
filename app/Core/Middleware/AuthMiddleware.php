<?php

namespace App\Core\Middleware;

use App\Services\AuthService;

class AuthMiddleware
{
    public static function handle(): void
    {
        if (!AuthService::check()) {
            header('Location: /login');
            exit;
        }
    }
}
