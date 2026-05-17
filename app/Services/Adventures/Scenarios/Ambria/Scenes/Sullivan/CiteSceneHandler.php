<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class CiteSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'submit_enavant' => $this->handleEnAvant($request),
            'continue_city' => new AdventureActionResult(
                nextScene: 'sullivan_cite',
                stateChanges: ['sullivan_cite_variant' => 'walk_palace'],
            ),
            'observe_gardien' => new AdventureActionResult(
                nextScene: 'sullivan_gardien',
                stateChanges: ['sullivan_gardien_variant' => 'entry'],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleEnAvant(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('enavant', ''));

        return new AdventureActionResult(
            nextScene: 'sullivan_cite',
            stateChanges: [
                'sullivan_cite_variant' => $answer === 'allonsycapitaine' ? 'logan_answer' : 'wrong_enavant',
            ],
        );
    }
}
