<?php

namespace App\Services\Adventures\Engine;

/**
 * Objet de transport décrivant une page d'aventure à rendre.
 */
readonly class AdventurePage
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(
        public string $view,
        public array $data = [],
        public string $layout = 'main',
    ) {
    }
}
