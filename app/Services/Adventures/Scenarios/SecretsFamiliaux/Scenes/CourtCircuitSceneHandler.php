<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class CourtCircuitSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'courtcircuit_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'start_puzzle', 'reset_circuit' => new AdventureActionResult(nextScene: 'courtcircuit', stateChanges: [
                'courtcircuit_step' => 1,
            ]),
            'solve_circuit' => new AdventureActionResult(
                nextScene: 'cuves',
                stateChanges: [
                    'courtcircuit_step' => 2,
                    'electricity_restored' => true,
                    'cuves_seen' => true,
                ],
                achievements: [
                    ['scenario' => 'secretsfamiliaux', 'name' => 'electricite'],
                ],
            ),
            'retour' => new AdventureActionResult(nextScene: 'bureauprive2'),
            default => new AdventureActionResult(nextScene: 'courtcircuit'),
        };
    }
}
