<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class PyramideSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'submit_sullivan_order' => $this->handleSullivanOrder($state, $request),
            'continue_treasure_room' => new AdventureActionResult(
                nextScene: 'logan_pyramide',
                stateChanges: ['logan_pyramide_variant' => 'treasure_room'],
                achievements: [['scenario' => 'ambria', 'name' => 'tresor']],
            ),
            'advance_to_treasure' => $this->handleTreasureAdvance($state),
            'choose_mutiny' => new AdventureActionResult(
                nextScene: 'logan_pyramide',
                stateChanges: ['logan_pyramide_variant' => 'mutiny_accept', 'logan_mutiny_choice' => 'accept'],
                achievements: [['scenario' => 'ambria', 'name' => 'mutinerie']],
            ),
            'refuse_mutiny' => new AdventureActionResult(
                nextScene: 'logan_pyramide',
                stateChanges: ['logan_pyramide_variant' => 'mutiny_refuse', 'logan_mutiny_choice' => 'refuse'],
            ),
            'start_levier' => new AdventureActionResult(
                nextScene: 'logan_pyramide',
                stateChanges: ['logan_pyramide_variant' => 'levier_pending', 'levier' => true],
            ),
            'complete_levier' => $this->handleLevierComplete($state),
            'continue_good_end' => new AdventureActionResult(
                nextScene: 'logan_fin',
                stateChanges: ['logan_fin_variant' => 'good'],
            ),
            'continue_best_end' => new AdventureActionResult(
                nextScene: 'logan_fin',
                stateChanges: ['logan_fin_variant' => 'best'],
            ),
            'continue_loyal_end' => new AdventureActionResult(
                nextScene: 'logan_fin',
                stateChanges: ['logan_fin_variant' => 'loyal'],
                achievements: [['scenario' => 'ambria', 'name' => 'fidele']],
            ),
            'continue_bad_end' => new AdventureActionResult(
                nextScene: 'logan_fin',
                stateChanges: ['logan_fin_variant' => 'bad'],
            ),
            'leave_with_mutineers' => new AdventureActionResult(
                nextScene: 'logan_mutinerie',
                stateChanges: ['logan_mutinerie_variant' => 'entry'],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleSullivanOrder(AdventureState $state, Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('sullivan', ''));
        $stateChanges = $this->loganConfidenceState($state);

        if ($answer === 'rassemblelesgars') {
            $stateChanges['logan_pyramide_variant'] = 'upper_hall';
            $stateChanges['sullivanpasconfiant'] = true;
            $stateChanges['sullivanconfiant'] = false;

            return new AdventureActionResult(nextScene: 'logan_pyramide', stateChanges: $stateChanges);
        }

        if ($answer === 'faisvenirlesgars') {
            $stateChanges['logan_pyramide_variant'] = 'upper_hall';
            $stateChanges['sullivanconfiant'] = true;
            $stateChanges['sullivanpasconfiant'] = false;

            return new AdventureActionResult(nextScene: 'logan_pyramide', stateChanges: $stateChanges);
        }

        $stateChanges['logan_pyramide_variant'] = 'wrong_sullivan_order';

        return new AdventureActionResult(nextScene: 'logan_pyramide', stateChanges: $stateChanges);
    }

    private function handleLevierComplete(AdventureState $state): AdventureActionResult
    {
        if ((string) $state->get('logan_pyramide_cage_path', '') === 'mixed') {
            return new AdventureActionResult(
                nextScene: 'logan_pyramide',
                stateChanges: ['logan_pyramide_variant' => 'cage_release_mixed', 'logan_release_path' => 'mixed'],
            );
        }

        if ((string) $state->get('logan_pyramide_cage_path', '') === 'trust') {
            return new AdventureActionResult(
                nextScene: 'logan_pyramide',
                stateChanges: ['logan_pyramide_variant' => 'cage_release_trust', 'logan_release_path' => 'trust'],
            );
        }

        return new AdventureActionResult(
            nextScene: 'logan_pyramide',
            stateChanges: ['logan_pyramide_variant' => 'cage_release_mutiny', 'logan_release_path' => 'mutiny'],
        );
    }

    private function handleTreasureAdvance(AdventureState $state): AdventureActionResult
    {
        $loganConfident = (bool) $state->get('loganconfiant', false);
        $sullivanConfident = (bool) $state->get('sullivanconfiant', false);

        $stateChanges = [];

        if ($loganConfident && $sullivanConfident) {
            $stateChanges = ['logan_pyramide_variant' => 'cage_levier_trust', 'logan_pyramide_cage_path' => 'trust'];
        } elseif ($loganConfident) {
            $stateChanges = ['logan_pyramide_variant' => 'mutiny_choice', 'logan_pyramide_cage_path' => 'mutiny'];
        } elseif ($sullivanConfident) {
            $stateChanges = ['logan_pyramide_variant' => 'cage_levier_mixed', 'logan_pyramide_cage_path' => 'mixed'];
        } else {
            $stateChanges = ['logan_pyramide_variant' => 'bad_end_pending', 'logan_pyramide_cage_path' => 'bad'];
        }

        return new AdventureActionResult(nextScene: 'logan_pyramide', stateChanges: $stateChanges);
    }

    /**
     * @return array<string, mixed>
     */
    private function loganConfidenceState(AdventureState $state): array
    {
        $confident = (int) $state->get('loganconfiance', 0) >= 70;

        return [
            'loganconfiant' => $confident,
            'loganpasconfiant' => !$confident,
        ];
    }
}
