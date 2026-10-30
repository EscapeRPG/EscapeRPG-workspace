<?php

namespace App\Services\Adventures\Base;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/** Comportement commun aux scènes déclaratives sans logique spécialisée. */
class DeclarativeSceneHandler implements AdventureSceneHandler
{
    public function __construct(
        protected readonly string $scene,
        protected readonly string $defaultVariant = 'default',
        protected readonly array $actions = [],
    ) {
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (string) $state->get($this->scene . '_variant', $this->defaultVariant);
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $effect = $this->actions[(string) $request->post('action', '')] ?? [];
        $target = (string) ($effect['next_scene'] ?? $this->scene);
        $changes = $effect['state'] ?? [];
        if (isset($effect['variant'])) {
            $changes[$target . '_variant'] = $effect['variant'];
        }
        return new AdventureActionResult(
            nextScene: $target,
            stateChanges: $changes,
            achievements: $effect['achievements'] ?? [],
        );
    }
}
