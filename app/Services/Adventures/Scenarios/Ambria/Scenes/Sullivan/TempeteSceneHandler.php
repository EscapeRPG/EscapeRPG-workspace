<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class TempeteSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'avoid_storm' => new AdventureActionResult(nextScene: 'sullivan_tempete', stateChanges: ['sullivan_tempete_variant' => 'avoid_storm']),
            'face_storm' => new AdventureActionResult(
                nextScene: 'sullivan_tempete',
                stateChanges: [
                    'sullivan_tempete_variant' => 'face_storm',
                    'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) - 20,
                ],
            ),
            'continue_storm' => new AdventureActionResult(nextScene: 'sullivan_tempete', stateChanges: ['sullivan_tempete_variant' => 'storm']),
            'order_affale' => new AdventureActionResult(
                nextScene: 'sullivan_tempete',
                stateChanges: [
                    'sullivan_tempete_variant' => 'affale',
                    'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) - 40,
                    'matcasse' => true,
                ],
            ),
            'order_ferle' => new AdventureActionResult(nextScene: 'sullivan_tempete', stateChanges: ['sullivan_tempete_variant' => 'ferle']),
            'submit_vigie' => $this->handleVigie($state, (string) $request->post('vigie', '')),
            'continue_barrels' => new AdventureActionResult(nextScene: 'sullivan_tempete', stateChanges: ['sullivan_tempete_variant' => 'barrels']),
            'save_rhum' => $this->handleBarrelChoice($state, 'rhum', 10),
            'save_riz' => $this->handleBarrelChoice($state, 'riz', -10),
            'continue_recifs' => new AdventureActionResult(nextScene: 'sullivan_tempete', stateChanges: ['sullivan_tempete_variant' => 'recifs', 'recifs' => true, 'recifs_step' => 1, 'etatquille' => 100]),
            'recif_1', 'recif_2', 'recif_3', 'recif_4', 'recif_5' => $this->handleRecif($state, (int) substr($action, -1)),
            'finish_tempete' => $this->handleFinish($state),
            'start_plage' => new AdventureActionResult(nextScene: 'sullivan_plage', stateChanges: ['sullivan_plage_variant' => 'entry']),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleVigie(AdventureState $state, string $answer): AdventureActionResult
    {
        return match ($this->normalizeInput($answer)) {
            'scelerateababord' => new AdventureActionResult(
                nextScene: 'sullivan_tempete',
                stateChanges: [
                    'sullivan_tempete_variant' => 'wave_babord',
                    'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) + 20,
                ],
            ),
            'scelerateatribord' => new AdventureActionResult(
                nextScene: 'sullivan_tempete',
                stateChanges: [
                    'sullivan_tempete_variant' => 'wave_tribord',
                    'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) + 10,
                ],
            ),
            default => new AdventureActionResult(
                nextScene: 'sullivan_tempete',
                stateChanges: [
                    'sullivan_tempete_variant' => 'wave_failure',
                    'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) - 20,
                ],
            ),
        };
    }

    private function handleBarrelChoice(AdventureState $state, string $barrel, int $confidenceDelta): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'sullivan_tempete',
            stateChanges: [
                'sullivan_tempete_variant' => 'recifs_intro',
                $barrel => true,
                'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) + $confidenceDelta,
            ],
        );
    }

    private function handleRecif(AdventureState $state, int $choice): AdventureActionResult
    {
        $step = (int) $state->get('recifs_step', 1);
        $expected = [1 => 2, 2 => 5, 3 => 3, 4 => 4][$step] ?? 2;
        $success = $choice === $expected;
        $etatQuille = (int) $state->get('etatquille', 100) + ($success ? 0 : -50);
        $nextStep = $step + 1;

        return new AdventureActionResult(
            nextScene: 'sullivan_tempete',
            stateChanges: [
                'sullivan_tempete_variant' => 'recif_' . $step . ($success ? '_success' : '_failure'),
                'recifs' => $nextStep <= 4,
                'recifs_step' => $nextStep,
                'etatquille' => $etatQuille,
            ],
        );
    }

    private function handleFinish(AdventureState $state): AdventureActionResult
    {
        $quillecassee = (int) $state->get('etatquille', 100) <= 0;
        $matcasse = (bool) $state->get('matcasse', false);
        $tempeteParfaite = !$matcasse && !$quillecassee;
        $variant = match (true) {
            $matcasse && $quillecassee => 'finish_damage',
            $matcasse => 'finish_matcasse',
            $quillecassee => 'finish_quillecassee',
            default => 'finish_perfect',
        };

        $stateChanges = [
            'sullivan_tempete_variant' => $variant,
            'recifs' => false,
            'quillecassee' => $quillecassee,
        ];

        if ($quillecassee) {
            $stateChanges['sullivanconfiance'] = (int) $state->get('sullivanconfiance', 100) - 20;
        }

        $achievements = [['scenario' => 'ambria', 'name' => 'tempete']];
        if ($tempeteParfaite) {
            $achievements[] = ['scenario' => 'ambria', 'name' => 'tempeteparfaite'];
        }

        return new AdventureActionResult(
            nextScene: 'sullivan_tempete',
            stateChanges: $stateChanges,
            achievements: $achievements,
        );
    }
}
