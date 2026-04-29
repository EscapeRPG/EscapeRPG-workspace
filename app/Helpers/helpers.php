<?php

/**
 * Construit une URL absolue vers une ressource statique publique.
 */
function asset(string $path): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

/**
 * Construit une URL absolue vers une route applicative.
 */
function url(string $path): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

/**
 * Échappe une chaîne pour un affichage sûr dans du HTML.
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/**
 * Retourne le jeton CSRF de la session courante, en le créant si besoin.
 */
function csrf_token(): string
{
    if (empty($_SESSION['_csrf_token'])) {
        $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['_csrf_token'];
}

/**
 * Génère le champ caché à injecter dans un formulaire protégé par CSRF.
 */
function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(csrf_token()) . '">';
}

/**
 * Vérifie qu'un jeton CSRF soumis correspond à celui de la session.
 */
function verify_csrf(?string $token): bool
{
    $sessionToken = $_SESSION['_csrf_token'] ?? null;

    return is_string($token) && is_string($sessionToken) && hash_equals($sessionToken, $token);
}

/**
 * Indique si un membre est actuellement connecté.
 */
function auth_check(): bool
{
    return \App\Services\Account\AuthService::check();
}

/**
 * Retourne les données du membre connecté.
 */
function auth_user(): ?array
{
    return \App\Services\Account\AuthService::user();
}

/**
 * Retourne l'identifiant logique du membre connecté.
 */
function auth_id(): ?string
{
    return \App\Services\Account\AuthService::pseudo();
}

/**
 * Lit un message flash et le retire de la session.
 */
function flash(string $key, mixed $default = null): mixed
{
    return (new \App\Core\Session())->getFlash($key, $default);
}
