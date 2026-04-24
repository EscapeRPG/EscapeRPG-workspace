<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Domain\Game;

final class GameState
{
    public function __construct(
        private array $flags = [],
        private array $inventory = [],
        private array $notes = [],
        private array $sceneSteps = []
    ) {
    }

    public static function empty(): self
    {
        return new self();
    }

    public function flags(): array
    {
        return $this->flags;
    }

    public function inventory(): array
    {
        return $this->inventory;
    }

    public function notes(): array
    {
        return $this->notes;
    }

    public function sceneSteps(): array
    {
        return $this->sceneSteps;
    }

    public function hasFlag(string $flag): bool
    {
        return (bool) ($this->flags[$flag] ?? false);
    }

    public function withFlag(string $flag, bool $value = true): self
    {
        $clone = clone $this;
        $clone->flags[$flag] = $value;

        return $clone;
    }

    public function hasItem(string $item): bool
    {
        return in_array($item, $this->inventory, true);
    }

    public function withItem(string $item): self
    {
        if ($this->hasItem($item)) {
            return $this;
        }

        $clone = clone $this;
        $clone->inventory[] = $item;

        return $clone;
    }

    public function hasNote(string $note): bool
    {
        return in_array($note, $this->notes, true);
    }

    public function withNote(string $note): self
    {
        if ($this->hasNote($note)) {
            return $this;
        }

        $clone = clone $this;
        $clone->notes[] = $note;

        return $clone;
    }

    public function sceneStep(string $scene, string $default = 'intro'): string
    {
        return $this->sceneSteps[$scene] ?? $default;
    }

    public function withSceneStep(string $scene, string $step): self
    {
        $clone = clone $this;
        $clone->sceneSteps[$scene] = $step;

        return $clone;
    }

    public function toArray(): array
    {
        return [
            'flags' => $this->flags,
            'inventory' => $this->inventory,
            'notes' => $this->notes,
            'scene_steps' => $this->sceneSteps,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['flags'] ?? [],
            $data['inventory'] ?? [],
            $data['notes'] ?? [],
            $data['scene_steps'] ?? []
        );
    }
}
