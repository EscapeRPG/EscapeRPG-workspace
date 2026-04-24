<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string|array $paths, array $action, array $middlewares = []): void
    {
        foreach ((array) $paths as $path) {
            $this->routes['GET'][$path] = [$action, $middlewares];
        }
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = trim(rawurldecode(parse_url($uri, PHP_URL_PATH) ?? '/'), '/');

        foreach ($this->routes[$method] ?? [] as $route => $routeData) {
            [$action, $middlewares] = $routeData;
            $pattern = preg_quote(trim($route, '/'), '#');
            $pattern = preg_replace('#\\\\\{[a-zA-Z]+\\\\\}#', '([^/]+)', $pattern);
            $pattern = str_replace('\*', '.*', $pattern);

            if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
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

}
