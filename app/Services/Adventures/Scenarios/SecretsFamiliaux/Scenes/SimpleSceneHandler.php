<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

class SimpleSceneHandler implements AdventureSceneHandler
{
    /**
     * @param array<string, array<string, mixed>> $actionMap
     */
    public function __construct(
        private readonly string $stepKey,
        private readonly array $actionMap = [],
    ) {
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return 'step_' . (int) $state->get($this->stepKey, 0);
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'step' => (int) $state->get($this->stepKey, 0),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');
        $target = $this->actionMap[$action] ?? null;

        if ($target === null) {
            return new AdventureActionResult(nextScene: (string) $state->scene());
        }

        $stateChanges = [];
        if (array_key_exists('step', $target)) {
            $stateChanges[$this->stepKey] = (int) $target['step'];
        }

        return new AdventureActionResult(
            nextScene: (string) ($target['scene'] ?? $state->scene()),
            stateChanges: $stateChanges,
            achievements: (array) ($target['achievements'] ?? []),
        );
    }

    /**
     * @param array<int, string> $current
     * @param array<int, string> $new
     * @return array<int, string>
     */
    protected function mergeNotes(array $current, array $new): array
    {
        foreach ($new as $note) {
            if (!in_array($note, $current, true)) {
                $current[] = $note;
            }
        }

        return $current;
    }
}
