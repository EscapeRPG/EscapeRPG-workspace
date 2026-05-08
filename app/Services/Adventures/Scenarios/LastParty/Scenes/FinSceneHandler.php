<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Base\CommentableFinalSceneHandler;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gère l'épilogue et les commentaires de fin.
 */
class FinSceneHandler extends CommentableFinalSceneHandler
{
    private const string SCENARIO = 'Last Party';
    private const string SCENE = 'ebaubi';

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (bool) $state->get('final_revealed', false)
            ? 'completed'
            : 'revelation';
    }

    protected function commentScenario(): string
    {
        return self::SCENARIO;
    }

    protected function finalScene(): string
    {
        return self::SCENE;
    }

    protected function extraViewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'finalRevealed' => (bool) $state->get('final_revealed', false),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'finish_story') {
            return new AdventureActionResult(
                nextScene: self::SCENE,
                stateChanges: ['final_revealed' => true],
                achievements: [
                    ['scenario' => 'general', 'name' => 'fin'],
                    ['scenario' => 'lastparty', 'name' => 'fin'],
                ],
            );
        }

        if ($action === 'submit_comment') {
            return $this->submitComment($request, ['final_revealed' => true]);
        }

        return new AdventureActionResult(nextScene: self::SCENE);
    }
}
