<?php

namespace App\Services\Home;

/**
 * Charge le catalogue d'aventures affiché sur la page d'accueil.
 *
 * Ce service reste volontairement côté "Home" :
 * il prépare une vitrine éditoriale, pas la logique d'exécution
 * d'un scénario.
 */
class HomeAdventureCatalog
{
    /**
     * Retourne les données de présentation des aventures pour la home.
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $this->load('aventures');
    }

    /**
     * Charge le catalogue depuis `app/Content/Home`.
     *
     * @return array<string, mixed>
     */
    private function load(string $name): array
    {
        $path = BASE_PATH . '/app/Content/Home/' . $name . '.php';

        return file_exists($path) ? require $path : [];
    }
}
