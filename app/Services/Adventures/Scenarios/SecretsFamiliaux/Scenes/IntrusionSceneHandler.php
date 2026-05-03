<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class IntrusionSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'intrusion_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'suivant' => new AdventureActionResult(
                nextScene: 'intrusion',
                stateChanges: [
                    'intrusion_step' => 1,
                ],
            ),
            'tour' => new AdventureActionResult(
                nextScene: 'rdc',
                stateChanges: [
                    'intrusion_done' => true,
                ],
            ),
            'nuit' => new AdventureActionResult(
                nextScene: 'nuit',
                stateChanges: [
                    'intrusion_done' => true,
                ],
            ),
            default => new AdventureActionResult(nextScene: 'intrusion'),
        };
    }
}
