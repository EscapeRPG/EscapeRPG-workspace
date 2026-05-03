<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class ChambreSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'chambre_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((int)$state->get('chambre_step', 0) === 3 && (bool)$state->get('pellington_visit', false)) {
            return match ((int)$state->get('chambre_safe_step', 0)) {
                1 => 'safe_1',
                2 => 'safe_2',
                3 => 'safe_3',
                4 => 'safe_wrong',
                5 => 'safe_opened',
                6 => 'safe_coffret',
                7 => 'safe_empty',
                default => 'safe_0',
            };
        }

        if ((int)$state->get('chambre_step', 0) > 0) {
            return parent::variant($state, $request, $isLandingPage);
        }

        if ((bool)$state->get('chambre_coffre_seen', false)) {
            return 'coffre';
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string)$request->post('action', '')) {
            'tableau' => new AdventureActionResult(
                nextScene: 'chambre',
                stateChanges: [
                    'chambre_coffre_seen' => true,
                ]),
            'coffre' => new AdventureActionResult(
                nextScene: 'chambre',
                stateChanges: [
                    'chambre_step' => 3,
                    'chambre_safe_step' => (bool)$state->get('chambre_coffret_taken', false)
                        ? 7
                        : ((bool)$state->get('chambre_safe_opened', false) ? 5 : 0),
                    'chambre_safe_combination' => '',
                ]),
            'safe_left' => $this->handleSafeTurn($state, $request, 'g'),
            'safe_right' => $this->handleSafeTurn($state, $request, 'd'),
            'take_safe_items' => new AdventureActionResult(
                nextScene: 'chambre',
                stateChanges: [
                    'chambre_step' => 3,
                    'chambre_safe_step' => 6,
                    'inventory' => $this->mergeNotes((array)$state->get('inventory', []), ['piecedi', 'oldcle']),
                ]),
            'take_coffret' => new AdventureActionResult(
                nextScene: 'chambre',
                stateChanges: [
                    'chambre_step' => 3,
                    'chambre_safe_step' => 7,
                    'chambre_coffret_taken' => true,
                    'inventory' => $this->mergeNotes((array)$state->get('inventory', []), ['coffret']),
                ]),
            'study_coffret' => new AdventureActionResult(nextScene: 'coffret'),
            'piece' => new AdventureActionResult(
                nextScene: 'chambre',
                stateChanges: [
                    'chambre_step' => 1
                ]),
            'take_piece' => new AdventureActionResult(
                nextScene: 'chambre',
                stateChanges: [
                    'chambre_step' => 2,
                    'inventory' => $this->mergeNotes((array)$state->get('inventory', []), ['piecead']),
                ]),
            'retour' => new AdventureActionResult(
                nextScene: 'chambre',
                stateChanges: [
                    'chambre_step' => 0
                ]),
            default => new AdventureActionResult(
                nextScene: 'chambre'
            ),
        };
    }

    private function handleSafeTurn(AdventureState $state, Request $request, string $direction): AdventureActionResult
    {
        $digit = trim((string)$request->post('combinaison_digit', ''));
        if (!preg_match('/^\d$/', $digit)) {
            return $this->safeWrong();
        }

        $combination = (string)$state->get('chambre_safe_combination', '');
        $combination .= $direction . $digit;
        $turns = intdiv(strlen($combination), 2);

        if ($turns >= 4) {
            if ($combination === 'd2d9g4d7') {
                return new AdventureActionResult(
                    nextScene: 'chambre',
                    stateChanges: [
                        'chambre_step' => 3,
                        'chambre_safe_step' => 5,
                        'chambre_safe_opened' => true,
                        'chambre_safe_combination' => '',
                    ],
                    achievements: [
                        ['scenario' => 'secretsfamiliaux', 'name' => 'coffre'],
                    ],
                );
            }

            return $this->safeWrong();
        }

        return new AdventureActionResult(nextScene: 'chambre', stateChanges: [
            'chambre_step' => 3,
            'chambre_safe_step' => $turns,
            'chambre_safe_combination' => $combination,
        ]);
    }

    private function safeWrong(): AdventureActionResult
    {
        return new AdventureActionResult(nextScene: 'chambre', stateChanges: [
            'chambre_step' => 3,
            'chambre_safe_step' => 4,
            'chambre_safe_combination' => '',
        ]);
    }
}
