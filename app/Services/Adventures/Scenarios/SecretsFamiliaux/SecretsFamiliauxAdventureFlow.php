<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux;

use App\Core\Request;
use App\Services\Account\AuthService;
use App\Services\Adventures\Base\SceneBasedAdventureFlow;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\FifteenHamiltonStreetSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\AileSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\BibliothequeSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\BureauPrive2SceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\BureauPriveSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\BureauSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\CaveSecreteSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\CaveSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\ChambreSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\ChambresSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\ChenilSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\CimetiereSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\CoffretSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\CourtCircuitSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\CuvesSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\GaspardSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\GrenierSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\IndexSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\Jour2SceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\IntrusionSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\MatinSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\NuitSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\ManoirIntSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\ManorRdcSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\PellingtonSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\PellingtonCaveSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\PellingtonDeuxiemeSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\PellingtonVestibuleSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\PapierSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\PenseesSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\SalleDeBainSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\SalonSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\ShoggothSceneHandler;
use App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes\SimpleSceneHandler;
use App\Services\Adventures\Support\AdventureSaveService;

class SecretsFamiliauxAdventureFlow extends SceneBasedAdventureFlow
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
            'cimetiere' => new CimetiereSceneHandler(),
            '15hamiltonstreet' => new FifteenHamiltonStreetSceneHandler(),
            'manor' => new SimpleSceneHandler(
                stepKey: 'manor_step',
                actionMap: [
                    'retour' => ['scene' => '15hamiltonstreet'],
                ],
            ),
            'manoirint' => new ManoirIntSceneHandler(),
            'rdc' => new ManorRdcSceneHandler(),
            'salon' => new SalonSceneHandler(),
            'aile' => new AileSceneHandler(),
            'etage' => new SimpleSceneHandler(stepKey: 'etage_step'),
            'chambre' => new ChambreSceneHandler(),
            'coffret' => new CoffretSceneHandler(),
            'papier' => new PapierSceneHandler(),
            'bureau' => new BureauSceneHandler(),
            'bureauprive' => new BureauPriveSceneHandler(),
            'bureauprive2' => new BureauPrive2SceneHandler(),
            'courtcircuit' => new CourtCircuitSceneHandler(),
            'cuves' => new CuvesSceneHandler(),
            'cavesecrete' => new CaveSecreteSceneHandler(),
            'pensees' => new PenseesSceneHandler(),
            'shoggoth' => new ShoggothSceneHandler(),
            'bibliotheque' => new BibliothequeSceneHandler(),
            'chambres' => new ChambresSceneHandler(),
            'grenier' => new GrenierSceneHandler(),
            'cave' => new CaveSceneHandler(),
            'jardin' => new SimpleSceneHandler(stepKey: 'jardin_step'),
            'maisongaspard' => new GaspardSceneHandler(),
            'chenil' => new ChenilSceneHandler(),
            'serre' => new SimpleSceneHandler(stepKey: 'serre_step'),
            'jour2' => new Jour2SceneHandler(),
            'intrusion' => new IntrusionSceneHandler(),
            'nuit' => new NuitSceneHandler(),
            'matin' => new MatinSceneHandler(),
            'manoir107parkavenue' => new SimpleSceneHandler(stepKey: 'manoir107parkavenue_step'),
            '107parkavenue' => new PellingtonSceneHandler(),
            'pellingtonrdc' => new SimpleSceneHandler(stepKey: 'pellingtonrdc_step'),
            'pellingtonvestibule' => new PellingtonVestibuleSceneHandler(),
            'pellingtonsalon' => new SimpleSceneHandler(stepKey: 'pellington_salon_step'),
            'pellingtonpremier' => new SimpleSceneHandler(stepKey: 'pellington_premier_step'),
            'pellingtonchambre' => new SimpleSceneHandler(stepKey: 'pellington_chambre_step'),
            'salledebain' => new SalleDeBainSceneHandler(),
            'pellingtondeuxieme' => new PellingtonDeuxiemeSceneHandler(),
            'pellingtongrenier' => new SimpleSceneHandler(stepKey: 'pellington_grenier_step'),
            'pellingtoncave' => new PellingtonCaveSceneHandler(),
        ];
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

    private function handleSaveGame(array $config, AdventureState $state, string $scene): AdventureActionResult
    {
        $slug = (string) ($config['slug'] ?? '');
        $currentState = $state->all();
        $savedScene = (string) ($currentState['_scene'] ?? $scene);

        if (AuthService::check()) {
            $saved = $this->saveService->saveForCurrentUser($slug, $currentState, $savedScene);

            if (!$saved) {
                return new AdventureActionResult(nextScene: $scene, flashMessage: 'La sauvegarde a échoué.', flashType: 'error');
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
                achievements: [
                    ['scenario' => 'general', 'name' => 'charger'],
                ],
                flashMessage: 'La partie a bien été chargée.',
                flashType: 'success',
            );
        }

        return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/chargement');
    }

    private function handleLoadSubmission(array $config, Request $request): AdventureActionResult
    {
        $saveName = trim((string) $request->post('save_name', ''));
        $saveCode = trim((string) $request->post('save_code', ''));
        $slug = (string) ($config['slug'] ?? '');

        if ($saveName === '' || $saveCode === '') {
            return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/chargement', flashMessage: 'Veuillez renseigner le nom et le code de la sauvegarde.', flashType: 'error');
        }

        $save = $this->saveService->loadForGuest($slug, $saveName, $saveCode);
        if ($save === null) {
            return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/chargement', flashMessage: 'Aucune sauvegarde ne correspond à ces informations.', flashType: 'error');
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

    private function handleSaveSubmission(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $saveName = trim((string) $request->post('save_name', ''));
        $saveCode = trim((string) $request->post('save_code', ''));
        $slug = (string) ($config['slug'] ?? '');

        if ($saveName === '' || $saveCode === '') {
            return new AdventureActionResult(redirectTo: '/aventures/' . $slug . '/sauvegarde', flashMessage: 'Veuillez renseigner le nom et le code de la sauvegarde.', flashType: 'error');
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
