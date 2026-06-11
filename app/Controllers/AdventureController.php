<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\Account\AchievementService;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\AdventureRegistry;

/**
 * Base commune aux contrôleurs d'aventures.
 *
 * Cette classe regroupe l'accès au registre des scénarios, à l'état
 * de progression et à l'application uniforme des résultats de flow.
 */
abstract class AdventureController extends Controller
{
    protected AdventureRegistry $adventures;

    /**
     * Initialise le registre des aventures disponibles.
     */
    public function __construct()
    {
        parent::__construct();
        $this->adventures = new AdventureRegistry();
    }

    /**
     * Retourne la configuration d'une aventure à partir de son slug.
     *
     * @return array<string, mixed>
     */
    protected function adventureConfig(string $slug): array
    {
        return $this->adventures->get($slug);
    }

    /**
     * Interrompt la requête si le slug demandé n'existe pas.
     */
    protected function ensureAdventureExists(string $slug): void
    {
        if ($this->adventures->has($slug)) {
            return;
        }

        $this->abort(404);
    }

    /**
     * Construit l'objet d'état associé à l'aventure courante.
     */
    protected function adventureState(string $slug): AdventureState
    {
        return new AdventureState($this->session, $slug, $this->adventureConfig($slug));
    }

    /**
     * Rend une page d'aventure dans le layout souhaité.
     *
     * @param array<string, mixed> $data
     */
    protected function renderAdventure(string $view, array $data = [], string $layout = 'main'): void
    {
        $this->view($view, $data, $layout);
    }

    /**
     * Applique les effets d'un résultat de flow sur l'état et la réponse HTTP.
     *
     * @return array<string, mixed>
     */
    protected function applyAdventureResult(
        string $slug,
        AdventureState $state,
        AdventureActionResult $result,
    ): array {
        $inventoryBefore = $this->stringListItems($state->all()['inventory'] ?? []);
        $notesBefore = $this->stringListItems($state->all()['notes'] ?? []);

        if ($result->replaceState !== null) {
            $state->replace($result->replaceState);
        } elseif ($result->resetState) {
            $state->reset();
        }

        if ($result->stateChanges !== []) {
            $state->merge($result->stateChanges);
        }

        if ($result->nextScene !== null) {
            $state->setScene($result->nextScene);
        }

        if (array_key_exists('inventory', $result->stateChanges)) {
            $inventoryAfter = $this->stringListItems($state->all()['inventory'] ?? []);
            $addedItems = array_values(array_diff($inventoryAfter, $inventoryBefore));

            if ($addedItems !== []) {
                $this->session->flash('inventory_toasts', $addedItems);
            }
        }

        if (array_key_exists('notes', $result->stateChanges)) {
            $notesAfter = $this->stringListItems($state->all()['notes'] ?? []);
            $addedNotes = array_values(array_diff($notesAfter, $notesBefore));

            if ($addedNotes !== []) {
                $this->session->flash(
                    'note_toasts',
                    array_map(
                        static fn (string $note): string => $note,
                        $addedNotes,
                    ),
                );
            }
        }

        if ($result->achievements !== []) {
            (new AchievementService())->grantMany($result->achievements, auth_user());
        }

        if ($result->flashMessage !== null) {
            $flashType = $result->flashType ?: 'success';
            $this->session->flash($flashType, $result->flashMessage);
        }

        if ($result->redirectTo !== null) {
            $this->response->redirect($result->redirectTo);
        }

        if ($result->nextScene !== null) {
            $config = $this->adventureConfig($slug);
            $sceneUrl = (string) (($config['scene_urls'][$result->nextScene] ?? null) ?: $result->nextScene);

            $this->response->redirect('/aventures/' . $slug . '/' . ltrim($sceneUrl, '/'));
        }

        return $result->viewData;
    }

    /**
     * @return array<int, string>
     */
    private function stringListItems(mixed $items): array
    {
        if (!is_array($items)) {
            return [];
        }

        return array_values(array_filter($items, static fn (mixed $item): bool => is_string($item) && $item !== ''));
    }
}
