<?php

namespace App\Services\Adventures;

readonly class AdventureActionResult
{
    public function __construct(
        public ?string $nextScene = null,
        public array   $stateChanges = [],
        public array   $achievements = [],
        public ?string $redirectTo = null,
        public ?string $flashMessage = null,
        public ?string $flashType = null,
        public array   $viewData = [],
    ) {
    }

    public static function make(
        ?string $nextScene = null,
        array $stateChanges = [],
        array $achievements = [],
        ?string $redirectTo = null,
        ?string $flashMessage = null,
        ?string $flashType = null,
        array $viewData = [],
    ): self {
        return new self(
            nextScene: $nextScene,
            stateChanges: $stateChanges,
            achievements: $achievements,
            redirectTo: $redirectTo,
            flashMessage: $flashMessage,
            flashType: $flashType,
            viewData: $viewData,
        );
    }
}
