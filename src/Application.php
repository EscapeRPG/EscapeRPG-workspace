<?php

declare(strict_types=1);

namespace EscapeRPG\Framework;

use EscapeRPG\Framework\Http\Request;
use EscapeRPG\Framework\Http\Response;
use EscapeRPG\Framework\Http\Router;

final class Application
{
    public function __construct(
        private Router $router,
        private array $config = []
    ) {
    }

    public function handle(Request $request): Response
    {
        return $this->router->dispatch($request);
    }

    public function config(string $key, mixed $default = null): mixed
    {
        return $this->config[$key] ?? $default;
    }
}
