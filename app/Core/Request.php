<?php

namespace App\Core;

/**
 * Représente la requête HTTP courante.
 *
 * Cette classe encapsule les tableaux globaux PHP pour fournir
 * une API de lecture cohérente au reste de l'application.
 */
class Request
{
    private static ?self $instance = null;

    /**
     * @param array<string, mixed> $get
     * @param array<string, mixed> $post
     * @param array<string, mixed> $server
     * @param array<string, mixed> $files
     * @param array<string, mixed> $cookie
     */
    public function __construct(
        private readonly array $get,
        private readonly array $post,
        private readonly array $server,
        private readonly array $files,
        private readonly array $cookie,
    ) {
    }

    /**
     * Capture une instance réutilisable de la requête courante.
     */
    public static function capture(): self
    {
        if (self::$instance === null) {
            self::$instance = new self($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
        }

        return self::$instance;
    }

    /**
     * Retourne la méthode HTTP normalisée en majuscules.
     */
    public function method(): string
    {
        return strtoupper($this->server['REQUEST_METHOD'] ?? 'GET');
    }

    /**
     * Indique si la requête utilise la méthode HTTP attendue.
     */
    public function isMethod(string $method): bool
    {
        return $this->method() === strtoupper($method);
    }

    /**
     * Retourne l'URI brute telle que reçue par PHP.
     */
    public function uri(): string
    {
        return $this->server['REQUEST_URI'] ?? '/';
    }

    /**
     * Retourne uniquement le chemin de l'URI, sans query string.
     */
    public function path(): string
    {
        return '/' . trim(rawurldecode(parse_url($this->uri(), PHP_URL_PATH) ?? '/'), '/');
    }

    /**
     * Lit une valeur dans la query string.
     */
    public function query(string $key, mixed $default = null): mixed
    {
        return $this->get[$key] ?? $default;
    }

    /**
     * Lit une valeur en privilégiant le POST puis le GET.
     */
    public function input(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    /**
     * Lit une valeur dans le corps POST.
     */
    public function post(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $default;
    }

    /**
     * Vérifie si une clé existe dans le POST ou le GET.
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->post) || array_key_exists($key, $this->get);
    }

    /**
     * Retourne l'ensemble des entrées GET et POST fusionnées.
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return array_merge($this->get, $this->post);
    }

    /**
     * Extrait un sous-ensemble de clés de la requête.
     *
     * @param string[] $keys
     * @return array<string, mixed>
     */
    public function only(array $keys): array
    {
        $values = [];

        foreach ($keys as $key) {
            if ($this->has($key)) {
                $values[$key] = $this->input($key);
            }
        }

        return $values;
    }

    /**
     * Retourne une entrée du tableau des fichiers uploadés.
     */
    public function file(string $key): mixed
    {
        return $this->files[$key] ?? null;
    }

    /**
     * Lit une valeur de cookie.
     */
    public function cookie(string $key, mixed $default = null): mixed
    {
        return $this->cookie[$key] ?? $default;
    }
}
