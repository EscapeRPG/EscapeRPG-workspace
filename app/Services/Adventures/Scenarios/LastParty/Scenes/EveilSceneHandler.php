<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gère la scène d'éveil de Last Party.
 */
class EveilSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (int) $state->get('eveil_step', 0) < 1
            ? 'introduction'
            : 'room';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'step' => (int) $state->get('eveil_step', 0),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'continue_intro' => new AdventureActionResult(
                nextScene: 'eveil',
                stateChanges: ['eveil_step' => 1],
            ),
            'open_phone' => new AdventureActionResult(
                nextScene: 'eveil',
                flashMessage: "La scène du téléphone n'est pas encore migrée dans le framework.",
                flashType: 'info',
            ),
            default => new AdventureActionResult(nextScene: 'eveil'),
        };
    }
}
