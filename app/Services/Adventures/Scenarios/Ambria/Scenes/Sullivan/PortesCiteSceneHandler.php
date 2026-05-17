<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class PortesCiteSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $variant = parent::variant($state, $request, $isLandingPage);

        if ($variant !== 'arrival') {
            return $variant;
        }

        return (bool) $state->get('portesciteenigme', false) ? 'puzzle' : 'arrival';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'search_porte' => new AdventureActionResult(
                nextScene: 'sullivan_portescite',
                stateChanges: ['sullivan_portescite_variant' => 'tablet', 'portescite' => true],
            ),
            'take_tablet' => new AdventureActionResult(
                nextScene: 'sullivan_portescite',
                stateChanges: [
                    'sullivan_portescite_variant' => 'tablet_taken',
                    'tablette' => true,
                    'inventory' => $this->mergeInventory($state, ['tablette']),
                ],
            ),
            'observe_porte' => new AdventureActionResult(
                nextScene: 'sullivan_portescite',
                stateChanges: ['sullivan_portescite_variant' => 'puzzle', 'portesciteenigme' => true],
            ),
            'open_sullivan_cite' => new AdventureActionResult(
                nextScene: 'sullivan_cite',
                stateChanges: ['sullivan_cite_variant' => 'entry', 'ile' => false],
                achievements: [['scenario' => 'ambria', 'name' => 'ambria']],
            ),
            default => parent::handle($config, $state, $request),
        };
    }
}
