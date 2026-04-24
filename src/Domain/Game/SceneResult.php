<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Domain\Game;

final class SceneResult
{
    public function __construct(
        private string $template,
        private array $data = [],
        private ?string $redirectTo = null
    ) {
    }

    public static function view(string $template, array $data = []): self
    {
        return new self($template, $data);
    }

    public static function redirect(string $location): self
    {
        return new self('', [], $location);
    }

    public function template(): string
    {
        return $this->template;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function redirectTo(): ?string
    {
        return $this->redirectTo;
    }
}
