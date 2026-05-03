<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class ChenilSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'chenil_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('chiens_sauves', false) || (bool) $state->get('chiens_sauves_fin', false)) {
            return 'saved';
        }

        $step = (int) $state->get('chenil_step', 0);
        if ($step > 0) {
            return 'step_' . $step;
        }

        if ((bool) $state->get('chiens_empoisonnes', false)) {
            if (!(bool) $state->get('chiens_poisoning_discovered', false)) {
                return 'discovery';
            }

            return 'poisoned';
        }

        if ((bool) $state->get('intrusion_done', false)) {
            return 'intrusion';
        }

        return 'step_0';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');
        if ($action === 'follow_gaspard') {
            return new AdventureActionResult(nextScene: 'maisongaspard');
        }

        if ($action === 'poisoning_understood') {
            return new AdventureActionResult(nextScene: 'rdc', stateChanges: [
                'chiens_poisoning_discovered' => true,
            ]);
        }

        if ($action !== 'soigner') {
            return new AdventureActionResult(nextScene: 'chenil');
        }

        $inventory = (array) $state->get('inventory', []);
        $answer = (string) $request->post('antidote', '');
        if (!$this->inputMatches($answer, 'analeptique') || !in_array('analeptique', $inventory, true)) {
            return new AdventureActionResult(nextScene: 'chenil', stateChanges: [
                'chenil_step' => 1,
                'chiens_poisoning_discovered' => true,
            ]);
        }

        return new AdventureActionResult(
            nextScene: 'chenil',
            stateChanges: [
                'chenil_step' => 2,
                'chiens_malades' => false,
                'chiens_empoisonnes' => false,
                'chiens_poisoning_discovered' => true,
                'chiens_sauves' => true,
                'inventory' => $this->removeInventoryItems($inventory, ['analeptique']),
            ],
            achievements: [
                ['scenario' => 'secretsfamiliaux', 'name' => 'chiens'],
            ],
        );
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
