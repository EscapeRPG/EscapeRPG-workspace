<?php

namespace App\Services\Adventures\Base;

use App\Core\Request;
use App\Core\Session;
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
    protected Session $session;

    public function __construct()
    {
        $this->content = new AdventureContent();
        $this->hintManager = new AdventureHintManager();
        $this->session = new Session();
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
        $this->applyContentNotes($content, $state);
        $stateData = $state->all();

        return new AdventurePage(
            view: 'adventures/show',
            data: [
                'title' => ($config['title'] ?? 'Aventure') . ' - ' . ($sceneConfig['label'] ?? ucfirst($scene)),
                'adventure' => $config,
                'scene' => $scene,
                'sceneConfig' => $sceneConfig,
                'sceneView' => $this->sceneView($config, $scene, $sceneConfig),
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

    /**
     * @param array<string, mixed> $content
     */
    private function applyContentNotes(array $content, AdventureState $state): void
    {
        $notesToAdd = array_values(array_unique(array_filter(
            array_merge(
                $content['notes'] ?? [],
                $this->extractPasswordNotes($content),
            ),
            static fn (mixed $note): bool => is_string($note) && $note !== ''
        )));

        if ($notesToAdd === []) {
            return;
        }

        $notes = (array) $state->get('notes', []);
        $addedNotes = [];
        foreach ($notesToAdd as $note) {
            if (!in_array($note, $notes, true)) {
                $notes[] = $note;
                $addedNotes[] = $note;
            }
        }

        if ($addedNotes === []) {
            return;
        }

        $state->merge(['notes' => $notes]);
        $this->flashContentNoteToasts($addedNotes);
    }

    /**
     * @param array<int, string> $addedNotes
     */
    private function flashContentNoteToasts(array $addedNotes): void
    {
        $flash = $this->session->get('_flash', []);
        $currentToasts = is_array($flash['note_toasts'] ?? null) ? $flash['note_toasts'] : [];

        $this->session->flash('note_toasts', array_values(array_unique(array_merge(
            array_filter($currentToasts, static fn (mixed $note): bool => is_string($note) && $note !== ''),
            $addedNotes,
        ))));
    }

    /**
     * @param array<string, mixed> $content
     * @return array<int, string>
     */
    private function extractPasswordNotes(array $content): array
    {
        $notes = [];
        $this->collectPasswordNotes($content['blocks'] ?? [], $notes);

        return array_values(array_unique($notes));
    }

    /**
     * @param mixed $value
     * @param array<int, string> $notes
     */
    private function collectPasswordNotes(mixed $value, array &$notes): void
    {
        if (is_string($value)) {
            preg_match_all(
                '/<span\b[^>]*class=(["\'])(?=[^"\']*\bmdp\b)[^"\']*\1[^>]*>(.*?)<\/span>/is',
                $value,
                $matches
            );

            foreach ($matches[2] ?? [] as $match) {
                $note = $this->normalizePasswordNote($match);
                if ($note !== '') {
                    $notes[] = $note;
                }
            }

            return;
        }

        if (!is_array($value)) {
            return;
        }

        foreach ($value as $item) {
            $this->collectPasswordNotes($item, $notes);
        }
    }

    private function normalizePasswordNote(string $value): string
    {
        $note = trim(html_entity_decode(strip_tags($value), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        if ($note === '') {
            return '';
        }

        return mb_strtoupper(mb_substr($note, 0, 1, 'UTF-8'), 'UTF-8')
            . mb_substr($note, 1, null, 'UTF-8');
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
        if (array_key_exists($scene, $config['scenes'] ?? [])) {
            return $this->sceneConfig($config, $scene);
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
