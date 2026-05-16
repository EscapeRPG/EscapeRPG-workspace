<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class DocksSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('ambriapaul', false)) {
            return (string) $state->get('sullivan_docks_variant', 'rumors_with_paul');
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'validate_rumors' => $this->handleRumors($request),
            'retry_rumors' => new AdventureActionResult(nextScene: 'sullivan_docks', stateChanges: ['sullivan_docks_variant' => 'rumors_with_paul']),
            'enter_library' => new AdventureActionResult(
                nextScene: 'sullivan_bibliotheque',
                stateChanges: ['sullivan_bibliotheque_variant' => 'entry', 'ambriabibliotheque' => true],
                achievements: [['scenario' => 'ambria', 'name' => 'carte']],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleRumors(Request $request): AdventureActionResult
    {
        $who = $this->normalizeInput((string) $request->post('qui', ''));
        $where = $this->normalizeInput((string) $request->post('ou', ''));

        if ($who === 'louis' && $where === 'bibliotheque') {
            return new AdventureActionResult(nextScene: 'sullivan_docks', stateChanges: ['sullivan_docks_variant' => 'rumors_success']);
        }

        return new AdventureActionResult(nextScene: 'sullivan_docks', stateChanges: ['sullivan_docks_variant' => 'rumors_failure']);
    }
}
