<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class PellingtonSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'pellington_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'suivant' => new AdventureActionResult(
                nextScene: '107parkavenue',
                stateChanges: [
                    'pellington_step' => 1,
                ],
            ),
            'suivant2' => new AdventureActionResult(
                nextScene: '107parkavenue',
                stateChanges: [
                    'pellington_step' => 2,
                ],
                achievements: [
                    ['scenario' => 'secretsfamiliaux', 'name' => 'pellington'],
                ],
            ),
            'tour' => new AdventureActionResult(nextScene: 'pellingtonrdc'),
            default => new AdventureActionResult(nextScene: '107parkavenue'),
        };
    }
}
