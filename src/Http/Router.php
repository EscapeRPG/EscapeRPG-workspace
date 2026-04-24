<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Http;

use Closure;

final class Router
{
    /**
     * @var array<int, array{method:string,path:string,handler:callable}>
     */
    private array $routes = [];

    public function add(string $method, string $path, callable $handler): void
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'handler' => $handler,
        ];
    }

    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route['method'] !== $request->method()) {
                continue;
            }

            if ($route['path'] !== $request->path()) {
                continue;
            }

            $response = ($route['handler'])($request);

            if (!$response instanceof Response) {
                throw new \RuntimeException('A route handler must return a Response instance.');
            }

            return $response;
        }

        return Response::html(
            '<h1>404</h1><p>Page not found.</p>',
            404
        );
    }
}
