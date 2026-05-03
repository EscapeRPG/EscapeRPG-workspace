<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class ManoirIntSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'manoirint_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'suivant' => new AdventureActionResult(
                nextScene: 'manoirint',
                stateChanges: [
                    'manoirint_step' => 1,
                ],
                achievements: [
                    ['scenario' => 'secretsfamiliaux', 'name' => 'manoir'],
                ],
            ),
            'tour' => new AdventureActionResult(nextScene: 'rdc'),
            'dormir' => new AdventureActionResult(nextScene: 'jour2'),
            default => new AdventureActionResult(nextScene: 'manoirint'),
        };
    }
}
