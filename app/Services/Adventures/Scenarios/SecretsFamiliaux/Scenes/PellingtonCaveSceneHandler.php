<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class PellingtonCaveSceneHandler extends SimpleSceneHandler
{
    private const string SCENE = 'pellingtoncave';

    public function __construct()
    {
        parent::__construct(stepKey: 'pellington_cave_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((int) $state->get('pellington_cave_step', 0) === 2) {
            return 'finished';
        }

        if ((bool) $state->get('pellington_visit', false)) {
            return 'done';
        }

        return match ((int) $state->get('pellington_cave_step', 0)) {
            1 => 'piece',
            default => 'step_0',
        };
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $inventory = (array) $state->get('inventory', []);
        $notes = (array) $state->get('notes', []);

        return match ((string) $request->post('action', '')) {
            'take_aveux' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_cave_step' => 1,
                'inventory' => $this->mergeNotes($inventory, ['aveux']),
                'notes' => $this->mergeNotes($notes, ['Opus favori', 'Tableau']),
            ]),
            'take_piece' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_cave_step' => 2,
                'pellington_visit' => true,
                'inventory' => $this->mergeNotes($inventory, ['piecese']),
            ]),
            'return_manor' => new AdventureActionResult(nextScene: 'rdc'),
            default => new AdventureActionResult(nextScene: self::SCENE),
        };
    }
}
