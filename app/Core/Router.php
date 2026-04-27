<?php

namespace App\Core;

/**
 * Routeur HTTP minimaliste de l'application.
 *
 * Il associe des chemins à un contrôleur, une méthode et une liste
 * de middlewares, puis résout la route au moment du dispatch.
 */
class Router
{
    private array $routes = [];

    /**
     * Enregistre une route GET.
     *
     * @param array{0: class-string, 1: string} $action
     * @param array<int, class-string> $middlewares
     */
    public function get(string|array $paths, array $action, array $middlewares = []): void
    {
        $this->map('GET', $paths, $action, $middlewares);
    }

    /**
     * Enregistre une route POST.
     *
     * @param array{0: class-string, 1: string} $action
     * @param array<int, class-string> $middlewares
     */
    public function post(string|array $paths, array $action, array $middlewares = []): void
    {
        $this->map('POST', $paths, $action, $middlewares);
    }

    /**
     * Enregistre une même action sur plusieurs méthodes HTTP.
     *
     * @param string[] $methods
     * @param array{0: class-string, 1: string} $action
     * @param array<int, class-string> $middlewares
     */
    public function match(array $methods, string|array $paths, array $action, array $middlewares = []): void
    {
        foreach ($methods as $method) {
            $this->map($method, $paths, $action, $middlewares);
        }
    }

    /**
     * Enregistre une route normalisée dans la table interne.
     *
     * @param array{0: class-string, 1: string} $action
     * @param array<int, class-string> $middlewares
     */
    private function map(string $method, string|array $paths, array $action, array $middlewares = []): void
    {
        foreach ((array) $paths as $path) {
            $this->routes[strtoupper($method)][$this->normalizePath($path)] = [$action, $middlewares];
        }
    }

    /**
     * Résout la requête courante et exécute l'action associée.
     */
    public function dispatch(string $uri, string $method): void
    {
        $path = $this->normalizePath(rawurldecode(parse_url($uri, PHP_URL_PATH) ?? '/'));

        foreach ($this->routes[$method] ?? [] as $route => $routeData) {
            [$action, $middlewares] = $routeData;
            $pattern = preg_quote(trim($route, '/'), '#');
            $pattern = preg_replace('#\\\\\{[a-zA-Z]+\\\\\}#', '([^/]+)', $pattern);
            $pattern = str_replace('\*', '.*', $pattern);

            if (preg_match('#^' . $pattern . '$#', trim($path, '/'), $matches)) {
                array_shift($matches);

                foreach ($middlewares as $middleware) {
                    $middleware::handle();
                }

                [$controller, $methodAction] = $action;
                if (!is_callable([new $controller, $methodAction])) {
                    http_response_code(500);
                    echo '500';
                    return;
                }

                call_user_func_array([new $controller, $methodAction], $matches);
                return;
            }
        }

        http_response_code(404);
        echo '404';
    }

    /**
     * Normalise un chemin pour unifier les enregistrements et les comparaisons.
     */
    private function normalizePath(string $path): string
    {
        $normalized = '/' . trim($path, '/');

        return $normalized === '//' || $normalized === '' ? '/' : $normalized;
    }

}
