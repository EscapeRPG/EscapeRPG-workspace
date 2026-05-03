<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class BureauSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'bureau_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'symbole' => new AdventureActionResult(nextScene: 'bureau', stateChanges: [
                'bureau_step' => 1,
            ]),
            'ouvrir' => $this->inputMatches((string) $request->post('phr', ''), 'leclaireouvrelechemin')
                ? new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
                    'bureau_step' => 2,
                    'bureau_private_unlocked' => true,
                    'inventory' => $this->removeInventoryItems((array) $state->get('inventory', []), ['templar', 'papier']),
                ], achievements: [
                    ['scenario' => 'secretsfamiliaux', 'name' => 'bureau'],
                ])
                : new AdventureActionResult(nextScene: 'bureau', stateChanges: [
                    'bureau_step' => 3,
                ]),
            default => new AdventureActionResult(nextScene: 'bureau'),
        };
    }

    /**
     * @param array<int, string> $inventory
     * @param array<int, string> $items
     * @return array<int, string>
     */
    private function removeInventoryItems(array $inventory, array $items): array
    {
        return array_values(array_filter(
            $inventory,
            static fn (string $item): bool => !in_array($item, $items, true)
        ));
    }
}
