<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class BureauPriveSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'bureauprive_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $step = (int) $state->get('bureauprive_step', 0);
        if ($step > 0) {
            return 'step_' . $step;
        }

        if ($this->hasPnakotiques($state) && !(bool) $state->get('bureauprive_tiroir_opened', false)) {
            return 'pnakotiques_found';
        }

        if ((bool) $state->get('bureauprive_tiroir_opened', false)) {
            return $this->hasPnakotiques($state) || !(bool) $state->get('chiens_sauves_fin', false)
                ? 'done'
                : 'tiroir_opened';
        }

        return 'step_0';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'tiroir' => new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
                'bureauprive_step' => 1,
            ]),
            'unlock_tiroir' => $this->unlockTiroir($state, $request),
            'take_journal' => new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
                'bureauprive_step' => 0,
                'bureauprive_tiroir_opened' => true,
                'inventory' => $this->mergeNotes((array) $state->get('inventory', []), ['journal1', 'journal3', 'journal4']),
            ]),
            'search_library' => $this->searchLibrary($state, $request),
            'take_pnakotiques' => new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
                'bureauprive_step' => 0,
                'bureauprive_pnakotiques_found' => true,
                'inventory' => $this->mergeNotes((array) $state->get('inventory', []), ['pnakotiques', 'pnakotiquesnotes']),
            ]),
            'go_back' => new AdventureActionResult(nextScene: 'bureauprive2'),
            default => new AdventureActionResult(nextScene: 'bureauprive'),
        };
    }

    private function unlockTiroir(AdventureState $state, Request $request): AdventureActionResult
    {
        $inventory = (array) $state->get('inventory', []);
        if (!in_array('petitecle', $inventory, true)
            || !$this->inputMatches((string) $request->post('petitecle', ''), 'tirlitke')) {
            return new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
                'bureauprive_step' => 2,
            ]);
        }

        return new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
            'bureauprive_step' => 3,
        ]);
    }

    private function searchLibrary(AdventureState $state, Request $request): AdventureActionResult
    {
        if (!(bool) $state->get('chiens_sauves_fin', false)) {
            return new AdventureActionResult(nextScene: 'bureauprive');
        }

        if (!$this->inputMatches((string) $request->post('fouiller', ''), 'cerclerituel')) {
            return new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
                'bureauprive_step' => 4,
            ]);
        }

        return new AdventureActionResult(nextScene: 'bureauprive', stateChanges: [
            'bureauprive_step' => 5,
        ]);
    }

    private function hasPnakotiques(AdventureState $state): bool
    {
        return in_array('pnakotiques', (array) $state->get('inventory', []), true)
            || (bool) $state->get('bureauprive_pnakotiques_found', false);
    }
}
