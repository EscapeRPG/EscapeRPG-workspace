<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Base\CommentableFinalSceneHandler;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class FinSceneHandler extends CommentableFinalSceneHandler
{
    private const SCENE = 'logan_fin';
    private const COMMENT_SCENARIO = "Le Trésor d'Ambria";

    private AmbriaSceneHandler $delegate;

    /**
     * @param array<string, mixed> $actions
     */
    public function __construct(string $defaultVariant = 'default', array $actions = [])
    {
        $this->delegate = new AmbriaSceneHandler(self::SCENE, $defaultVariant, $actions);
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return $this->delegate->variant($state, $request, $isLandingPage);
    }

    protected function commentScenario(): string
    {
        return self::COMMENT_SCENARIO;
    }

    protected function finalScene(): string
    {
        return self::SCENE;
    }

    protected function canShowComments(AdventureState $state): bool
    {
        return (bool) $state->get('final_completed', false);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'finish_ending') {
            return $this->finishEnding($state);
        }

        if ($action === 'submit_comment') {
            return $this->submitComment($request, ['final_completed' => true]);
        }

        return $this->delegate->handle($config, $state, $request);
    }

    private function finishEnding(AdventureState $state): AdventureActionResult
    {
        $ending = $this->normalizeEnding((string) $state->get(self::SCENE . '_variant', 'default'));
        $variant = match ($ending) {
            'best' => 'completed_best',
            'loyal' => 'completed_loyal',
            'mutiny' => 'completed_mutiny',
            'bad' => 'completed_bad',
            default => 'completed_good',
        };

        return new AdventureActionResult(
            nextScene: self::SCENE,
            stateChanges: [
                self::SCENE . '_variant' => $variant,
                'final_completed' => true,
                'story_finished' => true,
            ],
            achievements: $this->endingAchievements($ending),
        );
    }

    private function normalizeEnding(string $ending): string
    {
        return match ($ending) {
            'best', 'completed_best' => 'best',
            'loyal', 'loyal_ship', 'completed_loyal' => 'loyal',
            'mutiny', 'success_escape', 'fail_noise', 'fail_barthy', 'fail_lloyd', 'fail_guard', 'completed_mutiny' => 'mutiny',
            'bad', 'completed_bad' => 'bad',
            default => 'good',
        };
    }

    /**
     * @return array<int, array{scenario: string, name: string}>
     */
    private function endingAchievements(string $ending): array
    {
        $achievements = [
            ['scenario' => 'general', 'name' => 'fin'],
            ['scenario' => 'ambria', 'name' => 'fin'],
            ['scenario' => 'ambria', 'name' => 'fin1logan'],
            ['scenario' => 'ambria', 'name' => 'fin2logan'],
        ];

        if ($ending !== 'mutiny' && $ending !== 'bad') {
            $achievements[] = ['scenario' => 'ambria', 'name' => 'fin3logan'];
        }

        if ($ending === 'good' || $ending === 'best') {
            $achievements[] = ['scenario' => 'ambria', 'name' => 'fin4logan'];
        }

        if ($ending === 'best') {
            $achievements[] = ['scenario' => 'general', 'name' => 'meilleurefin'];
            $achievements[] = ['scenario' => 'general', 'name' => 'legende'];
            $achievements[] = ['scenario' => 'ambria', 'name' => 'fin5logan'];
        }

        return $achievements;
    }
}
