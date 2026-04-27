<?php

namespace App\Services\Adventures\Engine;

/**
 * Gère la progression des indices scène par scène.
 *
 * Cette classe convertit la configuration déclarative d'un indice
 * en données d'affichage et en mises à jour d'état.
 */
class AdventureHintManager
{
    /**
     * Prépare les données d'affichage des indices pour la scène courante.
     *
     * @param array<string, mixed>|null $hintConfig
     * @param array<string, mixed> $state
     * @return array<string, mixed>|null
     */
    public function viewData(?array $hintConfig, array $state, string $scene): ?array
    {
        if (!is_array($hintConfig) || $hintConfig === []) {
            return null;
        }

        $progress = $this->progress($state, $scene);
        $levels = $this->normalizeLevels($hintConfig['levels'] ?? []);
        $answer = $this->normalizeBlock($hintConfig['answer'] ?? null);
        $visibleLevels = array_slice($levels, 0, max(0, (int) $progress['level']));
        $canRevealAnswer = $answer !== null && count($visibleLevels) >= count($levels);

        return [
            'levels' => $visibleLevels,
            'answer' => $answer,
            'answer_revealed' => (bool) ($progress['answer_revealed'] ?? false),
            'has_next_hint' => count($visibleLevels) < count($levels),
            'can_reveal_answer' => $canRevealAnswer,
        ];
    }

    /**
     * Révèle un niveau d'indice supplémentaire pour la scène demandée.
     *
     * @param array<string, mixed>|null $hintConfig
     */
    public function requestHint(AdventureState $state, string $scene, ?array $hintConfig): ?AdventureActionResult
    {
        if (!is_array($hintConfig) || $hintConfig === []) {
            return null;
        }

        $levels = $this->normalizeLevels($hintConfig['levels'] ?? []);

        if ($levels === []) {
            return null;
        }

        $currentState = $state->all();
        $progress = $this->progress($currentState, $scene);
        $nextLevel = min(count($levels), (int) $progress['level'] + 1);
        $hintsState = $currentState['hints'] ?? [];
        $hintsState[$scene] = [
            'level' => $nextLevel,
            'answer_revealed' => false,
        ];

        $achievements = (int) $progress['level'] === 0
            ? [['scenario' => 'general', 'name' => 'indice']]
            : [];

        return new AdventureActionResult(
            nextScene: $scene,
            stateChanges: ['hints' => $hintsState],
            achievements: $achievements,
        );
    }

    /**
     * Révèle la réponse complète d'un indice lorsque tous les niveaux sont disponibles.
     *
     * @param array<string, mixed>|null $hintConfig
     */
    public function revealAnswer(AdventureState $state, string $scene, ?array $hintConfig): ?AdventureActionResult
    {
        if (!is_array($hintConfig) || $hintConfig === []) {
            return null;
        }

        $answer = $this->normalizeBlock($hintConfig['answer'] ?? null);
        if ($answer === null) {
            return null;
        }

        $levels = $this->normalizeLevels($hintConfig['levels'] ?? []);
        $currentState = $state->all();
        $progress = $this->progress($currentState, $scene);

        if ((int) $progress['level'] < count($levels)) {
            return null;
        }

        $hintsState = $currentState['hints'] ?? [];
        $hintsState[$scene] = [
            'level' => count($levels),
            'answer_revealed' => true,
        ];

        return new AdventureActionResult(
            nextScene: $scene,
            stateChanges: ['hints' => $hintsState],
            achievements: [['scenario' => 'general', 'name' => 'reponse']],
        );
    }

    /**
     * Retourne l'état courant des indices pour une scène.
     *
     * @param array<string, mixed> $state
     * @return array{level: int, answer_revealed: bool}
     */
    private function progress(array $state, string $scene): array
    {
        $progress = $state['hints'][$scene] ?? null;

        if (!is_array($progress)) {
            return [
                'level' => 0,
                'answer_revealed' => false,
            ];
        }

        return [
            'level' => (int) ($progress['level'] ?? 0),
            'answer_revealed' => (bool) ($progress['answer_revealed'] ?? false),
        ];
    }

    /**
     * Normalise une liste de niveaux d'indices au format interne.
     *
     * @param array<int, mixed> $levels
     * @return array<int, array{paragraphs: array<int, string>}>
     */
    private function normalizeLevels(array $levels): array
    {
        $normalized = [];

        foreach ($levels as $level) {
            $block = $this->normalizeBlock($level);
            if ($block !== null) {
                $normalized[] = $block;
            }
        }

        return $normalized;
    }

    /**
     * Convertit un bloc libre en structure de texte standardisée.
     *
     * @return array{paragraphs: array<int, string>}|null
     */
    private function normalizeBlock(mixed $block): ?array
    {
        if (is_string($block) && trim($block) !== '') {
            return [
                'paragraphs' => [$block],
            ];
        }

        if (!is_array($block)) {
            return null;
        }

        $paragraphs = array_values(array_filter(
            $block['paragraphs'] ?? [],
            static fn ($paragraph) => is_string($paragraph) && trim($paragraph) !== ''
        ));

        if ($paragraphs === []) {
            return null;
        }

        return [
            'paragraphs' => $paragraphs,
        ];
    }
}
