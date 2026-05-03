<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class Jour2SceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'jour2_step');
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'entrer' => new AdventureActionResult(nextScene: 'jour2'),
            'suivant' => new AdventureActionResult(
                nextScene: 'jour2',
                stateChanges: [
                    'jour2_step' => 1,
                ],
            ),
            'interroger' => $this->handleQuestion($state, $request),
            'enqueter' => new AdventureActionResult(
                nextScene: 'jour2',
                stateChanges: [
                    'jour2_step' => 2,
                ],
            ),
            'dormir2' => new AdventureActionResult(
                nextScene: 'jour2',
                stateChanges: [
                    'jour2_step' => 3,
                    'manor_day' => true,
                ],
            ),
            'suivant2' => new AdventureActionResult(
                nextScene: 'jour2',
                stateChanges: [
                    'jour2_step' => 4,
                ],
            ),
            'suivant3' => new AdventureActionResult(
                nextScene: 'jour2',
                stateChanges: [
                    'jour2_step' => 5,
                ],
            ),
            'fenetreopened' => new AdventureActionResult(nextScene: 'intrusion'),
            default => new AdventureActionResult(nextScene: 'jour2'),
        };
    }

    private function handleQuestion(AdventureState $state, Request $request): AdventureActionResult
    {
        $response = $this->resolveInput((string) $request->post('nuit', ''), [
            'voituregrise',
            'pellington',
        ]);
        $step = match ($response) {
            'voituregrise' => 6,
            'pellington' => 7,
            default => 8,
        };

        return new AdventureActionResult(
            nextScene: 'jour2',
            stateChanges: [
                'jour2_step' => $step,
            ],
        );
    }
}
