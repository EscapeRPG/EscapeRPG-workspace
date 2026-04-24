<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Infrastructure\Session;

use EscapeRPG\Framework\Domain\Game\GameState;

final class SessionGameStateRepository
{
    private const SESSION_KEY = '_framework_game_state';

    public function load(): GameState
    {
        $data = $_SESSION[self::SESSION_KEY] ?? null;

        if (!is_array($data)) {
            return GameState::empty();
        }

        return GameState::fromArray($data);
    }

    public function save(GameState $gameState): void
    {
        $_SESSION[self::SESSION_KEY] = $gameState->toArray();
    }

    public function clear(): void
    {
        unset($_SESSION[self::SESSION_KEY]);
    }
}
