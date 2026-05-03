<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class ChambresSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'chambres_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') !== 'dormir') {
            return new AdventureActionResult(nextScene: 'chambres');
        }

        return new AdventureActionResult(
            nextScene: !empty($state->get('manor_day', false)) ? 'nuit' : 'jour2',
        );
    }
}
