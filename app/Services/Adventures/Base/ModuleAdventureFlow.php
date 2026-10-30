<?php

namespace App\Services\Adventures\Base;

use App\Core\Request;
use App\Services\Account\AuthService;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventurePage;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\AdventureSaveService;

/** Flow réutilisable par les scénarios créés avec la commande d’édition. */
class ModuleAdventureFlow extends SceneBasedAdventureFlow
{
    private array $sceneHandlers = [];
    private ?array $loadedDefinitions = null;

    protected function handlers(): array
    {
        return $this->sceneHandlers;
    }

    private function prepare(array $config): void
    {
        $definitions = $config['scene_definitions'] ?? [];
        if ($definitions === $this->loadedDefinitions) {
            return;
        }
        $this->sceneHandlers = [];
        foreach ($definitions as $scene => $definition) {
            $class = $definition['handler'] ?? DeclarativeSceneHandler::class;
            $this->sceneHandlers[$scene] = new $class(
                $scene, $definition['default'] ?? 'default', $definition['actions'] ?? [],
            );
        }
        $this->loadedDefinitions = $definitions;
    }

    public function show(array $config, AdventureState $state, Request $request, string $scene): AdventurePage
    {
        $this->prepare($config);
        return parent::show($config, $state, $request, $scene);
    }

    public function handle(array $config, AdventureState $state, Request $request, string $scene): AdventureActionResult
    {
        $this->prepare($config);
        return parent::handle($config, $state, $request, $scene);
    }

    protected function handleGlobalAction(array $config, AdventureState $state, Request $request, string $scene, string $action): ?AdventureActionResult
    {
        // Les sauvegardes restent déclenchées exclusivement par le joueur.
        if (!in_array($action, ['save_game', 'load_game', 'submit_save_game', 'submit_load_game'], true)) {
            return null;
        }
        $slug = $config['slug'];
        $base = '/aventures/' . $slug;
        if (($action === 'save_game' || $action === 'load_game') && !AuthService::check()) {
            return new AdventureActionResult(redirectTo: $base . ($action === 'save_game' ? '/sauvegarde' : '/chargement'));
        }
        $service = new AdventureSaveService();
        if ($action === 'save_game' || $action === 'submit_save_game') {
            $savedScene = (string) ($state->scene() ?? $scene);
            if ($action === 'save_game') {
                $saved = $service->saveForCurrentUser($slug, $state->all(), $savedScene);
            } else {
                $service->saveForGuest($slug,
                    trim((string) $request->post('save_name', '')),
                    trim((string) $request->post('save_code', '')),
                    $state->all(), $savedScene,
                );
                $saved = true;
            }
            return new AdventureActionResult(
                nextScene: $savedScene,
                flashMessage: $saved ? 'La partie a bien été sauvegardée.' : 'La sauvegarde a échoué.',
                flashType: $saved ? 'success' : 'error',
            );
        }
        $save = $action === 'load_game'
            ? $service->loadForCurrentUser($slug)
            : $service->loadForGuest($slug,
                trim((string) $request->post('save_name', '')),
                trim((string) $request->post('save_code', '')),
            );
        if ($save === null) {
            return new AdventureActionResult(nextScene: $config['entry_scene'], flashMessage: 'Aucune sauvegarde trouvée.', flashType: 'error');
        }
        return new AdventureActionResult(nextScene: $save['scene'], replaceState: $save['state'], flashMessage: 'La partie a bien été chargée.', flashType: 'success');
    }
}
