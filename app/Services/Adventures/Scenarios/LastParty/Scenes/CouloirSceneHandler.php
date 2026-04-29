<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gere la carte de visite trouvee dans le couloir.
 */
class CouloirSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (bool) $state->get('business_card_acquired', false)
            ? 'contact'
            : 'card';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'businessCardAcquired' => (bool) $state->get('business_card_acquired', false),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'take_card') {
            $inventory = $state->get('inventory', []);
            if (!is_array($inventory)) {
                $inventory = [];
            }

            if (!in_array('cartevisite', $inventory, true)) {
                $inventory[] = 'cartevisite';
            }

            return new AdventureActionResult(
                nextScene: 'couloir',
                stateChanges: [
                    'business_card_acquired' => true,
                    'inventory' => $inventory,
                ],
                achievements: [
                    ['scenario' => 'lastparty', 'name' => 'carte'],
                ],
            );
        }

        return new AdventureActionResult(nextScene: 'couloir');
    }
}
