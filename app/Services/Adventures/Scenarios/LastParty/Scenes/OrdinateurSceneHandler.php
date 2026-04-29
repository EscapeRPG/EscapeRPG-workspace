<?php

namespace App\Services\Adventures\Scenarios\LastParty\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureSceneHandler;
use App\Services\Adventures\Engine\AdventureState;

/**
 * Gere la connexion Faceeebook et la recherche du profil de Juliette.
 */
class OrdinateurSceneHandler implements AdventureSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('juliette_found', false)) {
            return 'juliette';
        }

        if ((bool) $state->get('computer_connected', false)) {
            return 'connected';
        }

        if ((bool) $state->get('carnet_acquired', false)) {
            return 'login';
        }

        return 'missing_notebook';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        $notes = $state->get('notes', []);

        return [
            'variant' => $this->variant($state, $request, $isLandingPage),
            'notes' => is_array($notes) ? $notes : [],
            'error' => $state->get('ordinateur_error'),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'back_to_room' => new AdventureActionResult(
                nextScene: 'appartement',
                stateChanges: [
                    'drawer_unlocked' => true,
                    'ordinateur_error' => null,
                ],
            ),
            'submit_login' => $this->submitLogin($state, $request),
            'search_profile' => $this->searchProfile($request),
            'return_to_phone' => new AdventureActionResult(
                nextScene: 'telephone',
                stateChanges: [
                    'faceeebook_seen' => true,
                    'telephone_step' => 3,
                    'ordinateur_error' => null,
                ],
            ),
            default => new AdventureActionResult(nextScene: 'ordinateur'),
        };
    }

    private function submitLogin(AdventureState $state, Request $request): AdventureActionResult
    {
        $username = $this->normalize((string) $request->post('identifiant', ''));
        $password = $this->normalize((string) $request->post('mdpasse', ''));

        if ($username !== 'jonathanlt' || $password !== 'party4ever') {
            return new AdventureActionResult(
                nextScene: 'ordinateur',
                stateChanges: ['ordinateur_error' => "Ca ne semble pas etre ca, avez-vous bien tape vos identifiants ?"],
            );
        }

        $inventory = $state->get('inventory', []);
        if (!is_array($inventory)) {
            $inventory = [];
        }

        $inventory = array_values(array_filter($inventory, static fn ($item): bool => $item !== 'carnet'));
        $notes = $state->get('notes', []);
        if (!is_array($notes)) {
            $notes = [];
        }

        if (!in_array('juliette', $notes, true)) {
            $notes[] = 'juliette';
        }

        return new AdventureActionResult(
            nextScene: 'ordinateur',
            stateChanges: [
                'computer_connected' => true,
                'ordinateur_error' => null,
                'inventory' => $inventory,
                'notes' => $notes,
            ],
            achievements: [
                ['scenario' => 'lastparty', 'name' => 'connexion'],
            ],
        );
    }

    private function searchProfile(Request $request): AdventureActionResult
    {
        $search = $this->normalize((string) $request->post('rechercher', ''));

        if ($search !== 'juliette') {
            return new AdventureActionResult(
                nextScene: 'ordinateur',
                stateChanges: ['ordinateur_error' => "Vous ne trouvez rien de pertinent avec cette recherche."],
            );
        }

        return new AdventureActionResult(
            nextScene: 'ordinateur',
            stateChanges: [
                'juliette_found' => true,
                'faceeebook_seen' => true,
                'ordinateur_error' => null,
            ],
            achievements: [
                ['scenario' => 'lastparty', 'name' => 'juliette'],
            ],
        );
    }

    private function normalize(string $value): string
    {
        $value = mb_strtolower(trim($value));

        return preg_replace('/[^a-z0-9]/', '', $value) ?? '';
    }
}
