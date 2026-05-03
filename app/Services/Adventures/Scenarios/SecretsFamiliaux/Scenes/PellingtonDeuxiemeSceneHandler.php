<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class PellingtonDeuxiemeSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    private const string SCENE = 'pellingtondeuxieme';

    public function __construct()
    {
        parent::__construct(stepKey: 'pellington_deuxieme_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('pellington_recette_found', false)) {
            return 'done';
        }

        return match ((int) $state->get('pellington_deuxieme_step', 0)) {
            1 => 'recette',
            2 => 'unknown',
            default => 'step_0',
        };
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'fouiller' => $this->handleSearch($request),
            'take_recette' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_recette_found' => true,
                'pellington_deuxieme_step' => 0,
                'inventory' => $this->withoutItem(
                    $this->mergeNotes((array) $state->get('inventory', []), ['recette']),
                    'flacon',
                ),
            ]),
            default => new AdventureActionResult(nextScene: self::SCENE),
        };
    }

    private function handleSearch(Request $request): AdventureActionResult
    {
        return new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
            'pellington_deuxieme_step' => $this->inputMatches((string) $request->post('fouille', ''), 'barbiturique') ? 1 : 2,
        ]);
    }

    /**
     * @param array<int, string> $inventory
     * @return array<int, string>
     */
    private function withoutItem(array $inventory, string $item): array
    {
        return array_values(array_filter($inventory, static fn (mixed $current): bool => $current !== $item));
    }
}
