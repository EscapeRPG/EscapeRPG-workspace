<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class MarcheSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') !== 'ask_bernard') {
            return parent::handle($config, $state, $request);
        }

        $success = $this->normalizeInput((string) $request->post('bernard', '')) === 'bernard';

        return new AdventureActionResult(
            nextScene: 'sullivan_marche',
            stateChanges: ['sullivan_marche_variant' => $success ? 'bernard' : 'wrong_bernard'],
        );
    }
}
