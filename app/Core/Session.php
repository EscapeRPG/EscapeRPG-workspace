<?php

namespace App\Core;

class Session
{
    public function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    public function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function all(): array
    {
        return $_SESSION;
    }

    public function pull(string $key, mixed $default = null): mixed
    {
        $value = $this->get($key, $default);
        $this->forget($key);

        return $value;
    }

    public function regenerate(): void
    {
        session_regenerate_id(true);
    }

    public function invalidate(): void
    {
        $_SESSION = [];

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public function flash(string $key, mixed $value): void
    {
        $flash = $this->get('_flash', []);
        $flash[$key] = $value;
        $this->put('_flash', $flash);
    }

    public function getFlash(string $key, mixed $default = null): mixed
    {
        $flash = $this->get('_flash', []);
        $value = $flash[$key] ?? $default;

        if (array_key_exists($key, $flash)) {
            unset($flash[$key]);
            $this->put('_flash', $flash);
        }

        return $value;
    }
}
