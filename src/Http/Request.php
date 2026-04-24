<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Http;

final class Request
{
    public function __construct(
        private string $method,
        private string $path,
        private array $query = [],
        private array $request = [],
        private array $server = []
    ) {
    }

    public static function fromGlobals(string $basePath = ''): self
{
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = (string) parse_url($uri, PHP_URL_PATH);

    if ($basePath !== '' && str_starts_with($path, $basePath)) {
        $path = substr($path, strlen($basePath)) ?: '/';
    }

    return new self(
        strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET'),
        $path,
        $_GET,
        $_POST,
        $_SERVER
    );
}

    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function query(string $key, mixed $default = null): mixed
    {
        return $this->query[$key] ?? $default;
    }

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->request[$key] ?? $default;
    }

    public function all(): array
    {
        return $this->request;
    }

    public function server(string $key, mixed $default = null): mixed
    {
        return $this->server[$key] ?? $default;
    }
}
