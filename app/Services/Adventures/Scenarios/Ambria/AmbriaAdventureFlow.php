<?php

namespace App\Services\Adventures\Scenarios\Ambria;

use App\Core\Request;
use App\Services\Account\AuthService;
use App\Services\Adventures\Base\SceneBasedAdventureFlow;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\CiteSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\EmbarquementSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\EmbrouillesSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\FinSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\FuiteSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\GardienSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\GrottesSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\PlageSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\PortesCiteSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\PyramideSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\ShipSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\TempeteSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Logan\TaverneSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\BibliothequeSceneHandler as SullivanBibliothequeSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\BordelSceneHandler as SullivanBordelSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\CiteSceneHandler as SullivanCiteSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\DocksSceneHandler as SullivanDocksSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\EmbarquementSceneHandler as SullivanEmbarquementSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\EmbrouillesSceneHandler as SullivanEmbrouillesSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\FinSceneHandler as SullivanFinSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\GardienSceneHandler as SullivanGardienSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\GrottesSceneHandler as SullivanGrottesSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\MarcheSceneHandler as SullivanMarcheSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\PlageSceneHandler as SullivanPlageSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\PortesCiteSceneHandler as SullivanPortesCiteSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\PyramideSceneHandler as SullivanPyramideSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\ShipSceneHandler as SullivanShipSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\TaverneSceneHandler as SullivanTaverneSceneHandler;
use App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan\TempeteSceneHandler as SullivanTempeteSceneHandler;
use App\Services\Adventures\Support\AdventureSaveService;

class AmbriaAdventureFlow extends SceneBasedAdventureFlow
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
            if ($scene === 'sullivan_marche') {
                $this->handlers[$scene] = new SullivanMarcheSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_bordel') {
                $this->handlers[$scene] = new SullivanBordelSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_taverne') {
                $this->handlers[$scene] = new SullivanTaverneSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_docks') {
                $this->handlers[$scene] = new SullivanDocksSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_bibliotheque') {
                $this->handlers[$scene] = new SullivanBibliothequeSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_embrouilles') {
                $this->handlers[$scene] = new SullivanEmbrouillesSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_embarquement') {
                $this->handlers[$scene] = new SullivanEmbarquementSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if (in_array($scene, [
                'sullivan_flots',
                'sullivan_pontprincipal',
                'sullivan_dunette',
                'sullivan_pontinferieur',
                'sullivan_mess',
                'sullivan_quartierdesequipages',
                'sullivan_cale',
                'sullivan_cabine',
            ], true)) {
                $this->handlers[$scene] = new SullivanShipSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_tempete') {
                $this->handlers[$scene] = new SullivanTempeteSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_plage') {
                $this->handlers[$scene] = new SullivanPlageSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_grottestorchesallumees' || $scene === 'sullivan_grottestorcheseteintes') {
                $this->handlers[$scene] = new SullivanGrottesSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_portescite') {
                $this->handlers[$scene] = new SullivanPortesCiteSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_cite') {
                $this->handlers[$scene] = new SullivanCiteSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_gardien') {
                $this->handlers[$scene] = new SullivanGardienSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_pyramide') {
                $this->handlers[$scene] = new SullivanPyramideSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'sullivan_fin') {
                $this->handlers[$scene] = new SullivanFinSceneHandler(
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_fuite') {
                $this->handlers[$scene] = new FuiteSceneHandler();
                continue;
            }

            if ($scene === 'logan_fin') {
                $this->handlers[$scene] = new FinSceneHandler(
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_taverne') {
                $this->handlers[$scene] = new TaverneSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_embrouilles') {
                $this->handlers[$scene] = new EmbrouillesSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_embarquement') {
                $this->handlers[$scene] = new EmbarquementSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if (in_array($scene, [
                'logan_flots',
                'logan_pontprincipal',
                'logan_dunette',
                'logan_pontinferieur',
                'logan_mess',
                'logan_quartierdesequipages',
                'logan_cale',
                'logan_cabine',
            ], true)) {
                $this->handlers[$scene] = new ShipSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_tempete') {
                $this->handlers[$scene] = new TempeteSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_plage') {
                $this->handlers[$scene] = new PlageSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_grottestorchesallumees' || $scene === 'logan_grottestorcheseteintes') {
                $this->handlers[$scene] = new GrottesSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_portescite') {
                $this->handlers[$scene] = new PortesCiteSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_cite') {
                $this->handlers[$scene] = new CiteSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_gardien') {
                $this->handlers[$scene] = new GardienSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            if ($scene === 'logan_pyramide') {
                $this->handlers[$scene] = new PyramideSceneHandler(
                    $scene,
                    (string) ($definition['default'] ?? 'default'),
                    (array) ($definition['actions'] ?? []),
                );
                continue;
            }

            $this->handlers[$scene] = new AmbriaSceneHandler(
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
                return new AdventureActionResult(nextScene: 'index', flashMessage: "Aucune sauvegarde n'a été trouvée pour ce scénario.", flashType: 'error');
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
        return require dirname(__DIR__, 5) . '/config/adventures/ambria/flow.php';
    }
}
