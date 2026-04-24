<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string|array $paths, array $action, array $middlewares = []): void
    {
        $this->map('GET', $paths, $action, $middlewares);
    }

    public function post(string|array $paths, array $action, array $middlewares = []): void
    {
        $this->map('POST', $paths, $action, $middlewares);
    }

    public function match(array $methods, string|array $paths, array $action, array $middlewares = []): void
    {
        foreach ($methods as $method) {
            $this->map($method, $paths, $action, $middlewares);
        }
    }

    private function map(string $method, string|array $paths, array $action, array $middlewares = []): void
    {
        foreach ((array) $paths as $path) {
            $this->routes[strtoupper($method)][$this->normalizePath($path)] = [$action, $middlewares];
        }
    }

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

    private function normalizePath(string $path): string
    {
        $normalized = '/' . trim($path, '/');

        return $normalized === '//' || $normalized === '' ? '/' : $normalized;
    }

}
