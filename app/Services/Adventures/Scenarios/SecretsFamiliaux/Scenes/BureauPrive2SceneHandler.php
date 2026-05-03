<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class BureauPrive2SceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'bureauprive2_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('electricity_restored', false) || (bool) $state->get('masse_active', false)) {
            if ((bool) $state->get('bureauprive2_trappe_opened', false)) {
                return 'after_cuves_opened';
            }

            return 'after_cuves';
        }

        if ((bool) $state->get('cavesecrete_visited', false)) {
            return 'after_descent';
        }

        $step = (int) $state->get('bureauprive2_step', 0);
        if ($step > 0) {
            return 'step_' . $step;
        }

        if ((bool) $state->get('bureauprive2_trappe_opened', false)) {
            return 'trappe_opened';
        }

        if ((bool) $state->get('bureauprive2_trappe_found', false)) {
            return 'trappe_found';
        }

        return 'step_0';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'reveal_trappe' => new AdventureActionResult(nextScene: 'bureauprive2', stateChanges: [
                'bureauprive2_trappe_found' => true,
                'bureauprive2_step' => 1,
            ]),
            'inspect_trappe' => new AdventureActionResult(nextScene: 'bureauprive2', stateChanges: [
                'bureauprive2_step' => 2,
            ]),
            'unlock_trappe' => $this->unlockTrappe($state, $request),
            'open_trappe' => new AdventureActionResult(nextScene: 'bureauprive2', stateChanges: [
                'bureauprive2_step' => 0,
            ]),
            'descend' => new AdventureActionResult(nextScene: 'cavesecrete', stateChanges: [
                'bureauprive2_step' => 0,
                'cavesecrete_visited' => true,
            ]),
            'pull_lever' => new AdventureActionResult(nextScene: 'courtcircuit', stateChanges: [
                'bureauprive2_step' => 0,
            ]),
            'refuse_lever' => $this->refuseLever($state),
            default => new AdventureActionResult(nextScene: 'bureauprive2'),
        };
    }

    private function unlockTrappe(AdventureState $state, Request $request): AdventureActionResult
    {
        $inventory = (array) $state->get('inventory', []);
        if (!in_array('oldcle', $inventory, true)
            || !$this->inputMatches((string) $request->post('cadenas', ''), 'vieillecle')) {
            return new AdventureActionResult(nextScene: 'bureauprive2', stateChanges: [
                'bureauprive2_step' => 3,
            ]);
        }

        return new AdventureActionResult(
            nextScene: 'bureauprive2',
            stateChanges: [
                'bureauprive2_trappe_opened' => true,
                'bureauprive2_trappe_found' => true,
                'bureauprive2_step' => 4,
                'inventory' => $this->removeInventoryItems((array) $state->get('inventory', []), ['oldcle']),
            ],
            achievements: [
                ['scenario' => 'secretsfamiliaux', 'name' => 'passage'],
            ],
        );
    }

    private function refuseLever(AdventureState $state): AdventureActionResult
    {
        $step = match (true) {
            (bool) $state->get('bureauprive2_trappe_opened', false) => 8,
            default => 5,
        };

        return new AdventureActionResult(nextScene: 'bureauprive2', stateChanges: [
            'bureauprive2_refus' => true,
            'bureauprive2_step' => $step,
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
