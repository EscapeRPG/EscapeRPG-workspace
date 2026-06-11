<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Base\CommentableFinalSceneHandler;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gère le tableau de fin et les commentaires de Secrets Familiaux.
 */
class FinSceneHandler extends CommentableFinalSceneHandler
{
    private const SCENARIO = 'Secrets Familiaux';
    private const SCENE = 'fin';

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if (!(bool) $state->get('story_finished', false)) {
            return 'locked';
        }

        $ending = (string) $state->get('story_ending', '');

        return in_array($ending, ['fin1', 'fin2', 'fin3', 'fin4'], true)
            ? 'completed_' . $ending
            : 'completed_fin1';
    }

    protected function commentScenario(): string
    {
        return self::SCENARIO;
    }

    protected function finalScene(): string
    {
        return self::SCENE;
    }

    protected function canShowComments(AdventureState $state): bool
    {
        return (bool) $state->get('story_finished', false);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if (!(bool) $state->get('story_finished', false)) {
            if ((string) $request->post('action', '') === 'retour') {
                return new AdventureActionResult(nextScene: $this->previousScene($state));
            }

            return new AdventureActionResult(
                nextScene: $this->previousScene($state),
                flashMessage: "Cette page se débloque en terminant l'aventure.",
                flashType: 'error',
            );
        }

        if ((string) $request->post('action', '') === 'submit_comment') {
            return $this->submitComment($request);
        }

        return new AdventureActionResult(nextScene: self::SCENE);
    }

    private function previousScene(AdventureState $state): string
    {
        $scene = (string) $state->get('_previous_scene', '');

        return $scene !== '' && $scene !== self::SCENE ? $scene : 'shoggoth';
    }
}
