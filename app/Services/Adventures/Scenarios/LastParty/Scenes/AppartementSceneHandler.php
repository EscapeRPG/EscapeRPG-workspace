<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gère la scène de navigation dans l'appartement.
 */
class AppartementSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (bool) $state->get('photos_unlocked', false)
            ? 'photos'
            : ((bool) $state->get('drawer_unlocked', false) && !(bool) $state->get('carnet_acquired', false)
                ? 'drawer'
                : 'computer');
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'photosUnlocked' => (bool) $state->get('photos_unlocked', false),
            'carnetAcquired' => (bool) $state->get('carnet_acquired', false),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'open_computer') {
            return new AdventureActionResult(
                nextScene: 'ordinateur',
                stateChanges: [
                    'drawer_unlocked' => true,
                ],
            );
        }

        return match ($action) {
            'open_drawer' => new AdventureActionResult(
                nextScene: 'tiroir',
            ),
            'open_camera' => new AdventureActionResult(
                nextScene: 'appareilphoto',
            ),
            default => new AdventureActionResult(nextScene: 'appartement'),
        };
    }
}
