<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class GrottesSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ($this->scene === 'sullivan_grottestorcheseteintes') {
            $state->merge(['torcheseteintes' => true]);
        }

        if ($this->scene === 'sullivan_grottestorchesallumees' && (bool) $state->get('portescite', false)) {
            return 'portescite_return';
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'continue_lueur' => new AdventureActionResult(nextScene: 'sullivan_grottestorchesallumees', stateChanges: ['sullivan_grottestorchesallumees_variant' => 'lueur', 'grottes' => true]),
            'go_portescite' => new AdventureActionResult(nextScene: 'sullivan_portescite', stateChanges: ['sullivan_portescite_variant' => 'arrival']),
            default => parent::handle($config, $state, $request),
        };
    }
}
