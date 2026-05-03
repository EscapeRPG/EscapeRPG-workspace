<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class CuvesSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'cuves_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'pull_lever' => new AdventureActionResult(nextScene: 'cuves', stateChanges: [
                'cuves_step' => 1,
                'cuves_seen' => true,
            ]),
            'observe' => new AdventureActionResult(nextScene: 'cuves', stateChanges: [
                'cuves_step' => 2,
                'cuves_seen' => true,
                'masse_active' => true,
            ]),
            'stop' => new AdventureActionResult(nextScene: 'cuves', stateChanges: [
                'cuves_step' => 3,
                'cuves_seen' => true,
            ]),
            'retour' => new AdventureActionResult(nextScene: 'bureauprive2'),
            default => new AdventureActionResult(nextScene: 'cuves'),
        };
    }
}
