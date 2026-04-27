<?php

namespace App\Services\Adventures\Engine;

use App\Core\Request;

/**
 * Contrat implémenté par tous les flows d'aventure.
 *
 * Un flow sait à la fois préparer l'affichage d'une scène et traiter
 * les actions envoyées depuis cette scène.
 */
interface AdventureFlow
{
    /**
     * Prépare la page à afficher pour une scène donnée.
     */
    public function show(array $config, AdventureState $state, Request $request, string $scene): AdventurePage;

    /**
     * Traite une action utilisateur et retourne ses effets.
     */
    public function handle(array $config, AdventureState $state, Request $request, string $scene): AdventureActionResult;
}
