<?php

namespace App\Services\Adventures\Scenarios\Gaea1\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class IndexSceneHandler extends Gaea1SceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'access_code') {
            $valid = $this->normalizeInput((string) $request->post('betamdp', '')) === 'fsb12em';

            return new AdventureActionResult(
                nextScene: 'index',
                stateChanges: ['index_variant' => $valid ? 'access_granted' : 'access_denied'],
            );
        }

        if ($action === 'submit_avatar') {
            return $this->submitAvatar($request);
        }

        if ($action === 'submit_identity') {
            return $this->submitIdentity($request);
        }

        if ($action === 'choose_feminine' || $action === 'choose_masculine') {
            return $this->chooseGender($action === 'choose_feminine');
        }

        return parent::handle($config, $state, $request);
    }
}
