<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class AmbriaSceneHandler implements AdventureSceneHandler
{
    use UserInputNormalizer;

    /**
     * @param array<string, mixed> $actions
     */
    public function __construct(
        protected readonly string $scene,
        private readonly string $defaultVariant = 'default',
        private readonly array $actions = [],
    ) {
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ($isLandingPage && $this->scene === 'index') {
            return 'landing';
        }

        return (string) $state->get($this->scene . '_variant', $this->defaultVariant);
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        $activePlayer = (string) $state->get('active_player', '');
        $portrait = match ($activePlayer) {
            'logan' => [
                'image' => 'assets/img/ambria/loganbarthelemymini.png',
                'alt' => 'Logan Barthélémy',
                'title' => 'Logan Barthélémy',
            ],
            'sullivan' => [
                'image' => 'assets/img/ambria/sullivanmasonmini.png',
                'alt' => 'Sullivan Mason',
                'title' => 'Sullivan Mason',
            ],
            default => null,
        };

        if ($portrait !== null) {
            $config['sidebar']['portrait'] = $portrait;
        }

        return ['adventureOverride' => $config];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($this->scene === 'logan_fuite' && str_starts_with($action, 'go_')) {
            return $this->handleLoganFuite($state, substr($action, 3));
        }

        $definition = $this->actions[$action] ?? null;

        if ($definition === null) {
            return new AdventureActionResult(nextScene: $this->scene);
        }

        $nextScene = (string) ($definition['next_scene'] ?? $this->scene);
        $stateChanges = (array) ($definition['state'] ?? []);
        $nextVariant = $definition['variant'] ?? null;

        if (array_key_exists('inventory', $stateChanges)) {
            $stateChanges['inventory'] = $this->mergeInventory($state, (array) $stateChanges['inventory']);
        }

        if (is_string($nextVariant) && $nextVariant !== '') {
            $stateChanges[$nextScene . '_variant'] = $nextVariant;
        }

        return new AdventureActionResult(
            nextScene: $nextScene,
            resetState: (bool) ($definition['reset_state'] ?? false),
            stateChanges: $stateChanges,
            achievements: (array) ($definition['achievements'] ?? []),
            redirectTo: $definition['redirect_to'] ?? null,
        );
    }

    private function handleLoganFuite(AdventureState $state, string $location): AdventureActionResult
    {
        $stateChanges = [];
        $achievements = [];
        $nextScene = 'logan_fuite';
        $variant = $location;

        if ($location === 'a1') {
            if ((bool) $state->get('biscuits', false)) {
                $variant = 'a1_hat';
                $stateChanges['biscuits'] = false;
                $stateChanges['chapeautypecolere'] = true;
                $stateChanges['inventory'] = $this->removeStringList(
                    $this->mergeInventory($state, ['chapeautypecolere']),
                    ['biscuits']
                );
            } else {
                $variant = 'a1_seen';
                $stateChanges['mouette'] = true;
            }
        }

        if ($location === 'c1' && (bool) $state->get('cledocks', false)) {
            $variant = 'c1_open';
            $stateChanges['cledocks'] = false;
            $stateChanges['inventory'] = $this->removeInventory($state, ['cledocks']);
            $achievements[] = ['scenario' => 'ambria', 'name' => 'fuir'];
        }

        if ($location === 'd5' && !(bool) $state->get('cletypecolere', false)) {
            $variant = 'd5_key';
            $stateChanges['cletypecolere'] = true;
            $stateChanges['inventory'] = $this->mergeInventory($state, ['cletypecolere']);
        }

        if ($location === 'f3') {
            $variant = (bool) $state->get('cletypecolere', false) ? 'f3_open' : 'f3_locked';
        }

        if ($location === 'e5' && (bool) $state->get('cletypecolere', false) && !(bool) $state->get('cledejapasse', false)) {
            $variant = 'e5_key_notice';
            $stateChanges['cledejapasse'] = true;
        }

        if ($location === 'g2' && !(bool) $state->get('biscuits', false) && ((bool) $state->get('typecolere', false) || (bool) $state->get('mouette', false))) {
            $variant = 'g2_biscuits';
            $stateChanges['biscuits'] = true;
            $stateChanges['inventory'] = $this->mergeInventory($state, ['biscuits']);
        }

        if ($location === 'g5') {
            if ((bool) $state->get('cledocks', false)) {
                $variant = 'g5_waiting';
            } elseif ((bool) $state->get('chapeautypecolere', false)) {
                $variant = 'g5_return_hat';
                $stateChanges['cletypecolere'] = false;
                $stateChanges['chapeautypecolere'] = false;
                $stateChanges['cledocks'] = true;
                $stateChanges['inventory'] = $this->removeStringList(
                    $this->mergeInventory($state, ['cledocks']),
                    ['cletypecolere', 'chapeautypecolere']
                );
            } elseif ((bool) $state->get('cletypecolere', false)) {
                $variant = 'g5_key_only';
            } else {
                $variant = 'g5_first';
                $stateChanges['typecolere'] = true;
            }
        }

        if ($location === 'taverne') {
            $nextScene = 'logan_taverne';
            $variant = 'placeholder';
        }

        $stateChanges[$nextScene . '_variant'] = $variant;

        return new AdventureActionResult(
            nextScene: $nextScene,
            stateChanges: $stateChanges,
            achievements: $achievements,
        );
    }

}
