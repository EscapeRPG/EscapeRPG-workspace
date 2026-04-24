<?php

namespace App\Services\Adventures;

use App\Core\Session;

class AdventureState
{
    public function __construct(
        private readonly Session $session,
        private readonly string $slug,
        private readonly array $config = [],
    ) {
    }

    public function all(): array
    {
        return $this->session->get($this->sessionKey(), $this->defaults());
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $state = $this->all();

        return $state[$key] ?? $default;
    }

    public function put(string $key, mixed $value): void
    {
        $state = $this->all();
        $state[$key] = $value;

        $this->session->put($this->sessionKey(), $state);
    }

    public function has(string $key): bool
    {
        $state = $this->all();

        return array_key_exists($key, $state);
    }

    public function forget(string $key): void
    {
        $state = $this->all();
        unset($state[$key]);

        $this->session->put($this->sessionKey(), $state);
    }

    public function reset(): void
    {
        $this->session->put($this->sessionKey(), $this->defaults());
    }

    public function merge(array $values): void
    {
        $this->session->put($this->sessionKey(), array_replace($this->all(), $values));
    }

    public function scene(): ?string
    {
        return $this->get('_scene');
    }

    public function setScene(string $scene): void
    {
        $this->put('_scene', $scene);
    }

    private function defaults(): array
    {
        $defaults = $this->config['state']['defaults'] ?? [];

        if (!array_key_exists('_scene', $defaults)) {
            $defaults['_scene'] = $this->config['entry_scene'] ?? null;
        }

        return $defaults;
    }

    private function sessionKey(): string
    {
        return 'adventures.' . $this->slug;
    }
}
