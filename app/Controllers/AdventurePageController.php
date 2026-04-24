<?php

namespace App\Controllers;

use App\Services\Adventures\AdventureActionResult;

class AdventurePageController extends AdventureController
{
    public function show(string $slug, ?string $scene = null): void
    {
        $this->ensureAdventureExists($slug);
        $config = $this->adventureConfig($slug);
        $state = $this->adventureState($slug);

        $scene ??= $state->scene() ?? ($config['entry_scene'] ?? 'index');
        $state->setScene($scene);

        $this->renderAdventure('adventures/show', [
            'title' => ($config['title'] ?? 'Aventure') . ' - ' . ucfirst($scene),
            'adventure' => $config,
            'scene' => $scene,
            'state' => $state->all(),
        ], $config['layout'] ?? 'main');
    }

    public function update(string $slug, ?string $scene = null): void
    {
        $this->ensureAdventureExists($slug);
        $config = $this->adventureConfig($slug);
        $state = $this->adventureState($slug);

        if ($this->request->has('restart')) {
            $state->reset();
        }

        $targetScene = $this->request->post('scene', $scene ?? $state->scene() ?? $config['entry_scene'] ?? 'index');

        $this->applyAdventureResult(
            $slug,
            $state,
            new AdventureActionResult(nextScene: $targetScene),
        );
    }
}
