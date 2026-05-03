<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class CimetiereSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(
            stepKey: 'cimetiere_step',
            actionMap: [
                'suivant' => ['scene' => 'cimetiere', 'step' => 1],
                'qui' => ['scene' => 'cimetiere', 'step' => 2],
                'retour' => ['scene' => 'cimetiere', 'step' => 5],
                'go_manor' => ['scene' => '15hamiltonstreet'],
            ],
        );
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((bool) $state->get('truth_discovered', false)) {
            return $this->handleTruthSequence($state, $request);
        }

        if ((string) $request->post('action', '') === 'medecin') {
            $question = $this->normalizeInput((string) $request->post('question', ''));

            return new AdventureActionResult(
                nextScene: 'cimetiere',
                stateChanges: [
                    'cimetiere_step' => $question === 'sacochedemedecin' ? 3 : 4,
                ],
            );
        }

        return parent::handle($config, $state, $request);
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('truth_discovered', false)) {
            return 'truth_step_' . (int) $state->get('cimetiere_truth_step', 0);
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    private function handleTruthSequence(AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'heler' => new AdventureActionResult(nextScene: 'cimetiere', stateChanges: [
                'cimetiere_truth_step' => 1,
            ]),
            'repondre' => new AdventureActionResult(nextScene: 'cimetiere', stateChanges: [
                'cimetiere_truth_step' => 2,
            ]),
            'demander' => new AdventureActionResult(nextScene: 'cimetiere', stateChanges: [
                'cimetiere_truth_step' => 3,
            ]),
            'badge' => new AdventureActionResult(nextScene: 'cimetiere', stateChanges: [
                'cimetiere_truth_step' => 4,
            ]),
            'suivant2' => new AdventureActionResult(nextScene: 'cimetiere', stateChanges: [
                'cimetiere_truth_step' => 5,
            ]),
            'suivant3' => new AdventureActionResult(nextScene: 'cimetiere', stateChanges: [
                'cimetiere_truth_step' => 6,
            ]),
            'retour_manoir' => new AdventureActionResult(nextScene: 'shoggoth'),
            default => new AdventureActionResult(nextScene: 'cimetiere'),
        };
    }
}
