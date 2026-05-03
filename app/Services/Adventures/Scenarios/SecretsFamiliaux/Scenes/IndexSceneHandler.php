<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

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
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'new_game' => new AdventureActionResult(
                nextScene: 'index',
                resetState: true,
                stateChanges: [
                    'started' => true,
                    'index_step' => 1,
                ],
                achievements: [
                    ['scenario' => 'general', 'name' => 'debut'],
                    ['scenario' => 'secretsfamiliaux', 'name' => 'debut'],
                ],
            ),
            'enter_cemetery' => new AdventureActionResult(nextScene: 'cimetiere'),
            default => new AdventureActionResult(nextScene: 'index'),
        };
    }
}
