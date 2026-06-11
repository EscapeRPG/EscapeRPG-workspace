<?php

namespace App\Services\Adventures\Scenarios\Gaea1\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class LegerrumSceneHandler extends Gaea1SceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $variant = parent::variant($state, $request, $isLandingPage);
        if (!in_array($variant, ['entry', 'revisit'], true)) {
            return $variant;
        }

        $inventory = (array) $state->get('inventory', []);
        if ((bool) $state->get('etested', false) && !in_array('energyCells', $inventory, true)) {
            return 'cells_available';
        }

        return $variant;
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') === 'take_cells') {
            return new AdventureActionResult(
                nextScene: 'legerrum',
                stateChanges: [
                    'legerrum_variant' => 'cells_taken',
                    'inventory' => $this->mergeInventory($state, ['energyCells']),
                    'oxygene' => max(0, (int) $state->get('oxygene', 100) - 10),
                ],
            );
        }

        return parent::handle($config, $state, $request);
    }
}
