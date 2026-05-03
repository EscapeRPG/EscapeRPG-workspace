<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class GrenierSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'grenier_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if (!$this->isManorDay($state)) {
            return 'night';
        }

        if ((int) $state->get('grenier_step', 0) > 0) {
            return parent::variant($state, $request, $isLandingPage);
        }
        if (in_array('pieceev', (array) $state->get('inventory', []), true)) {
            return 'done';
        }
        if ((bool) $state->get('grenier_piano_open', false)) {
            return 'piano';
        }
        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if (!$this->isManorDay($state)) {
            return new AdventureActionResult(nextScene: 'grenier');
        }

        return match ((string) $request->post('action', '')) {
            'piano' => new AdventureActionResult(nextScene: 'grenier', stateChanges: ['grenier_piano_open' => true]),
            'piece' => new AdventureActionResult(nextScene: 'grenier', stateChanges: ['grenier_step' => 1]),
            'take_piece' => new AdventureActionResult(nextScene: 'grenier', stateChanges: [
                'inventory' => $this->mergeNotes((array) $state->get('inventory', []), ['pieceev']),
                'grenier_step' => 2,
            ]),
            'retour' => new AdventureActionResult(nextScene: 'grenier', stateChanges: ['grenier_step' => 0]),
            default => new AdventureActionResult(nextScene: 'grenier'),
        };
    }

    private function isManorDay(AdventureState $state): bool
    {
        return (bool) $state->get('manor_day', false)
            || (bool) $state->get('pellington_visit', false);
    }
}
