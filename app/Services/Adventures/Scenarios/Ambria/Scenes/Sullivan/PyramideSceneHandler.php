<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

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
            'continue_upper_hall' => $this->handleUpperHall($state),
            'continue_treasure_room' => new AdventureActionResult(
                nextScene: 'sullivan_pyramide',
                stateChanges: ['sullivan_pyramide_variant' => 'treasure_room'],
                achievements: [['scenario' => 'ambria', 'name' => 'tresor']],
            ),
            'submit_logan_treasure' => $this->handleLoganTreasure($request),
            'submit_logan_mutiny' => $this->handleLoganMutiny($request),
            'start_levier' => new AdventureActionResult(
                nextScene: 'sullivan_pyramide',
                stateChanges: ['sullivan_pyramide_variant' => 'levier_pending', 'leviers' => true],
            ),
            'start_solo_cage' => new AdventureActionResult(
                nextScene: 'sullivan_pyramide',
                stateChanges: ['sullivan_pyramide_variant' => 'solo_cage'],
            ),
            'submit_release_order' => $this->handleReleaseOrder($request),
            'continue_bad_end' => $this->finish('bad'),
            'finish_abandoned' => $this->finish('abandoned'),
            'finish_loyal' => $this->finish('loyal'),
            'finish_good' => $this->finish('good'),
            'finish_best' => $this->finish('best'),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleUpperHall(AdventureState $state): AdventureActionResult
    {
        $confident = (int) $state->get('sullivanconfiance', 100) > 70;

        return new AdventureActionResult(
            nextScene: 'sullivan_pyramide',
            stateChanges: [
                'sullivan_pyramide_variant' => $confident ? 'upper_hall_trust' : 'upper_hall_mistrust',
                'sullivanconfiant' => $confident,
                'sullivanpasconfiant' => !$confident,
            ],
        );
    }

    private function handleLoganTreasure(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('logan', ''));

        return match ($answer) {
            'quefaisonsnous' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'bad_end_pending', 'sullivan_pyramide_path' => 'bad']),
            'bougezpas' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'mutiny_choice', 'sullivan_pyramide_path' => 'mutiny']),
            'sortirdela', 'attendezcapitaine' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'cage_levier', 'sullivan_pyramide_path' => 'cage_levier']),
            default => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'wrong_logan']),
        };
    }

    private function handleLoganMutiny(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('mutinerie', ''));

        return match ($answer) {
            'vousavezraison' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'mutiny_betrayal', 'sullivan_mutiny_choice' => 'betrayal']),
            'jevoussuis' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'mutiny_loyal', 'sullivan_mutiny_choice' => 'loyal']),
            default => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'wrong_mutiny']),
        };
    }

    private function handleReleaseOrder(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('levers', ''));

        return match ($answer) {
            'preparezvous' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'release_loyal', 'sullivan_release_path' => 'loyal']),
            'cestbon' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'release_good', 'sullivan_release_path' => 'good']),
            'camarche' => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'release_best', 'sullivan_release_path' => 'best']),
            default => new AdventureActionResult(nextScene: 'sullivan_pyramide', stateChanges: ['sullivan_pyramide_variant' => 'wrong_release']),
        };
    }

    /**
     * @param array<int, array<string, string>> $achievements
     */
    private function finish(string $variant, array $achievements = []): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'sullivan_fin',
            stateChanges: ['sullivan_fin_variant' => $variant, 'fin' => true],
            achievements: $achievements,
        );
    }
}
