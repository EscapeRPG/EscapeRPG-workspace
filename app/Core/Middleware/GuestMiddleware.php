<?php

namespace App\Core\Middleware;

use App\Services\AuthService;

class GuestMiddleware
{
    public static function handle(): void
    {
        if (AuthService::check()) {
            header('Location: /mon-compte');
            exit;
        }
    }
}
