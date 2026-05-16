<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class TaverneSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('ambriabibliotheque', false)) {
            return (string) $state->get('sullivan_taverne_variant', 'logan_search');
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'ask_don' => $this->handleDon($state, $request),
            'take_whisky' => $this->takeWhisky($state),
            'meet_logan' => new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'logan_search']),
            'approach_logan' => new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: [
                'sullivan_taverne_variant' => 'logan_meeting',
                'rencontre' => true,
                'notes' => $this->mergeNotes($state, ["C'est à toi je crois"]),
            ]),
            'talk_logan' => $this->handleLoganAnswer($request),
            'start_sullivan_embrouilles' => new AdventureActionResult(nextScene: 'sullivan_embrouilles', stateChanges: ['sullivan_embrouilles_variant' => 'entry']),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleDon(AdventureState $state, Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('don', ''));

        if ($answer === 'vieuxtype') {
            if ((bool) $state->get('ambriapaul', false)) {
                return new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'paul_already_helped']);
            }

            return new AdventureActionResult(
                nextScene: 'sullivan_taverne',
                stateChanges: [
                    'sullivan_taverne_variant' => 'don_whisky',
                    'notes' => $this->mergeNotes($state, ['Fond de whisky']),
                ],
            );
        }

        if ($answer === 'louis') {
            return new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'don_louis']);
        }

        if ($answer === 'don') {
            return new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'don_self']);
        }

        return new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'don_wrong']);
    }

    private function takeWhisky(AdventureState $state): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'sullivan_taverne',
            stateChanges: [
                'sullivan_taverne_variant' => 'whisky_taken',
                'ambriawhisky' => true,
                'inventory' => $this->mergeInventory($state, ['ambriawhisky']),
            ],
        );
    }

    private function handleLoganAnswer(Request $request): AdventureActionResult
    {
        $success = $this->normalizeInput((string) $request->post('loganreponse', '')) === 'quietesvous';

        if (!$success) {
            return new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'logan_wrong']);
        }

        return new AdventureActionResult(nextScene: 'sullivan_taverne', stateChanges: ['sullivan_taverne_variant' => 'logan_confrontation']);
    }
}
