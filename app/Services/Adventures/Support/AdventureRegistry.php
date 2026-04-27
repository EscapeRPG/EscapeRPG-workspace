<?php

namespace App\Services\Adventures\Support;

use App\Core\Config;
use InvalidArgumentException;

/**
 * Expose la liste des aventures déclarées dans la configuration.
 */
class AdventureRegistry
{
    /**
     * Retourne l'ensemble des aventures configurées.
     *
     * @return array<string, array<string, mixed>>
     */
    public function all(): array
    {
        return Config::get('adventures', []);
    }

    /**
     * Indique si un slug d'aventure est configuré.
     */
    public function has(string $slug): bool
    {
        return array_key_exists($slug, $this->all());
    }

    /**
     * Retourne la configuration complète d'une aventure.
     *
     * @return array<string, mixed>
     */
    public function get(string $slug): array
    {
        $adventure = $this->all()[$slug] ?? null;

        if ($adventure === null) {
            throw new InvalidArgumentException(sprintf('Adventure "%s" is not configured.', $slug));
        }

        return $adventure;
    }
}
