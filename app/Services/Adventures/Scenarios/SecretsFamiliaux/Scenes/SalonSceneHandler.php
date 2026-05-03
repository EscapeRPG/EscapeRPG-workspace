<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class SalonSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'salon_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((int) $state->get('salon_step', 0) === 2) {
            return 'step_2';
        }

        if ((bool) $state->get('salon_tableau_found', false)) {
            return 'found_after';
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') === 'finish_tableau') {
            return new AdventureActionResult(nextScene: 'salon', stateChanges: [
                'salon_step' => 0,
                'salon_tableau_found' => true,
            ]);
        }

        if ((string) $request->post('action', '') !== 'chercher') {
            return new AdventureActionResult(nextScene: 'salon');
        }

        if (!$this->inputMatches((string) $request->post('salon', ''), 'tableau')) {
            return new AdventureActionResult(
                nextScene: 'salon',
                stateChanges: [
                    'salon_step' => 1,
                ],
            );
        }

        return new AdventureActionResult(
            nextScene: 'salon',
            stateChanges: [
                'salon_step' => 2,
            ],
        );
    }
}
