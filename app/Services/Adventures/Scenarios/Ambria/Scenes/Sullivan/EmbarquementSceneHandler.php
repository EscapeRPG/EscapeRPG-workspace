<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class EmbarquementSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'continue_fight' => new AdventureActionResult(nextScene: 'sullivan_embarquement', stateChanges: ['sullivan_embarquement_variant' => 'combat_start']),
            'continue_fight_end' => new AdventureActionResult(nextScene: 'sullivan_embarquement', stateChanges: ['sullivan_embarquement_variant' => 'combat_end']),
            'board_ship' => $this->handleBoardShip($state),
            'enter_cabin' => new AdventureActionResult(nextScene: 'sullivan_embarquement', stateChanges: ['sullivan_embarquement_variant' => 'cabin', 'ambriacabine' => true]),
            'reset_shelf' => new AdventureActionResult(nextScene: 'sullivan_embarquement', stateChanges: ['sullivan_embarquement_variant' => 'cabin', 'ambriacabine' => true]),
            'shelf_success' => new AdventureActionResult(
                nextScene: 'sullivan_flots',
                stateChanges: [
                    'sullivan_flots_variant' => 'entry',
                    'ambriasurlesflots' => true,
                    'flots' => true,
                ],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleBoardShip(AdventureState $state): AdventureActionResult
    {
        $confidence = (int) $state->get('sullivanconfiance', 100);
        $variant = match ($confidence) {
            90 => 'board_hip',
            80 => 'board_face',
            default => 'board_face_and_hip',
        };

        return new AdventureActionResult(nextScene: 'sullivan_embarquement', stateChanges: ['sullivan_embarquement_variant' => $variant]);
    }
}
