<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class MatinSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'matin_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'repondre' => $this->handleAnswer($state, $request),
            'non' => new AdventureActionResult(
                nextScene: 'matin',
                stateChanges: [
                    'matin_step' => 3,
                ],
            ),
            'go_pellington' => new AdventureActionResult(nextScene: '107parkavenue'),
            default => new AdventureActionResult(nextScene: 'matin'),
        };
    }

    private function handleAnswer(AdventureState $state, Request $request): AdventureActionResult
    {
        $step = (int) $state->get('matin_step', 0);

        $answer = (string) $request->post('matin', '');

        if ($step === 0 || $step === 4) {
            if (!$this->inputMatches($answer, 'inspecteurdeckard085')) {
                return new AdventureActionResult(
                    nextScene: 'matin',
                    stateChanges: [
                        'matin_step' => 4,
                    ],
                );
            }

            return new AdventureActionResult(
                nextScene: 'matin',
                stateChanges: [
                    'matin_step' => 1,
                    'police_authenticated' => true,
                ],
            );
        }

        if (!$this->inputMatches($answer, 'pellington')) {
            return new AdventureActionResult(
                nextScene: 'matin',
                stateChanges: [
                    'matin_step' => 5,
                ],
            );
        }

        return new AdventureActionResult(
            nextScene: 'matin',
            stateChanges: [
                'matin_step' => 2,
            ],
        );
    }
}
