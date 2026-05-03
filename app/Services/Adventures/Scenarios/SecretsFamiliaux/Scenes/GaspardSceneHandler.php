<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class GaspardSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'gaspard_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('chiens_sauves', false)) {
            return 'reward';
        }

        if ((bool) $state->get('chiens_sauves_fin', false)) {
            return 'saved';
        }

        if ((bool) $state->get('chiens_empoisonnes', false)) {
            return 'poisoned';
        }

        $response = $state->get('gaspard_response');
        if ($response === 'nourriture') {
            return 'nourriture';
        }

        if (is_string($response) && $response !== '') {
            return $response;
        }

        return (bool) $state->get('intrusion_done', false) ? 'intrusion' : 'default';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') === 'take_talisman') {
            return new AdventureActionResult(nextScene: 'maisongaspard', stateChanges: [
                'chiens_sauves' => false,
                'chiens_sauves_fin' => true,
                'inventory' => $this->mergeNotes((array) $state->get('inventory', []), ['talisman']),
            ]);
        }

        if ((string) $request->post('action', '') === 'follow_chenil') {
            return new AdventureActionResult(nextScene: 'chenil', stateChanges: [
                'gaspard_response' => null,
                'intrusion_done' => false,
                'chiens_malades' => false,
                'chiens_empoisonnes' => true,
                'chiens_poisoning_discovered' => false,
            ]);
        }

        if ((string) $request->post('action', '') !== 'interroger') {
            return new AdventureActionResult(nextScene: 'maisongaspard');
        }

        $response = $this->normalizeInput((string) $request->post('gaspard', ''));
        if ($response === 'nourriture') {
            return new AdventureActionResult(nextScene: 'maisongaspard', stateChanges: [
                'gaspard_response' => 'nourriture',
            ]);
        }

        $response = $this->resolveInput($response, [
            'pellington',
            'domestiques',
            'chiens',
            'soucis',
            'odeur',
            'symbole',
            'bureau',
            'empreintedepas',
            'teona',
            'monica',
            'mmenouveau',
        ]);

        return new AdventureActionResult(nextScene: 'maisongaspard', stateChanges: [
            'gaspard_response' => $response,
        ]);
    }
}
