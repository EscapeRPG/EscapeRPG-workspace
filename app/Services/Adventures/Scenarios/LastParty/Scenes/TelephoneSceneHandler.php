<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gere la scene des messages sur le telephone.
 */
class TelephoneSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('faceeebook_seen', false)) {
            return 'after_faceeebook';
        }

        return 'default';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'step' => (int) $state->get('telephone_step', 0),
            'faceeebookSeen' => (bool) $state->get('faceeebook_seen', false),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'open_sms' => new AdventureActionResult(
                nextScene: 'telephone',
                stateChanges: ['telephone_step' => max(1, (int) $state->get('telephone_step', 0))],
            ),
            'reply_first' => new AdventureActionResult(
                nextScene: 'telephone',
                stateChanges: ['telephone_step' => 2],
            ),
            'reply_second' => new AdventureActionResult(
                nextScene: 'telephone',
                stateChanges: ['telephone_step' => 3],
            ),
            'back_to_room' => new AdventureActionResult(nextScene: 'appartement'),
            'answer_faceeebook_sms' => new AdventureActionResult(
                nextScene: 'telephone',
                stateChanges: ['telephone_step' => 4],
            ),
            'unlock_photos' => new AdventureActionResult(
                nextScene: 'telephone',
                stateChanges: [
                    'photos_unlocked' => true,
                    'telephone_step' => 5,
                ],
            ),
            default => new AdventureActionResult(nextScene: 'telephone'),
        };
    }
}
