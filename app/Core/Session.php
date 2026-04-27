<?php

namespace App\Core;

/**
 * Façade légère autour de la session PHP.
 *
 * Elle centralise les accès simples et le mécanisme de flash messages.
 */
class Session
{
    /**
     * Retourne une valeur de session.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Écrit une valeur dans la session.
     */
    public function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Vérifie si une clé existe en session.
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * Supprime une clé de la session.
     */
    public function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Retourne l'ensemble du contenu de session.
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $_SESSION;
    }

    /**
     * Retourne une valeur puis la retire immédiatement de la session.
     */
    public function pull(string $key, mixed $default = null): mixed
    {
        $value = $this->get($key, $default);
        $this->forget($key);

        return $value;
    }

    /**
     * Régénère l'identifiant de session.
     */
    public function regenerate(): void
    {
        session_regenerate_id(true);
    }

    /**
     * Vide et invalide la session courante.
     */
    public function invalidate(): void
    {
        $_SESSION = [];

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    /**
     * Enregistre un message flash consommable à la prochaine lecture.
     */
    public function flash(string $key, mixed $value): void
    {
        $flash = $this->get('_flash', []);
        $flash[$key] = $value;
        $this->put('_flash', $flash);
    }

    /**
     * Lit un message flash et le supprime de la session.
     */
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
