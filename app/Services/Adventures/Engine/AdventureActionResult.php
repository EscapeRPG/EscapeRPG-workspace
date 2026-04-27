<?php

namespace App\Services\Adventures\Engine;

/**
 * Objet de transport décrivant l'effet d'une action sur une aventure.
 *
 * Il sert de contrat entre un flow et le contrôleur d'aventure.
 */
readonly class AdventureActionResult
{
    /**
     * @param array<string, mixed>|null $replaceState
     * @param array<string, mixed> $stateChanges
     * @param array<int, array<string, string>> $achievements
     * @param array<string, mixed> $viewData
     */
    public function __construct(
        public ?string $nextScene = null,
        public bool    $resetState = false,
        public ?array  $replaceState = null,
        public array   $stateChanges = [],
        public array   $achievements = [],
        public ?string $redirectTo = null,
        public ?string $flashMessage = null,
        public ?string $flashType = null,
        public array   $viewData = [],
    ) {
    }

}
