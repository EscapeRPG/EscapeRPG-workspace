<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

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
            'start_gardien_combat' => new AdventureActionResult(
                nextScene: 'logan_gardien',
                stateChanges: ['logan_gardien_variant' => 'combat_start', 'combat' => true],
            ),
            'submit_epaule' => $this->handleEpaule($request),
            'climb_golem' => new AdventureActionResult(
                nextScene: 'logan_gardien',
                stateChanges: ['logan_gardien_variant' => 'climb_puzzle', 'combat2' => true],
            ),
            'submit_golem_path' => $this->handleGolemPath($state, $request),
            'continue_finish_setup' => new AdventureActionResult(
                nextScene: 'logan_gardien',
                stateChanges: ['logan_gardien_variant' => 'final_shot', 'combat3' => true],
            ),
            'submit_combat_finish' => $this->handleCombatFinish($state, $request),
            'enter_pyramide' => new AdventureActionResult(
                nextScene: 'logan_pyramide',
                stateChanges: ['logan_pyramide_variant' => 'entry'],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleEpaule(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('ecouter', ''));

        return new AdventureActionResult(
            nextScene: 'logan_gardien',
            stateChanges: [
                'logan_gardien_variant' => $answer === 'epaule' ? 'climb_intro' : 'wrong_epaule',
            ],
        );
    }

    private function handleGolemPath(AdventureState $state, Request $request): AdventureActionResult
    {
        $success = (string) $request->post('path_result', '') === 'success';
        $confidence = (int) $state->get('loganconfiance', 0);

        return new AdventureActionResult(
            nextScene: 'logan_gardien',
            stateChanges: [
                'logan_gardien_variant' => $success ? 'climb_success' : 'climb_failure',
                'combat3' => true,
                'mdp10' => true,
                'loganconfiance' => $success ? $confidence + 20 : $confidence - 20,
                'loganblesse' => $success ? (bool) $state->get('loganblesse', false) : true,
                'notes' => $this->mergeNotes($state, ['MAINTENANT']),
            ],
        );
    }

    private function handleCombatFinish(AdventureState $state, Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('combatfini', ''));
        $injured = (bool) $state->get('loganblesse', false);

        if ($answer === 'toutvabien') {
            return new AdventureActionResult(
                nextScene: 'logan_gardien',
                stateChanges: [
                    'logan_gardien_variant' => $injured ? 'final_success_injured' : 'final_success',
                ],
                achievements: [['scenario' => 'ambria', 'name' => 'gardien']],
            );
        }

        if ($answer === 'riendecasse') {
            return new AdventureActionResult(
                nextScene: 'logan_gardien',
                stateChanges: [
                    'logan_gardien_variant' => $injured ? 'final_failure_injured' : 'final_failure',
                ],
                achievements: [['scenario' => 'ambria', 'name' => 'gardien']],
            );
        }

        return new AdventureActionResult(
            nextScene: 'logan_gardien',
            stateChanges: ['logan_gardien_variant' => 'wrong_final'],
        );
    }
}
