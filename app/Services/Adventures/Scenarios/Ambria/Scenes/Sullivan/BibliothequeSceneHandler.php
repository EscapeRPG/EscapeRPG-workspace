<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class BibliothequeSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'continue_louis' => new AdventureActionResult(nextScene: 'sullivan_bibliotheque', stateChanges: ['sullivan_bibliotheque_variant' => 'louis']),
            'continue_louis_fight' => new AdventureActionResult(nextScene: 'sullivan_bibliotheque', stateChanges: ['sullivan_bibliotheque_variant' => 'louis_fight']),
            'continue_backyard' => new AdventureActionResult(nextScene: 'sullivan_bibliotheque', stateChanges: ['sullivan_bibliotheque_variant' => 'backyard']),
            'inspect_purse' => $this->inspectPurse($state, $request),
            'take_purse' => $this->takePurse($state),
            'meet_logan' => new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'logan_search']),
            default => parent::handle($config, $state, $request),
        };
    }

    private function inspectPurse(AdventureState $state, Request $request): AdventureActionResult
    {
        $success = $this->normalizeInput((string) $request->post('look', '')) === 'bourseencuir';

        if (!$success) {
            return new AdventureActionResult(nextScene: 'sullivan_bibliotheque', stateChanges: ['sullivan_bibliotheque_variant' => 'wrong_purse']);
        }

        return new AdventureActionResult(
            nextScene: 'sullivan_bibliotheque',
            stateChanges: [
                'sullivan_bibliotheque_variant' => 'purse_found',
                'bourse' => true,
                'inventory' => $this->mergeInventory($state, ['bourse']),
            ],
        );
    }

    private function takePurse(AdventureState $state): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'sullivan_bibliotheque',
            stateChanges: [
                'sullivan_bibliotheque_variant' => 'fire',
                'bourse' => true,
                'inventory' => $this->mergeInventory($state, ['bourse']),
            ],
        );
    }
}
