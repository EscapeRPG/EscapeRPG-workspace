<?php

declare(strict_types=1);

namespace EscapeRPG\Framework\Controller;

use EscapeRPG\Framework\Domain\Game\GameState;
use EscapeRPG\Framework\Http\Request;
use EscapeRPG\Framework\Http\Response;
use EscapeRPG\Framework\Infrastructure\Session\SessionGameStateRepository;
use EscapeRPG\Framework\Infrastructure\View\PhpViewRenderer;

final class HomeController extends AbstractController
{
    public function __construct(
        PhpViewRenderer $view,
        private SessionGameStateRepository $gameStateRepository,
        private array $config = []
    ) {
        parent::__construct($view);
    }

    public function index(Request $request): Response
    {
        $gameState = $this->gameStateRepository->load();

        return $this->render('pages/home', [
            'appName' => $this->config['app_name'] ?? 'EscapeRPG',
            'environment' => $this->config['environment'] ?? 'dev',
            'gameState' => $gameState,
        ]);
    }

    public function health(Request $request): Response
    {
        $gameState = $this->gameStateRepository->load();

        return Response::json([
            'status' => 'ok',
            'app' => $this->config['app_name'] ?? 'EscapeRPG',
            'environment' => $this->config['environment'] ?? 'dev',
            'session_started' => session_status() === PHP_SESSION_ACTIVE,
            'known_flags' => array_keys($gameState->flags()),
        ]);
    }
}
