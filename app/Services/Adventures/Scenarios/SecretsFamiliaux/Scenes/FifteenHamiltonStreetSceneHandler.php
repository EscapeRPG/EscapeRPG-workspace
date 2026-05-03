<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class FifteenHamiltonStreetSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'manoir_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('manoir_keys', false)) {
            return 'step_3';
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'suivant' => new AdventureActionResult(
                nextScene: '15hamiltonstreet',
                stateChanges: [
                    'manoir_step' => 1,
                ],
            ),
            'suivant2' => new AdventureActionResult(
                nextScene: '15hamiltonstreet',
                stateChanges: [
                    'manoir_step' => 2,
                ],
            ),
            'suivre' => new AdventureActionResult(
                nextScene: '15hamiltonstreet',
                stateChanges: [
                    'manoir_step' => 3,
                    'manoir_keys' => true,
                ],
            ),
            'cle4' => new AdventureActionResult(nextScene: 'manoirint'),
            'cle1', 'cle2', 'cle3', 'cle5' => new AdventureActionResult(nextScene: 'manor'),
            default => new AdventureActionResult(nextScene: '15hamiltonstreet'),
        };
    }
}
