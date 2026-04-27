<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Account\AuthService;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gère la scène d'introduction de Last Party.
 */
class IndexSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return $isLandingPage || (int) $state->get('index_step', 0) < 1
            ? 'landing'
            : 'introduction';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'step' => $isLandingPage ? 0 : (int) $state->get('index_step', 0),
            'mode' => (string) $request->query('mode', ''),
            'isLoggedIn' => AuthService::check(),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'new_game' => new AdventureActionResult(
                nextScene: 'index',
                resetState: true,
                stateChanges: [
                    'started' => true,
                    'index_step' => 1,
                    'eveil_step' => 0,
                ],
                achievements: [
                    ['scenario' => 'general', 'name' => 'debut'],
                    ['scenario' => 'lastparty', 'name' => 'debut'],
                ],
            ),
            'continue_intro' => new AdventureActionResult(nextScene: 'eveil'),
            default => new AdventureActionResult(nextScene: 'index'),
        };
    }
}
