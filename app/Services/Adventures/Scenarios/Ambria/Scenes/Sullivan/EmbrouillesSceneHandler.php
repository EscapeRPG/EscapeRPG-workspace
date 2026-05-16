<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class EmbrouillesSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'continue_brawl_setup' => new AdventureActionResult(nextScene: 'sullivan_embrouilles', stateChanges: ['sullivan_embrouilles_variant' => 'brawl_setup']),
            'react_brawl' => $this->handleBrawlReact($state, $request),
            'warn_logan' => $this->handleWarnLogan($state, $request),
            'leave_tavern' => $this->handleLeaveTavern($request),
            'continue_away' => new AdventureActionResult(nextScene: 'sullivan_embrouilles', stateChanges: ['sullivan_embrouilles_variant' => 'away', 'seloigner' => true]),
            'submit_logan_name' => $this->handleLoganName($request),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleBrawlReact(AdventureState $state, Request $request): AdventureActionResult
    {
        $success = $this->normalizeInput((string) $request->post('danger', '')) === 'attention';

        return new AdventureActionResult(
            nextScene: 'sullivan_embrouilles',
            stateChanges: [
                'sullivan_embrouilles_variant' => $success ? 'attention_success' : 'attention_failure',
                'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) + ($success ? 0 : -10),
            ],
        );
    }

    private function handleWarnLogan(AdventureState $state, Request $request): AdventureActionResult
    {
        $success = $this->normalizeInput((string) $request->post('bagarre', '')) === 'baissezvous';

        return new AdventureActionResult(
            nextScene: 'sullivan_embrouilles',
            stateChanges: [
                'sullivan_embrouilles_variant' => $success ? 'dodge_success' : 'dodge_failure',
                'sullivanconfiance' => (int) $state->get('sullivanconfiance', 100) + ($success ? 0 : -20),
            ],
        );
    }

    private function handleLeaveTavern(Request $request): AdventureActionResult
    {
        if ($this->normalizeInput((string) $request->post('sortir', '')) !== 'compris') {
            return new AdventureActionResult(nextScene: 'sullivan_embrouilles', stateChanges: ['sullivan_embrouilles_variant' => 'wrong_exit']);
        }

        return new AdventureActionResult(
            nextScene: 'sullivan_embrouilles',
            stateChanges: ['sullivan_embrouilles_variant' => 'after_fight'],
            achievements: [['scenario' => 'ambria', 'name' => 'bagarre']],
        );
    }

    private function handleLoganName(Request $request): AdventureActionResult
    {
        if ($this->normalizeInput((string) $request->post('logannom', '')) !== 'logan') {
            return new AdventureActionResult(nextScene: 'sullivan_embrouilles', stateChanges: ['sullivan_embrouilles_variant' => 'wrong_logan_name']);
        }

        return new AdventureActionResult(nextScene: 'sullivan_embarquement', stateChanges: ['sullivan_embarquement_variant' => 'entry']);
    }
}
