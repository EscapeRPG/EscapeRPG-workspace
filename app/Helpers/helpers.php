<?php

function asset(string $path): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

function url(string $path): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string
{
    if (empty($_SESSION['_csrf_token'])) {
        $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['_csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(?string $token): bool
{
    $sessionToken = $_SESSION['_csrf_token'] ?? null;

    return is_string($token) && is_string($sessionToken) && hash_equals($sessionToken, $token);
}

function auth_check(): bool
{
    return \App\Services\AuthService::check();
}

function auth_user(): ?array
{
    return \App\Services\AuthService::user();
}

function auth_id(): ?string
{
    return \App\Services\AuthService::id();
}

function flash(string $key, mixed $default = null): mixed
{
    return (new \App\Core\Session())->getFlash($key, $default);
}

function parseText(string $text): string
{
    // Gras
    $text = preg_replace('/\[b\](.*?)\[\/b\]/is', '<strong>$1</strong>', $text);

    // Italique
    $text = preg_replace('/\[i\](.*?)\[\/i\]/is', '<em>$1</em>', $text);

    // Souligne
    $text = preg_replace('/\[u\](.*?)\[\/u\]/is', '<u>$1</u>', $text);

    // Couleur : [color=#RRGGBB]...[/color]
    $text = preg_replace('/\[color=(#[0-9A-Fa-f]{6})\](.*?)\[\/color\]/is', '<span style="color:$1">$2</span>', $text);

    // Retour a la ligne
    $text = nl2br($text);

    return $text;
}

/**
 * Build breadcrumbs for the current page.
 *
 * Return format:
 * [
 *   ['label' => 'Accueil', 'url' => '...'],           // clickable
 *   ['label' => 'Aventures', 'url' => '...'],         // clickable
 *   ['label' => 'Jeux en extérieur', 'url' => null],  // current page
 * ]
 */
function breadcrumbs_for(string $path, array $context = []): array
{
    $path = '/' . ltrim($path, '/');
    $path = rtrim($path, '/');
    if ($path === '') {
        $path = '/';
    }

    $crumbs = [
        ['label' => 'Accueil', 'url' => url('/')],
    ];

    if ($path === '/') {
        return $crumbs;
    }

    // /aventures/{slug}
    if (preg_match('#^/aventures/[^/]+$#', $path) === 1) {
        $crumbs[] = ['label' => 'Aventures', 'url' => url('/aventures')];

        $jeu = $context['jeu'] ?? null;
        // App\Models\Jeu uses __get (no public properties), so read directly.
        if (is_object($jeu) && $jeu->type === 'piste') {
            $crumbs[] = ['label' => 'Jeux en extérieur', 'url' => url('/jeux-de-piste')];
        }

        $label = null;
        if (is_object($jeu) && is_string($jeu->name) && $jeu->name !== '') {
            $label = $jeu->name;
        } elseif (!empty($context['title']) && is_string($context['title'])) {
            $label = $context['title'];
        } else {
            $label = 'Détail';
        }

        $crumbs[] = ['label' => $label, 'url' => null];
        return $crumbs;
    }

    $static = [
        '/aventures' => [
            ['label' => 'Aventures', 'url' => null],
        ],
        '/jeux-de-piste' => [
            ['label' => 'Aventures', 'url' => url('/aventures')],
            ['label' => 'Jeux en extérieur', 'url' => null],
        ],
        '/reserver' => [
            ['label' => 'Réserver', 'url' => null],
        ],
        '/mentions-legales' => [
            ['label' => 'Mentions légales', 'url' => null],
        ],
        // Pages actuellement "en construction" (mais on veut quand même un fil d'Ariane).
        '/clef-en-main' => [
            ['label' => 'Jeux clef en main', 'url' => null],
        ],
        '/jeu-plateau' => [
            ['label' => 'Jeux clef en main', 'url' => url('/clef-en-main')],
            ['label' => 'Jeu de plateau', 'url' => null],
        ],
        '/escape-game-a-domicile' => [
            ['label' => 'Jeux clef en main', 'url' => url('/clef-en-main')],
            ['label' => 'Escape game à domicile', 'url' => null],
        ],
        '/murder-party' => [
            ['label' => 'Jeux clef en main', 'url' => url('/clef-en-main')],
            ['label' => 'Murder party', 'url' => null],
        ],
        '/teambuilding' => [
            ['label' => 'Évènements & entreprises', 'url' => null],
        ],
        '/horaires' => [
            ['label' => 'Horaires & tarifs', 'url' => null],
        ],
        '/contact' => [
            ['label' => 'Contact & FAQ', 'url' => null],
        ],
        // Back-office
        '/dashboard' => [
            ['label' => 'Dashboard', 'url' => null],
        ],
        '/admin' => [
            ['label' => 'Administration', 'url' => null],
        ],
    ];

    if (isset($static[$path])) {
        return array_merge($crumbs, $static[$path]);
    }

    if (str_starts_with($path, '/admin/')) {
        $crumbs[] = ['label' => 'Administration', 'url' => url('/admin')];
        $crumbs[] = ['label' => trim(substr($path, strlen('/admin/'))) ?: 'Section', 'url' => null];
        return $crumbs;
    }

    // Fallback: use the path as the last crumb.
    $crumbs[] = ['label' => trim($path, '/') ?: 'Page', 'url' => null];
    return $crumbs;
}
