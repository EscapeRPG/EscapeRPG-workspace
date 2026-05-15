<?php

namespace App\Services\Adventures\Scenarios\Avent\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

class AventSceneHandler implements AdventureSceneHandler
{
    /**
     * @param array<string, mixed> $actions
     */
    public function __construct(
        private readonly string $scene,
        private readonly string $defaultVariant = 'default',
        private readonly array $actions = [],
    ) {
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ($isLandingPage && $this->scene === 'index') {
            return 'landing';
        }

        $variant = (string) $state->get($this->scene . '_variant', $this->defaultVariant);

        if ($this->scene === 'enroute' && $variant === 'unknown_stars' && (bool) $state->get('sky_card', false)) {
            return 'draw_prompt';
        }

        return $variant;
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'flippedCards' => array_values(array_filter(
                (array) $state->get('flipped_cards', []),
                static fn (mixed $card): bool => is_int($card)
            )),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($this->scene === 'cartes' && $action === 'flip_card') {
            $card = (int) $request->post('card_index', 0);
            $cards = (array) $state->get('flipped_cards', []);
            if ($card >= 1 && $card <= 16 && !in_array($card, $cards, true)) {
                $cards[] = $card;
                sort($cards);
            }

            return new AdventureActionResult(nextScene: 'cartes', stateChanges: ['flipped_cards' => $cards]);
        }

        if ($this->scene === 'grenier' && $action === 'use_machine') {
            $hasFirstPiece = (bool) $state->get('piece_machine_1', false);
            $hasSecondPiece = (bool) $state->get('piece_machine_2', false);

            if (!$hasFirstPiece || !$hasSecondPiece) {
                return new AdventureActionResult(
                    nextScene: 'grenier',
                    stateChanges: ['grenier_variant' => 'machine_missing'],
                );
            }
        }

        if ($this->scene === 'grenier' && $action === 'go_enroute' && (bool) $state->get('sky_card', false)) {
            return new AdventureActionResult(
                nextScene: 'enroute',
                stateChanges: ['enroute_variant' => 'draw_prompt'],
            );
        }

        if ($this->scene === 'enroute' && $action === 'search_room' && (bool) $state->get('sky_card', false)) {
            return new AdventureActionResult(
                nextScene: 'enroute',
                stateChanges: ['enroute_variant' => 'draw_prompt'],
            );
        }

        $definition = $this->actions[$action] ?? null;

        if ($definition === null) {
            return new AdventureActionResult(nextScene: $this->scene);
        }

        if (isset($definition['answer'])) {
            $field = (string) ($definition['field'] ?? 'answer');
            $answer = $this->normalize((string) $request->post($field, ''));
            $validAnswers = array_map([$this, 'normalize'], (array) $definition['answer']);
            $definition = in_array($answer, $validAnswers, true)
                ? (array) ($definition['success'] ?? [])
                : (array) ($definition['failure'] ?? []);
        }

        $nextScene = (string) ($definition['next_scene'] ?? $this->scene);
        $stateChanges = (array) ($definition['state'] ?? []);
        $nextVariant = $definition['variant'] ?? null;
        if (is_string($nextVariant) && $nextVariant !== '') {
            $stateChanges[$nextScene . '_variant'] = $nextVariant;
        }

        return new AdventureActionResult(
            nextScene: $nextScene,
            stateChanges: $stateChanges,
            achievements: (array) ($definition['achievements'] ?? []),
            redirectTo: $definition['redirect_to'] ?? null,
        );
    }

    private function normalize(string $value): string
    {
        $value = trim(mb_strtolower($value, 'UTF-8'));
        $value = str_replace(['-', ' ', "'", '’'], '', $value);
        $value = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value) ?: $value;

        return preg_replace('/[^a-z0-9]/', '', $value) ?? '';
    }
}
