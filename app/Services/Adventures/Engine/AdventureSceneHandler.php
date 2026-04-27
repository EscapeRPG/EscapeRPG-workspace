<?php

namespace App\Services\Adventures\Engine;

use App\Core\Request;

/**
 * Contrat commun aux handlers de scènes.
 *
 * Chaque scène connaît:
 * - sa variante de contenu active
 * - les données d'affichage propres à la scène
 * - la façon de traiter ses actions métier
 */
interface AdventureSceneHandler
{
    /**
     * Retourne la variante de contenu active pour cette scène.
     */
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string;

    /**
     * Prépare les données spécifiques à la scène pour le rendu.
     *
     * @return array<string, mixed>
     */
    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array;

    /**
     * Traite une action propre à la scène.
     */
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult;
}
