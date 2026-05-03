<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class PellingtonVestibuleSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    private const string SCENE = 'pellingtonvestibule';

    public function __construct()
    {
        parent::__construct(stepKey: 'pellington_vestibule_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((int) $state->get('pellington_vestibule_step', 0) === 3) {
            return 'footprints';
        }

        if ((bool) $state->get('pellington_vestibule_done', false)) {
            return 'done';
        }

        return match ((int) $state->get('pellington_vestibule_step', 0)) {
            1 => 'flacon',
            2 => 'flacon_acquired',
            4 => 'unknown',
            default => 'step_0',
        };
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $inventory = (array) $state->get('inventory', []);

        return match ((string) $request->post('action', '')) {
            'veste' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_vestibule_step' => 1,
                'pellington_veste_searched' => true,
            ]),
            'take_flacon' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_vestibule_step' => 2,
                'inventory' => $this->mergeNotes($inventory, ['flacon']),
            ]),
            'fouiller' => $this->handleSearch($state, $request),
            'retour' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_vestibule_step' => 0,
            ]),
            default => new AdventureActionResult(nextScene: self::SCENE),
        };
    }

    private function handleSearch(AdventureState $state, Request $request): AdventureActionResult
    {
        if ($this->inputMatches((string) $request->post('fouille', ''), 'empreinte de pas')) {
            return new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_vestibule_step' => 3,
                'pellington_vestibule_done' => true,
            ]);
        }

        return new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
            'pellington_vestibule_step' => 4,
        ]);
    }
}
