<?php

namespace App\Services\Adventures\Scenarios\Avent\Scenes;

use App\Core\Request;
use App\Services\Adventures\Base\CommentableFinalSceneHandler;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class FinSceneHandler extends CommentableFinalSceneHandler
{
    private const SCENARIO = "Le Grenier d'Arthur";
    private const SCENE = 'fin';

    private AventSceneHandler $delegate;

    /**
     * @param array<string, mixed> $definition
     */
    public function __construct(array $definition)
    {
        $this->delegate = new AventSceneHandler(
            self::SCENE,
            (string) ($definition['default'] ?? 'home'),
            (array) ($definition['actions'] ?? []),
        );
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return $this->delegate->variant($state, $request, $isLandingPage);
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
        return (bool) $state->get('finished', false);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') === 'submit_comment') {
            return $this->submitComment($request, [
                'finished' => true,
                'fin_variant' => 'completed',
            ]);
        }

        return $this->delegate->handle($config, $state, $request);
    }
}
