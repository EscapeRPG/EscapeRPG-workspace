<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AchievementService;
use App\Services\Adventures\AdventureActionResult;
use App\Services\Adventures\AdventureRegistry;
use App\Services\Adventures\AdventureState;

abstract class AdventureController extends Controller
{
    protected AdventureRegistry $adventures;

    public function __construct()
    {
        parent::__construct();
        $this->adventures = new AdventureRegistry();
    }

    protected function adventureConfig(string $slug): array
    {
        return $this->adventures->get($slug);
    }

    protected function ensureAdventureExists(string $slug): void
    {
        if ($this->adventures->has($slug)) {
            return;
        }

        http_response_code(404);
        exit('404');
    }

    protected function adventureState(string $slug): AdventureState
    {
        return new AdventureState($this->session, $slug, $this->adventureConfig($slug));
    }

    protected function renderAdventure(string $view, array $data = [], string $layout = 'main'): void
    {
        $this->view($view, $data, $layout);
    }

    protected function applyAdventureResult(
        string $slug,
        AdventureState $state,
        AdventureActionResult $result,
    ): array {
        if ($result->stateChanges !== []) {
            $state->merge($result->stateChanges);
        }

        if ($result->nextScene !== null) {
            $state->setScene($result->nextScene);
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
            $this->response->redirect('/aventures/' . $slug . '/' . $result->nextScene);
        }

        return $result->viewData;
    }
}
