<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class NuitSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'nuit_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'suivant' => new AdventureActionResult(
                nextScene: 'nuit',
                stateChanges: [
                    'nuit_step' => 1,
                ],
            ),
            'suivant2' => new AdventureActionResult(
                nextScene: 'nuit',
                stateChanges: [
                    'nuit_step' => 2,
                    'inventory' => $this->mergeNotes((array) $state->get('inventory', []), ['piecepo']),
                ],
            ),
            'suivant3' => new AdventureActionResult(
                nextScene: 'nuit',
                stateChanges: [
                    'nuit_step' => 3,
                ],
            ),
            'attendre' => new AdventureActionResult(nextScene: 'matin'),
            default => new AdventureActionResult(nextScene: 'nuit'),
        };
    }
}
