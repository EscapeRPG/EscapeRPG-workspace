<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class ShoggothSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'shoggoth_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $ending = $state->get('shoggoth_ending');
        if (is_string($ending) && $ending !== '') {
            return $ending;
        }

        $step = (int) $state->get('shoggoth_step', 0);
        if ($step < 3) {
            return 'step_' . $step;
        }

        return $this->endingSetupVariant($state);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'suivant' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_step' => 1,
            ]),
            'aider' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_step' => 2,
            ]),
            'agir' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_step' => 3,
            ]),
            'rituel_good' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_ending' => 'ritual_good',
            ]),
            'rituel_neutral_bad' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_ending' => 'ritual_neutral_bad',
            ]),
            'finish_bad' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_ending' => 'bad_end',
                'story_finished' => true,
                'story_ending' => 'fin1',
            ]),
            'finish_neutral' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_ending' => 'neutral_end',
                'story_finished' => true,
                'story_ending' => 'fin3',
            ]),
            'finish_neutral_bad' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_ending' => 'neutral_bad_end',
                'story_finished' => true,
                'story_ending' => 'fin2',
            ]),
            'finish_good' => new AdventureActionResult(nextScene: 'shoggoth', stateChanges: [
                'shoggoth_ending' => 'good_end',
                'story_finished' => true,
                'story_ending' => 'fin4',
            ]),
            'open_final' => $this->openFinalResult($state),
            default => new AdventureActionResult(nextScene: 'shoggoth'),
        };
    }

    private function openFinalResult(AdventureState $state): AdventureActionResult
    {
        if (!(bool) $state->get('story_finished', false)) {
            return new AdventureActionResult(
                nextScene: 'shoggoth',
                flashMessage: "Cette page se débloque en terminant l'aventure.",
                flashType: 'error',
            );
        }

        $ending = (string) $state->get('story_ending', '');
        $achievements = [
            ['scenario' => 'general', 'name' => 'fin'],
            ['scenario' => 'secretsfamiliaux', 'name' => 'fin'],
        ];

        foreach ($this->endingAchievements($ending) as $achievement) {
            $achievements[] = $achievement;
        }

        return new AdventureActionResult(
            nextScene: 'fin',
            achievements: $achievements,
        );
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function endingAchievements(string $ending): array
    {
        $achievements = [];

        $maxEnding = match ($ending) {
            'fin1' => 1,
            'fin2' => 2,
            'fin3' => 3,
            'fin4' => 4,
            default => 0,
        };

        for ($i = 1; $i <= $maxEnding; $i++) {
            $achievements[] = ['scenario' => 'secretsfamiliaux', 'name' => 'fin' . $i];
        }

        if (in_array($ending, ['fin2', 'fin4'], true)) {
            $achievements[] = ['scenario' => 'secretsfamiliaux', 'name' => 'shoggoth'];
        }

        if ($ending === 'fin4') {
            $achievements[] = ['scenario' => 'general', 'name' => 'meilleurefin'];
        }

        return $achievements;
    }

    private function endingSetupVariant(AdventureState $state): string
    {
        $hasPnakotiques = $this->hasPnakotiques($state);
        $dogsSaved = (bool) $state->get('chiens_sauves_fin', false);
        $electricityReady = $this->isElectricityReady($state);

        if ($electricityReady && $dogsSaved && $hasPnakotiques) {
            return 'good_setup';
        }

        if ($electricityReady) {
            return 'neutral_fire';
        }

        if ($dogsSaved && $hasPnakotiques) {
            return 'neutral_bad_setup_dark';
        }

        return 'bad_attack';
    }

    private function hasPnakotiques(AdventureState $state): bool
    {
        return in_array('pnakotiques', (array) $state->get('inventory', []), true)
            || (bool) $state->get('bureauprive_pnakotiques_found', false);
    }

    private function isElectricityReady(AdventureState $state): bool
    {
        return (bool) $state->get('electricity_restored', false)
            || (bool) $state->get('cuves_seen', false);
    }
}
