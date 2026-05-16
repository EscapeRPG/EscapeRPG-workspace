<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class EmbrouillesSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'submit_attention') {
            return $this->handleAttention($state, (string) $request->post('bagarre', ''));
        }

        if ($action === 'submit_react') {
            return $this->handleReaction($state, (string) $request->post('baston', ''));
        }

        return parent::handle($config, $state, $request);
    }

    private function handleAttention(AdventureState $state, string $answer): AdventureActionResult
    {
        $success = $this->normalizeInput($answer) === 'derrieretoi';
        $confidence = (int) $state->get('loganconfiance', 0) + ($success ? 10 : 0);

        return new AdventureActionResult(
            nextScene: 'logan_embrouilles',
            stateChanges: [
                'logan_embrouilles_variant' => $success ? 'attention_success' : 'attention_failure',
                'loganconfiance' => $confidence,
                'notes' => $this->mergeNotes($state, ['Attention', 'Baissez-vous']),
            ],
        );
    }

    private function handleReaction(AdventureState $state, string $answer): AdventureActionResult
    {
        $success = $this->normalizeInput($answer) === 'onsort';
        $confidence = (int) $state->get('loganconfiance', 0) + ($success ? 20 : 0);

        return new AdventureActionResult(
            nextScene: 'logan_embrouilles',
            stateChanges: [
                'logan_embrouilles_variant' => $success ? 'escape_success' : 'escape_failure',
                'loganconfiance' => $confidence,
                'notes' => $this->mergeNotes($state, ['Attention', 'Baissez-vous', 'Compris']),
            ],
        );
    }
}
