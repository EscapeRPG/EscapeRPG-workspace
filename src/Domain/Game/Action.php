<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Domain\Game;

final class Action
{
    public function __construct(
        private string $name,
        private array $payload = []
    ) {
    }

    public static function make(string $name, array $payload = []): self
    {
        return new self($name, $payload);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function payload(): array
    {
        return $this->payload;
    }

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->payload[$key] ?? $default;
    }

    public function is(string $name): bool
    {
        return $this->name === $name;
    }
}
