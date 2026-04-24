<?php

namespace App\Core;

class Request
{
    private static ?self $instance = null;

    public function __construct(
        private readonly array $get,
        private readonly array $post,
        private readonly array $server,
        private readonly array $files,
        private readonly array $cookie,
    ) {
    }

    public static function capture(): self
    {
        if (self::$instance === null) {
            self::$instance = new self($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
        }

        return self::$instance;
    }

    public function method(): string
    {
        return strtoupper($this->server['REQUEST_METHOD'] ?? 'GET');
    }

    public function isMethod(string $method): bool
    {
        return $this->method() === strtoupper($method);
    }

    public function uri(): string
    {
        return $this->server['REQUEST_URI'] ?? '/';
    }

    public function path(): string
    {
        return '/' . trim(rawurldecode(parse_url($this->uri(), PHP_URL_PATH) ?? '/'), '/');
    }

    public function query(string $key, mixed $default = null): mixed
    {
        return $this->get[$key] ?? $default;
    }

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function post(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->post) || array_key_exists($key, $this->get);
    }

    public function all(): array
    {
        return array_merge($this->get, $this->post);
    }

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

    public function file(string $key): mixed
    {
        return $this->files[$key] ?? null;
    }

    public function cookie(string $key, mixed $default = null): mixed
    {
        return $this->cookie[$key] ?? $default;
    }
}
