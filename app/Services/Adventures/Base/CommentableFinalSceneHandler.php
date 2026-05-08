<?php

namespace App\Services\Adventures\Base;

use App\Core\Database;
use App\Core\Request;
use App\Repositories\ScenarioCommentRepository;
use App\Services\Account\AuthService;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Notifications\AdminNotificationMailer;

abstract class CommentableFinalSceneHandler implements AdventureSceneHandler
{
    abstract protected function commentScenario(): string;

    abstract protected function finalScene(): string;

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        if (!$this->canShowComments($state)) {
            return $this->extraViewData($config, $state, $request, $isLandingPage);
        }

        $comments = new ScenarioCommentRepository(Database::get());
        $page = max(1, (int) $request->query('page', 1));
        $perPage = 5;
        $total = $comments->countForScenario($this->commentScenario());
        $pageCount = min(10, max(1, (int) ceil($total / $perPage)));
        $currentUser = AuthService::user();

        return array_merge($this->extraViewData($config, $state, $request, $isLandingPage), [
            'comments' => $comments->getForScenario($this->commentScenario(), min($page, $pageCount), $perPage),
            'commentPage' => min($page, $pageCount),
            'commentPageCount' => $pageCount,
            'commentTotal' => $total,
            'commentDefaultPseudo' => $currentUser['pseudo'] ?? '',
            'commentScenario' => $this->commentScenario(),
            'commentScene' => $this->finalScene(),
        ]);
    }

    protected function canShowComments(AdventureState $state): bool
    {
        return true;
    }

    protected function extraViewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [];
    }

    protected function submitComment(Request $request, array $stateChanges = [], array $achievements = []): AdventureActionResult
    {
        $currentUser = AuthService::user();
        $pseudo = $currentUser['pseudo'] ?? (string) $request->post('nom', '');
        $message = (string) $request->post('message', '');
        $note = (int) $request->post('note', 0);

        if (trim($pseudo) === '' || trim($message) === '' || $note < 1 || $note > 5) {
            return new AdventureActionResult(
                nextScene: $this->finalScene(),
                flashMessage: 'Veuillez renseigner un nom, une note et un message.',
                flashType: 'error',
            );
        }

        $comments = new ScenarioCommentRepository(Database::get());
        $comments->add($this->commentScenario(), $pseudo, $message, $note);
        (new AdminNotificationMailer())->notifyNewComment($pseudo, $this->commentScenario(), $message);

        return new AdventureActionResult(
            nextScene: $this->finalScene(),
            stateChanges: $stateChanges,
            achievements: array_merge([
                ['scenario' => 'general', 'name' => 'commentaire'],
            ], $achievements),
            flashMessage: "Merci d'avoir enregistré votre commentaire, " . mb_substr(trim($pseudo), 0, 20) . " !",
            flashType: 'success',
        );
    }
}
