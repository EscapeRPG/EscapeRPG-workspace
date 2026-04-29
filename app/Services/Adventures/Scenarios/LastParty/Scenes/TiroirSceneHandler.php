<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gere la recuperation du carnet dans le tiroir.
 */
class TiroirSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (bool) $state->get('carnet_acquired', false)
            ? 'acquired'
            : 'found';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'carnetAcquired' => (bool) $state->get('carnet_acquired', false),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'take_notebook') {
            $inventory = $state->get('inventory', []);
            if (!is_array($inventory)) {
                $inventory = [];
            }

            if (!in_array('carnet', $inventory, true)) {
                $inventory[] = 'carnet';
            }

            return new AdventureActionResult(
                nextScene: 'tiroir',
                stateChanges: [
                    'carnet_acquired' => true,
                    'inventory' => $inventory,
                ],
            );
        }

        if ($action === 'back_to_room') {
            return new AdventureActionResult(nextScene: 'appartement');
        }

        return new AdventureActionResult(nextScene: 'tiroir');
    }
}
