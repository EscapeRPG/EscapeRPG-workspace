<?php

namespace App\Services\Home;

/**
 * Charge les blocs éditoriaux généraux de la page d'accueil.
 *
 * Sont regroupés ici les contenus qui ne relèvent ni
 * de l'exécution d'une aventure, ni du catalogue des scénarios.
 */
class HomePageContent
{
    /**
     * Retourne le bloc "Bienvenue".
     *
     * @return array<string, mixed>
     */
    public function bienvenue(): array
    {
        return $this->load('bienvenue');
    }

    /**
     * Retourne le bloc "Règles".
     *
     * @return array<string, mixed>
     */
    public function regles(): array
    {
        return $this->load('regles');
    }

    /**
     * Retourne le bloc "Liens".
     *
     * @return array<string, mixed>
     */
    public function liens(): array
    {
        return $this->load('liens');
    }

    /**
     * Charge un fragment de contenu de la home depuis `app/Content/Home`.
     *
     * @return array<string, mixed>
     */
    private function load(string $name): array
    {
        $path = BASE_PATH . '/app/Content/Home/' . $name . '.php';

        return file_exists($path) ? require $path : [];
    }
}
