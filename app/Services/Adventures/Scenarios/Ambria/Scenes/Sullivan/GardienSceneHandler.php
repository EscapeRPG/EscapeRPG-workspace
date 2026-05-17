<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class GardienSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'submit_attention' => $this->handleAttention($request),
            'start_combat' => new AdventureActionResult(
                nextScene: 'sullivan_gardien',
                stateChanges: ['sullivan_gardien_variant' => 'combat_start', 'combat' => true],
            ),
            'choose_golem_1' => $this->handleFirstShot($state, true),
            'choose_golem_2', 'choose_golem_3' => $this->handleFirstShot($state, false),
            'continue_climb_support' => new AdventureActionResult(
                nextScene: 'sullivan_gardien',
                stateChanges: ['sullivan_gardien_variant' => 'climb_support', 'combat2' => true],
            ),
            'submit_maintenant' => $this->handleMaintenant($request),
            'continue_final_shot' => new AdventureActionResult(
                nextScene: 'sullivan_gardien',
                stateChanges: ['sullivan_gardien_variant' => 'final_shot', 'combat3' => true],
            ),
            'choose_final_golem_1', 'choose_final_golem_2', 'choose_final_golem_3', 'choose_final_golem_4', 'choose_final_golem_5'
                => $this->handleFinalShot($state, $action),
            'continue_finish_success' => new AdventureActionResult(
                nextScene: 'sullivan_gardien',
                stateChanges: ['sullivan_gardien_variant' => 'finish_success'],
            ),
            'continue_finish_failure' => new AdventureActionResult(
                nextScene: 'sullivan_gardien',
                stateChanges: ['sullivan_gardien_variant' => 'finish_failure'],
            ),
            'enter_pyramide' => new AdventureActionResult(
                nextScene: 'sullivan_pyramide',
                stateChanges: ['sullivan_pyramide_variant' => 'entry'],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleAttention(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('attention', ''));

        return new AdventureActionResult(
            nextScene: 'sullivan_gardien',
            stateChanges: [
                'sullivan_gardien_variant' => $answer === 'ilabouge' ? 'awakening' : 'wrong_attention',
            ],
        );
    }

    private function handleFirstShot(AdventureState $state, bool $success): AdventureActionResult
    {
        $stateChanges = [
            'sullivan_gardien_variant' => $success ? 'first_hit_success' : 'first_hit_failure',
            'combat2' => true,
        ];

        if (!$success) {
            $stateChanges['sullivanconfiance'] = (int) $state->get('sullivanconfiance', 100) - 10;
        }

        return new AdventureActionResult(nextScene: 'sullivan_gardien', stateChanges: $stateChanges);
    }

    private function handleMaintenant(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('ecouter', ''));

        return new AdventureActionResult(
            nextScene: 'sullivan_gardien',
            stateChanges: [
                'sullivan_gardien_variant' => $answer === 'maintenant' ? 'final_setup' : 'wrong_maintenant',
            ],
        );
    }

    private function handleFinalShot(AdventureState $state, string $action): AdventureActionResult
    {
        $success = $action === 'choose_final_golem_4';
        $stateChanges = [
            'sullivan_gardien_variant' => $success ? 'final_success' : 'final_failure',
            'combat3' => true,
        ];

        if (!$success) {
            $stateChanges['sullivanconfiance'] = (int) $state->get('sullivanconfiance', 100) - 20;
        }

        return new AdventureActionResult(
            nextScene: 'sullivan_gardien',
            stateChanges: $stateChanges,
            achievements: [['scenario' => 'ambria', 'name' => 'gardien']],
        );
    }
}
