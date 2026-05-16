<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class EmbarquementSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'knots_success') {
            return new AdventureActionResult(
                nextScene: 'logan_flots',
                stateChanges: [
                    'logan_flots_variant' => 'success',
                    'ambriasurlesflots' => true,
                    'flots' => true,
                    'loganconfiance' => (int) $state->get('loganconfiance', 0) + 10,
                ],
            );
        }

        if ($action === 'knots_failure') {
            return new AdventureActionResult(
                nextScene: 'logan_flots',
                stateChanges: [
                    'logan_flots_variant' => 'failure',
                    'ambriasurlesflots' => true,
                    'flots' => true,
                ],
            );
        }

        if ($action === 'board_ship') {
            $confidence = (int) $state->get('loganconfiance', 0);
            $variant = match ($confidence) {
                10 => 'board_10',
                20 => 'board_20',
                30 => 'board_30',
                default => 'board_other',
            };

            return new AdventureActionResult(
                nextScene: 'logan_embarquement',
                stateChanges: ['logan_embarquement_variant' => $variant],
            );
        }

        return parent::handle($config, $state, $request);
    }
}
