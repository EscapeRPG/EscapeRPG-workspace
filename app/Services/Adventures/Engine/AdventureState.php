<?php

namespace App\Services\Adventures\Engine;

use App\Core\Session;

/**
 * Encapsule l'état courant d'une aventure dans la session.
 *
 * Cette abstraction évite de manipuler directement `$_SESSION`
 * depuis les flows et fournit un socle commun aux scénarios.
 */
class AdventureState
{
    /**
     * @param array<string, mixed> $config
     */
    public function __construct(
        private readonly Session $session,
        private readonly string $slug,
        private readonly array $config = [],
    ) {
    }

    /**
     * Retourne l'état complet de l'aventure.
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $this->session->get($this->sessionKey(), $this->defaults());
    }

    /**
     * Retourne une valeur de l'état courant.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $state = $this->all();

        return $state[$key] ?? $default;
    }

    /**
     * Écrit une valeur dans l'état courant.
     */
    public function put(string $key, mixed $value): void
    {
        $state = $this->all();
        $state[$key] = $value;

        $this->session->put($this->sessionKey(), $state);
    }

    /**
     * Indique si une clé existe dans l'état courant.
     */
    public function has(string $key): bool
    {
        $state = $this->all();

        return array_key_exists($key, $state);
    }

    /**
     * Supprime une clé de l'état courant.
     */
    public function forget(string $key): void
    {
        $state = $this->all();
        unset($state[$key]);

        $this->session->put($this->sessionKey(), $state);
    }

    /**
     * Réinitialise l'état à ses valeurs par défaut.
     */
    public function reset(): void
    {
        $this->session->put($this->sessionKey(), $this->defaults());
    }

    /**
     * Fusionne partiellement de nouvelles valeurs dans l'état.
     *
     * @param array<string, mixed> $values
     */
    public function merge(array $values): void
    {
        $this->session->put($this->sessionKey(), array_replace($this->all(), $values));
    }

    /**
     * Remplace l'état courant en repartant des valeurs par défaut.
     *
     * @param array<string, mixed> $values
     */
    public function replace(array $values): void
    {
        $this->session->put($this->sessionKey(), array_replace($this->defaults(), $values));
    }

    /**
     * Retourne la scène actuellement mémorisée.
     */
    public function scene(): ?string
    {
        return $this->get('_scene');
    }

    /**
     * Mémorise la scène courante dans l'état.
     */
    public function setScene(string $scene): void
    {
        $this->put('_scene', $scene);
    }

    /**
     * Retourne les valeurs initiales prévues pour le scénario.
     *
     * @return array<string, mixed>
     */
    private function defaults(): array
    {
        $defaults = $this->config['state']['defaults'] ?? [];

        if (!array_key_exists('_scene', $defaults)) {
            $defaults['_scene'] = $this->config['entry_scene'] ?? null;
        }

        return $defaults;
    }

    /**
     * Construit la clé de session utilisée par l'aventure.
     */
    private function sessionKey(): string
    {
        return 'adventures.' . $this->slug;
    }
}
