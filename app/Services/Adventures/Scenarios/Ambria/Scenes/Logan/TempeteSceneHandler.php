<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

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
            'submit_initial_orders' => $this->handleInitialOrders((string) $request->post('ordres', '')),
            'continue_storm' => new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'storm']),
            'submit_sail_order' => $this->handleSailOrder($state, (string) $request->post('ordres2', '')),
            'start_haubans' => new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'haubans', 'haubans' => true]),
            'haubans_success' => $this->handleHaubansResult($state, true),
            'haubans_failure' => $this->handleHaubansResult($state, false),
            'continue_vigie' => new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'vigie']),
            'wave_babord' => $this->handleWave($state, false),
            'wave_tribord' => $this->handleWave($state, true),
            'submit_barrels' => $this->handleBarrels((string) $request->post('tonneaux', '')),
            'save_rhum' => $this->handleBarrelChoice($state, 'rhum', 10),
            'save_riz' => $this->handleBarrelChoice($state, 'riz', -10),
            'continue_recifs' => new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'recifs', 'recifs' => true]),
            'submit_recifs' => $this->handleRecifs($state, (string) $request->post('recifs', '')),
            'start_plage' => new AdventureActionResult(nextScene: 'logan_plage', stateChanges: ['logan_plage_variant' => 'entry']),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleInitialOrders(string $answer): AdventureActionResult
    {
        return match ($this->normalizeInput($answer)) {
            'barreatribord' => new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'avoid_storm']),
            'branlebas' => new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'face_storm']),
            default => new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'wrong_initial_orders']),
        };
    }

    private function handleSailOrder(AdventureState $state, string $answer): AdventureActionResult
    {
        $normalized = $this->normalizeInput($answer);
        if ($normalized !== 'affale' && $normalized !== 'ferle') {
            return new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'wrong_sail_order']);
        }

        return new AdventureActionResult(
            nextScene: 'logan_tempete',
            stateChanges: [
                'logan_tempete_variant' => 'ready_haubans',
                'affale' => $normalized === 'affale',
            ],
        );
    }

    private function handleHaubansResult(AdventureState $state, bool $success): AdventureActionResult
    {
        $affale = (bool) $state->get('affale', false);
        $variant = match (true) {
            $success && $affale => 'haubans_success_affale',
            $success => 'haubans_success_ferle',
            $affale => 'haubans_failure_affale',
            default => 'haubans_failure_ferle',
        };

        return new AdventureActionResult(
            nextScene: 'logan_tempete',
            stateChanges: [
                'logan_tempete_variant' => $variant,
                'haubans' => false,
                'loganconfiance' => (int) $state->get('loganconfiance', 0) + ($success ? 10 : -20),
            ],
        );
    }

    private function handleWave(AdventureState $state, bool $correct): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'logan_tempete',
            stateChanges: [
                'logan_tempete_variant' => $correct ? 'wave_tribord' : 'wave_babord',
                'loganconfiance' => (int) $state->get('loganconfiance', 0) + ($correct ? 10 : -20),
                'notes' => $this->mergeNotes($state, [$correct ? 'Scélérate à tribord' : 'Scélérate à bâbord']),
            ],
        );
    }

    private function handleBarrels(string $answer): AdventureActionResult
    {
        if ($this->normalizeInput($answer) !== 'lestonneaux') {
            return new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'wrong_barrels']);
        }

        return new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'barrels']);
    }

    private function handleBarrelChoice(AdventureState $state, string $barrel, int $confidenceDelta): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'logan_tempete',
            stateChanges: [
                'logan_tempete_variant' => 'recifs_intro',
                $barrel => true,
                'recifs' => true,
                'loganconfiance' => (int) $state->get('loganconfiance', 0) + $confidenceDelta,
            ],
        );
    }

    private function handleRecifs(AdventureState $state, string $answer): AdventureActionResult
    {
        $variant = null;
        $stateChanges = ['recifs' => false];
        $achievements = [['scenario' => 'ambria', 'name' => 'tempete']];

        switch ($this->normalizeInput($answer)) {
            case 'rames':
                $variant = 'recifs_matcasse';
                $stateChanges['matcasse'] = true;
                break;
            case 'accoster':
                $variant = 'recifs_quillecassee';
                $stateChanges['quillecassee'] = true;
                break;
            case 'sortezlesrames':
                $variant = 'recifs_damage';
                break;
            case 'chaloupe':
                $variant = 'recifs_perfect';
                break;
            default:
                return new AdventureActionResult(nextScene: 'logan_tempete', stateChanges: ['logan_tempete_variant' => 'wrong_recifs', 'recifs' => true]);
        }

        $stateChanges['logan_tempete_variant'] = $variant;

        if (
            $variant === 'recifs_perfect'
            && !(bool) $state->get('matcasse', false)
            && !(bool) $state->get('quillecassee', false)
        ) {
            $achievements[] = ['scenario' => 'ambria', 'name' => 'tempeteparfaite'];
        }

        return new AdventureActionResult(
            nextScene: 'logan_tempete',
            stateChanges: $stateChanges,
            achievements: $achievements,
        );
    }

}
