<?php

namespace App\Services\Adventures\Base;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureFlow;
use App\Services\Adventures\Engine\AdventurePage;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Implémentation générique utilisée pour les aventures simples.
 *
 * Elle fournit un comportement minimal: affichage d'une scène
 * déclarée et redirection vers une scène cible.
 */
class GenericAdventureFlow implements AdventureFlow
{
    /**
     * Prépare les données de vue pour la scène demandée.
     */
    public function show(array $config, AdventureState $state, Request $request, string $scene): AdventurePage
    {
        $sceneConfig = $this->sceneConfig($config, $scene);

        return new AdventurePage(
            view: 'adventures/show',
            data: [
                'title' => ($config['title'] ?? 'Aventure') . ' - ' . ($sceneConfig['label'] ?? ucfirst($scene)),
                'adventure' => $config,
                'scene' => $scene,
                'sceneConfig' => $sceneConfig,
                'sceneView' => $this->sceneView($config, $scene, $sceneConfig),
                'state' => $state->all(),
            ],
            layout: $config['layout'] ?? 'main',
        );
    }

    /**
     * Gère le comportement par défaut d'une action sur une aventure.
     */
    public function handle(array $config, AdventureState $state, Request $request, string $scene): AdventureActionResult
    {
        if ($request->has('restart')) {
            return new AdventureActionResult(
                nextScene: $config['entry_scene'] ?? 'index',
                resetState: true,
            );
        }

        $targetScene = (string) $request->post(
            'scene',
            $scene ?: ($state->scene() ?? ($config['entry_scene'] ?? 'index'))
        );

        return new AdventureActionResult(nextScene: $targetScene);
    }

    /**
     * Retourne la configuration déclarative d'une scène.
     *
     * @return array<string, mixed>
     */
    protected function sceneConfig(array $config, string $scene): array
    {
        $sceneConfig = $config['scenes'][$scene] ?? null;

        if (is_string($sceneConfig)) {
            return ['label' => $sceneConfig];
        }

        if (is_array($sceneConfig)) {
            return $sceneConfig;
        }

        return [
            'label' => ucfirst($scene),
        ];
    }

    protected function sceneView(array $config, string $scene, array $sceneConfig): ?string
    {
        $view = $sceneConfig['view'] ?? $config['scene_views'][$scene] ?? null;

        return is_string($view) && $view !== '' ? $view : null;
    }
}
