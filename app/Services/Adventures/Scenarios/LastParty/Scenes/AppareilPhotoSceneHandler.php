<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gere la decouverte des photos de la veille.
 */
class AppareilPhotoSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (int) $state->get('camera_step', 0) < 1
            ? 'intro'
            : 'photo_clue';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'step' => (int) $state->get('camera_step', 0),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'inspect_gallery' => new AdventureActionResult(
                nextScene: 'appareilphoto',
                stateChanges: ['camera_step' => 1],
            ),
            default => new AdventureActionResult(nextScene: 'appareilphoto'),
        };
    }
}
