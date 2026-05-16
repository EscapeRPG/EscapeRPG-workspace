<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class PlageSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $variant = parent::variant($state, $request, $isLandingPage);

        if ($variant !== 'entry') {
            return $variant;
        }

        if ((bool) $state->get('portescite', false)) {
            return 'portescite_return';
        }

        return ((bool) $state->get('matcasse', false) || (bool) $state->get('quillecassee', false))
            ? 'damaged_arrival'
            : 'clean_arrival';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'continue_arrival' => new AdventureActionResult(nextScene: 'sullivan_plage', stateChanges: ['sullivan_plage_variant' => 'search_intro', 'ile' => true]),
            'continue_grottes_intro' => new AdventureActionResult(nextScene: 'sullivan_plage', stateChanges: ['sullivan_plage_variant' => 'grottes_intro']),
            'continue_grottes_puzzle' => new AdventureActionResult(nextScene: 'sullivan_plage', stateChanges: ['sullivan_plage_variant' => 'grottes_puzzle', 'grottesenigme' => true]),
            'retry_grottes' => new AdventureActionResult(nextScene: 'sullivan_plage', stateChanges: ['sullivan_plage_variant' => 'grottes_puzzle', 'grottesenigme' => true]),
            'enter_grottes' => new AdventureActionResult(
                nextScene: 'sullivan_grottestorchesallumees',
                stateChanges: ['sullivan_grottestorchesallumees_variant' => 'entry', 'torcheseteintes' => false],
            ),
            'choose_grotte_1' => $this->handleGrotteChoice($state, 1),
            'choose_grotte_2' => $this->handleGrotteChoice($state, 2),
            'choose_grotte_3' => $this->handleGrotteChoice($state, 3),
            'choose_grotte_4' => $this->handleGrotteChoice($state, 4),
            'choose_grotte_5' => $this->handleGrotteChoice($state, 5),
            'choose_grotte_6' => $this->handleGrotteChoice($state, 6),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleGrotteChoice(AdventureState $state, int $grotte): AdventureActionResult
    {
        if ($grotte === 4) {
            return new AdventureActionResult(
                nextScene: 'sullivan_plage',
                stateChanges: [
                    'sullivan_plage_variant' => 'grotte_success',
                    'grottesenigme' => false,
                    'torcheseteintes' => false,
                ],
                achievements: (bool) $state->get('pertehomme', false) ? [] : [['scenario' => 'ambria', 'name' => 'prudence']],
            );
        }

        return new AdventureActionResult(
            nextScene: 'sullivan_plage',
            stateChanges: [
                'sullivan_plage_variant' => 'wrong_grotte_' . $grotte,
                'grottesenigme' => true,
                'pertehomme' => true,
                'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) - 20,
            ],
        );
    }
}
