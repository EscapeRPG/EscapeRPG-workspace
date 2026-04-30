<?php

namespace App\Services\Adventures\Scenarios\LastParty;

use App\Core\Request;
use App\Services\Account\AuthService;
use App\Services\Adventures\Base\SceneBasedAdventureFlow;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\LastParty\Scenes\EveilSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\IndexSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\AppartementSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\TelephoneSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\OrdinateurSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\TiroirSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\AppareilPhotoSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\CouloirSceneHandler;
use App\Services\Adventures\Scenarios\LastParty\Scenes\FinSceneHandler;
use App\Services\Adventures\Support\AdventureSaveService;

/**
 * Flow orchestrateur du scénario Last Party.
 *
 * Le scénario est structuré autour d'un handler dédié par scène.
 * Cette classe ne conserve que les comportements transverses.
 */
class LastPartyAdventureFlow extends SceneBasedAdventureFlow
{
    /**
     * @var array<string, AdventureSceneHandler>
     */
    private array $handlers;
    private AdventureSaveService $saveService;

    public function __construct()
    {
        parent::__construct();

        $this->saveService = new AdventureSaveService();
        $this->handlers = [
            'index' => new IndexSceneHandler(),
            'eveil' => new EveilSceneHandler(),
            'telephone' => new TelephoneSceneHandler(),
            'appartement' => new AppartementSceneHandler(),
            'tiroir' => new TiroirSceneHandler(),
            'ordinateur' => new OrdinateurSceneHandler(),
            'appareilphoto' => new AppareilPhotoSceneHandler(),
            'couloir' => new CouloirSceneHandler(),
            'ebaubi' => new FinSceneHandler(),
        ];
    }

    /**
     * @return array<string, AdventureSceneHandler>
     */
    protected function handlers(): array
    {
        return $this->handlers;
    }

    /**
     * Gère les actions globales du scénario : sauvegarde et chargement.
     */
    protected function handleGlobalAction(
        array $config,
        AdventureState $state,
        Request $request,
        string $scene,
        string $action,
    ): ?AdventureActionResult {
        if ($action === 'save_game') {
            return $this->handleSaveGame($config, $state, $scene);
        }

        if ($scene === 'index' && $action === 'load_game') {
            return $this->handleLoadGame($config);
        }

        if ($action === 'submit_load_game') {
            return $this->handleLoadSubmission($config, $request);
        }

        if ($action === 'submit_save_game') {
            return $this->handleSaveSubmission($config, $state, $request);
        }

        return null;
    }

    /**
     * Gère une demande de sauvegarde de partie.
     */
    private function handleSaveGame(array $config, AdventureState $state, string $scene): AdventureActionResult
    {
        $slug = (string) ($config['slug'] ?? '');
        $currentState = $state->all();
        $savedScene = (string) ($currentState['_scene'] ?? $scene);

        if (AuthService::check()) {
            $saved = $this->saveService->saveForCurrentUser($slug, $currentState, $savedScene);

            if (!$saved) {
                return new AdventureActionResult(
                    nextScene: $scene,
                    flashMessage: 'La sauvegarde a échoué.',
                    flashType: 'error',
                );
            }

            return new AdventureActionResult(
                nextScene: $scene,
                achievements: [
                    ['scenario' => 'general', 'name' => 'sauvegarder'],
                ],
                flashMessage: 'La partie a bien été sauvegardée.',
                flashType: 'success',
            );
        }

        return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/sauvegarde');
    }

    /**
     * Gère une demande de chargement de partie.
     */
    private function handleLoadGame(array $config): AdventureActionResult
    {
        $slug = (string) ($config['slug'] ?? '');

        if (AuthService::check()) {
            $save = $this->saveService->loadForCurrentUser($slug);

            if ($save === null) {
                return new AdventureActionResult(
                    nextScene: 'index',
                    flashMessage: 'Aucune sauvegarde n’a été trouvée pour ce scénario.',
                    flashType: 'error',
                );
            }

            return new AdventureActionResult(
                nextScene: (string) $save['scene'],
                replaceState: (array) $save['state'],
                achievements: [
                    ['scenario' => 'general', 'name' => 'charger'],
                ],
                flashMessage: 'La partie a bien été chargée.',
                flashType: 'success',
            );
        }

        return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/chargement');
    }

    /**
     * Gère le formulaire de chargement visiteur.
     */
    private function handleLoadSubmission(array $config, Request $request): AdventureActionResult
    {
        $saveName = trim((string) $request->post('save_name', ''));
        $saveCode = trim((string) $request->post('save_code', ''));
        $slug = (string) ($config['slug'] ?? '');

        if ($saveName === '' || $saveCode === '') {
            return new AdventureActionResult(
                redirectTo: '/aventures/' . $slug . '/chargement',
                flashMessage: 'Veuillez renseigner le nom et le code de la sauvegarde.',
                flashType: 'error',
            );
        }

        $save = $this->saveService->loadForGuest($slug, $saveName, $saveCode);
        if ($save === null) {
            return new AdventureActionResult(
                redirectTo: '/aventures/' . $slug . '/chargement',
                flashMessage: 'Aucune sauvegarde ne correspond à ces informations.',
                flashType: 'error',
            );
        }

        return new AdventureActionResult(
            nextScene: (string) $save['scene'],
            replaceState: (array) $save['state'],
            achievements: [
                ['scenario' => 'general', 'name' => 'charger'],
            ],
            flashMessage: 'La partie a bien été chargée.',
            flashType: 'success',
        );
    }

    /**
     * Gère le formulaire de sauvegarde visiteur.
     */
    private function handleSaveSubmission(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $saveName = trim((string) $request->post('save_name', ''));
        $saveCode = trim((string) $request->post('save_code', ''));
        $slug = (string) ($config['slug'] ?? '');

        if ($saveName === '' || $saveCode === '') {
            return new AdventureActionResult(
                redirectTo: '/aventures/' . $slug . '/sauvegarde',
                flashMessage: 'Veuillez renseigner le nom et le code de la sauvegarde.',
                flashType: 'error',
            );
        }

        $this->saveService->saveForGuest(
            $slug,
            $saveName,
            $saveCode,
            $state->all(),
            (string) ($state->scene() ?? ($config['entry_scene'] ?? 'index')),
        );

        return new AdventureActionResult(
            achievements: [
                ['scenario' => 'general', 'name' => 'sauvegarder'],
            ],
            redirectTo: '/aventures/' . $slug . '/' . ($state->scene() ?? ($config['entry_scene'] ?? 'index')),
            flashMessage: 'La partie a bien été sauvegardée.',
            flashType: 'success',
        );
    }
}
