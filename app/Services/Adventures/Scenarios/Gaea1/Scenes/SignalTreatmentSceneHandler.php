<?php

namespace App\Services\Adventures\Scenarios\Gaea1\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class SignalTreatmentSceneHandler extends Gaea1SceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') === 'validate_treatment') {
            $success = (int) $request->post('onde', 6) === 0 && (int) $request->post('amplitude', -3) === 0;

            return new AdventureActionResult(
                nextScene: 'signalt',
                stateChanges: ['signalt_variant' => $success ? 'success' : 'failure'],
                achievements: $success ? [['scenario' => 'gaea1', 'name' => 'signal']] : [],
            );
        }

        return parent::handle($config, $state, $request);
    }
}
