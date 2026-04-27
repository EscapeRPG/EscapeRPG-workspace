<?php

namespace App\Controllers;

use App\Services\Adventures\Engine\AdventureFlowFactory;

/**
 * Contrôleur d'entrée des pages d'aventure.
 *
 * Il délègue entièrement l'affichage et les actions métier
 * au flow configuré pour le scénario demandé.
 */
class AdventurePageController extends AdventureController
{
    /**
     * Affiche une scène d'aventure.
     */
    public function show(string $slug, ?string $scene = null): void
    {
        $this->ensureAdventureExists($slug);
        $config = $this->adventureConfig($slug);
        $state = $this->adventureState($slug);
        $flow = (new AdventureFlowFactory())->make($config);

        $resolvedScene = $scene ?? ($config['entry_scene'] ?? 'index');

        if ($scene !== null) {
            $state->setScene($resolvedScene);
        }

        $page = $flow->show($config, $state, $this->request, $resolvedScene);
        $this->renderAdventure($page->view, $page->data, $page->layout);
    }

    /**
     * Traite une action soumise depuis une scène d'aventure.
     */
    public function update(string $slug, ?string $scene = null): void
    {
        $this->ensureAdventureExists($slug);
        $config = $this->adventureConfig($slug);
        $state = $this->adventureState($slug);
        $flow = (new AdventureFlowFactory())->make($config);

        $scene ??= $config['entry_scene'] ?? 'index';

        $this->applyAdventureResult(
            $slug,
            $state,
            $flow->handle($config, $state, $this->request, $scene),
        );
    }
}
