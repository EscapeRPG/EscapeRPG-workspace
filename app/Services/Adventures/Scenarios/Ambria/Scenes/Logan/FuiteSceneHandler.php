<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\Content;
use App\Services\Adventures\Support\UserInputNormalizer;

class FuiteSceneHandler implements AdventureSceneHandler
{
    use UserInputNormalizer;

    private const SCENE = 'logan_fuite';
    private const DEFAULT_LOCATION = 'start';

    /** @var array<string, array<string, mixed>> */
    private array $map;

    public function __construct()
    {
        $this->map = require dirname(__DIR__, 7) . '/config/adventures/ambria/logan_fuite_map.php';
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return 'map';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        $location = $this->location($state);
        $displayRoom = $state->get('logan_fuite_display');
        $room = is_array($displayRoom) ? $displayRoom : $this->resolveRoom($location, $state, applyEffects: false);

        return [
            'fuiteContent' => [
                'audio' => $room['audio'] ?? null,
                'blocks' => $this->blocks($room),
                'actions' => $this->actions($location, $room),
            ],
            'fuiteLocation' => $location,
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'go_taverne') {
            return new AdventureActionResult(nextScene: 'logan_taverne', stateChanges: ['logan_taverne_variant' => 'entry']);
        }

        if (!str_starts_with($action, 'move_')) {
            return new AdventureActionResult(nextScene: self::SCENE);
        }

        $direction = substr($action, 5);
        $currentLocation = $this->location($state);
        $currentRoom = $this->resolveRoom($currentLocation, $state, applyEffects: false);
        $target = $currentRoom['exits'][$direction] ?? $currentLocation;

        if (!is_string($target) || !isset($this->map[$target])) {
            $target = $currentLocation;
        }

        $stateChanges = ['logan_fuite_location' => $target];
        $resolvedTarget = $this->resolveRoom($target, $state, applyEffects: true);
        $stateChanges = array_replace($stateChanges, (array) ($resolvedTarget['state_changes'] ?? []));
        $stateChanges['logan_fuite_display'] = $this->displayRoom($resolvedTarget);

        return new AdventureActionResult(
            nextScene: self::SCENE,
            stateChanges: $stateChanges,
            achievements: (array) ($resolvedTarget['achievements'] ?? []),
        );
    }

    private function location(AdventureState $state): string
    {
        $location = (string) $state->get('logan_fuite_location', self::DEFAULT_LOCATION);

        return isset($this->map[$location]) ? $location : self::DEFAULT_LOCATION;
    }

    /**
     * @return array<string, mixed>
     */
    private function resolveRoom(string $location, AdventureState $state, bool $applyEffects): array
    {
        $room = $this->map[$location] ?? $this->map[self::DEFAULT_LOCATION];
        $stateData = $state->all();

        foreach (($room['events'] ?? []) as $event) {
            if (!is_array($event) || !$this->conditionMatches($event, $stateData)) {
                continue;
            }

            $room = array_replace($room, $event);
            break;
        }

        if (!$applyEffects) {
            return $room;
        }

        $stateChanges = (array) ($room['state'] ?? []);
        if (isset($room['inventory_add']) || isset($room['inventory_remove'])) {
            $inventory = $this->mergeStringList((array) ($stateData['inventory'] ?? []), (array) ($room['inventory_add'] ?? []));
            $stateChanges['inventory'] = $this->removeStringList($inventory, (array) ($room['inventory_remove'] ?? []));
        }
        $room['state_changes'] = $stateChanges;

        return $room;
    }

    /**
     * @param array<string, mixed> $room
     * @return array<string, mixed>
     */
    private function displayRoom(array $room): array
    {
        return array_intersect_key($room, array_flip(['text', 'audio', 'blocks', 'actions', 'exits']));
    }

    /**
     * @param array<string, mixed> $room
     * @return array<int, array<string, mixed>>
     */
    private function blocks(array $room): array
    {
        $blockDefinitions = (array) ($room['blocks'] ?? [
            ['type' => 'narrative', 'section' => (string) ($room['text'] ?? 'start')],
        ]);

        $blocks = [];
        foreach ($blockDefinitions as $definition) {
            if (!is_array($definition)) {
                continue;
            }

            $section = 'ambria/logan/fuite#' . (string) ($definition['section'] ?? '');
            if (($definition['type'] ?? 'narrative') === 'dialogue') {
                $blocks[] = Content::dialogue(
                    (string) ($definition['speaker'] ?? ''),
                    (string) ($definition['portrait'] ?? ''),
                    $section,
                    (string) ($definition['side'] ?? 'left'),
                );
                continue;
            }

            $blocks[] = Content::narrative($section);
        }

        return $blocks;
    }

    /**
     * @param array<string, mixed> $room
     * @return array<int, array<string, mixed>>
     */
    private function actions(string $location, array $room): array
    {
        if (isset($room['actions']) && is_array($room['actions'])) {
            return array_map(
                static fn (array $action): array => Content::action(
                    (string) ($action['label'] ?? 'Continuer.'),
                    'go_' . (string) ($action['target'] ?? 'taverne'),
                ),
                array_values(array_filter($room['actions'], 'is_array')),
            );
        }

        $labels = [
            'north' => ['Aller au Nord.', 'ALLER AU NORD.'],
            'west' => ["Aller à l'Ouest.", "ALLER À L'OUEST."],
            'east' => ["Aller à l'Est.", "ALLER À L'EST."],
            'south' => ['Aller au Sud.', 'ALLER AU SUD.'],
        ];

        $actions = [];
        foreach ($labels as $direction => [$enabledLabel, $disabledLabel]) {
            $enabled = isset($room['exits'][$direction]);
            $actions[] = Content::action(
                $enabled ? $enabledLabel : $disabledLabel,
                'move_' . $direction,
                $enabled ? 'action' : 'action noway',
            );
        }

        return $actions;
    }

    /**
     * @param array<string, mixed> $event
     * @param array<string, mixed> $state
     */
    private function conditionMatches(array $event, array $state): bool
    {
        if (isset($event['unless']) && $this->singleConditionMatches((array) $event['unless'], $state)) {
            return false;
        }

        if (isset($event['if_any']) && is_array($event['if_any'])) {
            $matchesAny = false;
            foreach ($event['if_any'] as $condition) {
                if (is_array($condition) && $this->singleConditionMatches($condition, $state)) {
                    $matchesAny = true;
                    break;
                }
            }
            if (!$matchesAny) {
                return false;
            }
        }

        if (isset($event['if']) && !$this->singleConditionMatches((array) $event['if'], $state)) {
            return false;
        }

        return true;
    }

    /**
     * @param array<string, mixed> $condition
     * @param array<string, mixed> $state
     */
    private function singleConditionMatches(array $condition, array $state): bool
    {
        $stateKey = (string) ($condition['state'] ?? '');
        if ($stateKey !== '') {
            $actual = $state[$stateKey] ?? null;
            if (($condition['truthy'] ?? false) === true && !(bool) $actual) {
                return false;
            }
            if (($condition['falsy'] ?? false) === true && (bool) $actual) {
                return false;
            }
        }

        $falsyState = (string) ($condition['state_falsy'] ?? '');
        if ($falsyState !== '' && (bool) ($state[$falsyState] ?? false)) {
            return false;
        }

        return true;
    }

}
