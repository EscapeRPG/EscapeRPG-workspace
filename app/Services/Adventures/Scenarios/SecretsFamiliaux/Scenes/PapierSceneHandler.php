<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class PapierSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'papier_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((int) $state->get('papier_step', 0) === 1) {
            return 'stored';
        }

        if (in_array('papier', (array) $state->get('inventory', []), true)) {
            return 'found';
        }

        if (!(bool) $state->get('coffret_opened', false)) {
            return 'missing';
        }

        return 'open';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'take_paper' => $this->takePaper($state),
            'retour' => new AdventureActionResult(nextScene: 'rdc', stateChanges: [
                'papier_step' => 0,
            ]),
            default => new AdventureActionResult(nextScene: 'papier'),
        };
    }

    private function takePaper(AdventureState $state): AdventureActionResult
    {
        if (!(bool) $state->get('coffret_opened', false)) {
            return new AdventureActionResult(nextScene: 'papier');
        }

        return new AdventureActionResult(nextScene: 'papier', stateChanges: [
            'papier_step' => 1,
            'coffret_opened' => false,
            'inventory' => $this->mergeNotes(
                $this->removeInventoryItems((array) $state->get('inventory', []), ['coffret', 'piecedi', 'piecepo', 'pieceev', 'piecese', 'piecead']),
                ['papier', 'petitecle']
            ),
        ]);
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
