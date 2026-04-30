<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Database;
use App\Core\Request;
use App\Repositories\ScenarioCommentRepository;
use App\Services\Account\AuthService;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Notifications\AdminNotificationMailer;

/**
 * Gere l'épilogue et les commentaires de fin.
 */
class FinSceneHandler implements AdventureSceneHandler
{
    private const string SCENARIO = 'Last Party';
    private const string SCENE = 'ebaubi';

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return (bool) $state->get('final_revealed', false)
            ? 'completed'
            : 'revelation';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        $comments = new ScenarioCommentRepository(Database::get());
        $page = max(1, (int) $request->query('page', 1));
        $perPage = 5;
        $total = $comments->countForScenario(self::SCENARIO);
        $pageCount = min(10, max(1, (int) ceil($total / $perPage)));
        $currentUser = AuthService::user();

        return [
            'finalRevealed' => (bool) $state->get('final_revealed', false),
            'comments' => $comments->getForScenario(self::SCENARIO, min($page, $pageCount), $perPage),
            'commentPage' => min($page, $pageCount),
            'commentPageCount' => $pageCount,
            'commentTotal' => $total,
            'commentDefaultPseudo' => $currentUser['pseudo'] ?? '',
            'commentScenario' => self::SCENARIO,
            'commentScene' => self::SCENE,
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'finish_story') {
            return new AdventureActionResult(
                nextScene: self::SCENE,
                stateChanges: ['final_revealed' => true],
                achievements: [
                    ['scenario' => 'general', 'name' => 'fin'],
                    ['scenario' => 'lastparty', 'name' => 'fin'],
                ],
            );
        }

        if ($action === 'submit_comment') {
            return $this->submitComment($request);
        }

        return new AdventureActionResult(nextScene: self::SCENE);
    }

    private function submitComment(Request $request): AdventureActionResult
    {
        $currentUser = AuthService::user();
        $pseudo = $currentUser['pseudo'] ?? (string) $request->post('nom', '');
        $message = (string) $request->post('message', '');
        $note = (int) $request->post('note', 0);

        if (trim($pseudo) === '' || trim($message) === '' || $note < 1 || $note > 5) {
            return new AdventureActionResult(
                nextScene: self::SCENE,
                flashMessage: 'Veuillez renseigner un nom, une note et un message.',
                flashType: 'error',
            );
        }

        $comments = new ScenarioCommentRepository(Database::get());
        $comments->add(self::SCENARIO, $pseudo, $message, $note);
        (new AdminNotificationMailer())->notifyNewComment($pseudo, self::SCENARIO, $message);

        return new AdventureActionResult(
            nextScene: self::SCENE,
            stateChanges: ['final_revealed' => true],
            achievements: [
                ['scenario' => 'general', 'name' => 'commentaire'],
            ],
            flashMessage: "Merci d'avoir enregistré votre commentaire, " . mb_substr(trim($pseudo), 0, 20) . " !",
            flashType: 'success',
        );
    }
}
