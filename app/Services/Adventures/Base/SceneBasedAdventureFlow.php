<?php

namespace App\Services\Adventures\Base;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureHintManager;
use App\Services\Adventures\Engine\AdventurePage;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\AdventureContent;

/**
 * Flow générique orienté "handlers de scènes".
 *
 * Cette base permet d'uniformiser la structure des scénarios:
 * un flow orchestrateur, et un handler dédié par scène.
 */
abstract class SceneBasedAdventureFlow extends GenericAdventureFlow
{
    protected AdventureContent $content;
    protected AdventureHintManager $hintManager;

    public function __construct()
    {
        $this->content = new AdventureContent();
        $this->hintManager = new AdventureHintManager();
    }

    /**
     * @return array<string, AdventureSceneHandler>
     */
    abstract protected function handlers(): array;

    public function show(array $config, AdventureState $state, Request $request, string $scene): AdventurePage
    {
        $sceneConfig = $this->requireSceneConfig($config, $scene);
        $handler = $this->handler($scene);
        $isLandingPage = $this->isLandingPage($config, $request);
        $variant = $handler->variant($state, $request, $isLandingPage);
        $content = $this->content->variant($config, $scene, $variant);
        $stateData = $state->all();

        return new AdventurePage(
            view: 'adventures/show',
            data: [
                'title' => ($config['title'] ?? 'Aventure') . ' - ' . ($sceneConfig['label'] ?? ucfirst($scene)),
                'adventure' => $config,
                'scene' => $scene,
                'sceneConfig' => $sceneConfig,
                'sceneView' => $sceneConfig['view'] ?? null,
                'state' => $stateData,
                'sceneData' => array_merge(
                    $handler->viewData($config, $state, $request, $isLandingPage),
                    [
                        'content' => $content,
                        'hintData' => $this->hintManager->viewData($content['hint'] ?? null, $stateData, $scene),
                    ]
                ),
            ],
            layout: $config['layout'] ?? 'main',
        );
    }

    public function handle(array $config, AdventureState $state, Request $request, string $scene): AdventureActionResult
    {
        if ($request->has('restart')) {
            return new AdventureActionResult(
                nextScene: $config['entry_scene'] ?? 'index',
                resetState: true,
            );
        }

        $action = (string) $request->post('action', '');

        $globalResult = $this->handleGlobalAction($config, $state, $request, $scene, $action);
        if ($globalResult !== null) {
            return $globalResult;
        }

        $hintResult = $this->handleHintAction($config, $state, $request, $scene, $action);
        if ($hintResult !== null) {
            return $hintResult;
        }

        return $this->handler($scene)->handle($config, $state, $request);
    }

    /**
     * Permet à un scénario de définir des actions globales.
     *
     * Exemples : sauvegarde, chargement, redirections spéciales.
     */
    protected function handleGlobalAction(
        array $config,
        AdventureState $state,
        Request $request,
        string $scene,
        string $action,
    ): ?AdventureActionResult {
        return null;
    }

    /**
     * Intercepte les actions génériques liées aux indices.
     */
    protected function handleHintAction(
        array $config,
        AdventureState $state,
        Request $request,
        string $scene,
        string $action,
    ): ?AdventureActionResult {
        if ($action !== 'request_hint' && $action !== 'show_answer') {
            return null;
        }

        $handler = $this->handler($scene);
        $content = $this->content->variant(
            $config,
            $scene,
            $handler->variant($state, $request, $this->isLandingPage($config, $request)),
        );
        $hintConfig = $content['hint'] ?? null;

        return match ($action) {
            'request_hint' => $this->hintManager->requestHint($state, $scene, $hintConfig),
            'show_answer' => $this->hintManager->revealAnswer($state, $scene, $hintConfig),
            default => null,
        };
    }

    /**
     * Retourne le handler associé à la scène demandée.
     */
    protected function handler(string $scene): AdventureSceneHandler
    {
        $handler = $this->handlers()[$scene] ?? null;

        if ($handler !== null) {
            return $handler;
        }

        http_response_code(404);
        exit('404');
    }

    /**
     * Retourne la configuration déclarative d'une scène ou interrompt la requête.
     *
     * @return array<string, mixed>
     */
    protected function requireSceneConfig(array $config, string $scene): array
    {
        $sceneConfig = $config['scenes'][$scene] ?? null;

        if ($sceneConfig !== null) {
            return $sceneConfig;
        }

        http_response_code(404);
        exit('404');
    }

    /**
     * Détermine si la requête vise la page d'entrée d'une aventure.
     */
    protected function isLandingPage(array $config, Request $request): bool
    {
        $landingSuffix = '/aventures/' . ($config['slug'] ?? '');
        $requestPath = rtrim($request->path(), '/');

        return $requestPath === rtrim($landingSuffix, '/')
            || str_ends_with($requestPath, rtrim($landingSuffix, '/'));
    }
}
