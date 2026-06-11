<?php

namespace App\Services\Adventures\Scenarios\Gaea1\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class SykkerumSceneHandler extends Gaea1SceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'observe_command_deck' => new AdventureActionResult(
                nextScene: 'komunodek',
                stateChanges: [
                    'komunodek_variant' => $this->commandDeckVariant($state),
                    'etested' => true,
                    'plancurrent' => null,
                ],
            ),
            'documents' => new AdventureActionResult(
                nextScene: 'sykkerum',
                stateChanges: ['sykkerum_variant' => 'documents'],
            ),
            'inspect_locker' => new AdventureActionResult(
                nextScene: 'sykkerum',
                stateChanges: ['sykkerum_variant' => 'locker'],
            ),
            'take_pass' => new AdventureActionResult(
                nextScene: 'sykkerum',
                stateChanges: [
                    'sykkerum_variant' => 'pass_taken',
                    'inventory' => $this->mergeInventory($state, ['deckPass']),
                ],
            ),
            'return_search' => new AdventureActionResult(
                nextScene: 'sykkerum',
                stateChanges: ['sykkerum_variant' => 'search'],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function commandDeckVariant(AdventureState $state): string
    {
        $inventory = (array) $state->get('inventory', []);
        $hasPass = in_array('deckPass', $inventory, true);
        $hasCells = in_array('energyCells', $inventory, true);

        if ((bool) $state->get('deckpanel', false) && $hasPass) {
            return 'ready_pass_after_panel';
        }

        if ($hasPass && $hasCells) {
            return 'ready_to_open';
        }

        if ($hasCells) {
            return 'ready_cells_only';
        }

        if ($hasPass) {
            return 'needs_cells';
        }

        return 'door_no_items';
    }
}
