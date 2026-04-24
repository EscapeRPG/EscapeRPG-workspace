<?php

namespace App\Services\Adventures;

use App\Core\Config;
use InvalidArgumentException;

class AdventureRegistry
{
    public function all(): array
    {
        return Config::get('adventures', []);
    }

    public function has(string $slug): bool
    {
        return array_key_exists($slug, $this->all());
    }

    public function get(string $slug): array
    {
        $adventure = $this->all()[$slug] ?? null;

        if ($adventure === null) {
            throw new InvalidArgumentException(sprintf('Adventure "%s" is not configured.', $slug));
        }

        return $adventure;
    }
}
