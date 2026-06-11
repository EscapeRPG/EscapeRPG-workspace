<?php

namespace App\Services\Adventures\Scenarios\Gaea1;

use App\Core\Request;
use App\Services\Account\AuthService;
use App\Services\Adventures\Base\SceneBasedAdventureFlow;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\Gaea1SceneHandler;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\IndexSceneHandler;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\KomunodekSceneHandler;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\LegerrumSceneHandler;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\SignalTreatmentSceneHandler;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\StationPlanSceneHandler;
use App\Services\Adventures\Scenarios\Gaea1\Scenes\SykkerumSceneHandler;
use App\Services\Adventures\Support\AdventureSaveService;

class Gaea1AdventureFlow extends SceneBasedAdventureFlow
{
    /** @var array<string, AdventureSceneHandler> */
    private array $handlers;
    private AdventureSaveService $saveService;

    public function __construct()
    {
        parent::__construct();

        $this->saveService = new AdventureSaveService();
        $this->handlers = [];
        foreach ($this->definitions() as $scene => $definition) {
            $handlerClass = match ($scene) {
                'index' => IndexSceneHandler::class,
                'signalt' => SignalTreatmentSceneHandler::class,
                'plan' => StationPlanSceneHandler::class,
                'sykkerum' => SykkerumSceneHandler::class,
                'legerrum' => LegerrumSceneHandler::class,
                'komunodek' => KomunodekSceneHandler::class,
                default => Gaea1SceneHandler::class,
            };
            $this->handlers[$scene] = new $handlerClass(
                $scene,
                (string) ($definition['default'] ?? 'default'),
                (array) ($definition['actions'] ?? []),
            );
        }
    }

    protected function handlers(): array
    {
        return $this->handlers;
    }

    protected function handleGlobalAction(
        array $config,
        AdventureState $state,
        Request $request,
        string $scene,
        string $action,
    ): ?AdventureActionResult {
        return match ($action) {
            'new_game' => new AdventureActionResult(
                nextScene: 'index',
                resetState: true,
                stateChanges: ['started' => true, 'index_variant' => 'avatar'],
                achievements: [
                    ['scenario' => 'general', 'name' => 'debut'],
                    ['scenario' => 'gaea1', 'name' => 'debut'],
                ],
            ),
            'save_game' => $this->handleSaveGame($config, $state, $scene),
            'load_game' => $this->handleLoadGame($config),
            'submit_load_game' => $this->handleLoadSubmission($config, $request),
            'submit_save_game' => $this->handleSaveSubmission($config, $state, $request),
            default => null,
        };
    }

    private function handleSaveGame(array $config, AdventureState $state, string $scene): AdventureActionResult
    {
        $slug = (string) ($config['slug'] ?? '');
        $currentState = $state->all();
        $savedScene = (string) ($currentState['_scene'] ?? $scene);

        if (AuthService::check()) {
            $saved = $this->saveService->saveForCurrentUser($slug, $currentState, $savedScene);

            return new AdventureActionResult(
                nextScene: $scene,
                achievements: $saved ? [['scenario' => 'general', 'name' => 'sauvegarder']] : [],
                flashMessage: $saved ? 'La partie a bien été sauvegardée.' : 'La sauvegarde a échoué.',
                flashType: $saved ? 'success' : 'error',
            );
        }

        return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/sauvegarde');
    }

    private function handleLoadGame(array $config): AdventureActionResult
    {
        $slug = (string) ($config['slug'] ?? '');

        if (AuthService::check()) {
            $save = $this->saveService->loadForCurrentUser($slug);
            if ($save === null) {
                return new AdventureActionResult(nextScene: 'index', flashMessage: 'Aucune sauvegarde n’a été trouvée pour ce scénario.', flashType: 'error');
            }

            return new AdventureActionResult(
                nextScene: (string) $save['scene'],
                replaceState: (array) $save['state'],
                achievements: [['scenario' => 'general', 'name' => 'charger']],
                flashMessage: 'La partie a bien été chargée.',
                flashType: 'success',
            );
        }

        return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/chargement');
    }

    private function handleLoadSubmission(array $config, Request $request): AdventureActionResult
    {
        $slug = (string) ($config['slug'] ?? '');
        $save = $this->saveService->loadForGuest(
            $slug,
            trim((string) $request->post('save_name', '')),
            trim((string) $request->post('save_code', '')),
        );

        if ($save === null) {
            return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/chargement', flashMessage: 'Aucune sauvegarde ne correspond à ces informations.', flashType: 'error');
        }

        return new AdventureActionResult(
            nextScene: (string) $save['scene'],
            replaceState: (array) $save['state'],
            achievements: [['scenario' => 'general', 'name' => 'charger']],
            flashMessage: 'La partie a bien été chargée.',
            flashType: 'success',
        );
    }

    private function handleSaveSubmission(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $slug = (string) ($config['slug'] ?? '');
        $this->saveService->saveForGuest(
            $slug,
            trim((string) $request->post('save_name', '')),
            trim((string) $request->post('save_code', '')),
            $state->all(),
            (string) ($state->scene() ?? ($config['entry_scene'] ?? 'index')),
        );

        return new AdventureActionResult(
            achievements: [['scenario' => 'general', 'name' => 'sauvegarder']],
            redirectTo: '/aventures/' . $slug . '/' . ($state->scene() ?? ($config['entry_scene'] ?? 'index')),
            flashMessage: 'La partie a bien été sauvegardée.',
            flashType: 'success',
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function definitions(): array
    {
        return require dirname(__DIR__, 5) . '/config/adventures/gaea1/flow.php';
    }
}
