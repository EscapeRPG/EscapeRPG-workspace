<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class ShipSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return match ($this->scene) {
            'logan_pontprincipal' => $this->pontPrincipalVariant($state),
            'logan_pontinferieur' => (bool) $state->get('loganavecjake', false) ? 'jake' : 'default',
            'logan_dunette' => $this->dunetteVariant($state),
            'logan_mess' => (bool) $state->get('dunettevisitee', false) ? 'request_food' : 'default',
            'logan_cabine' => (bool) $state->get('ambrialogantrouve', false)
                ? parent::variant($state, $request, $isLandingPage)
                : 'locked',
            default => parent::variant($state, $request, $isLandingPage),
        };
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'continue_flots' => new AdventureActionResult(
                nextScene: 'logan_flots',
                stateChanges: ['logan_flots_variant' => 'deck', 'flots' => true],
            ),
            'help_sailors' => new AdventureActionResult(
                nextScene: 'logan_pontprincipal',
                stateChanges: [
                    'logan_pontprincipal_variant' => 'helped',
                    'loganaide' => true,
                    'loganavecjake' => true,
                    'loganconfiance' => (int) $state->get('loganconfiance', 0) + 10,
                ],
            ),
            'visit_ship' => new AdventureActionResult(
                nextScene: 'logan_pontprincipal',
                stateChanges: [
                    'logan_pontprincipal_variant' => 'skipped_help',
                    'loganpasaide' => true,
                    'loganavecjake' => true,
                    'loganconfiance' => (int) $state->get('loganconfiance', 0) - 10,
                ],
            ),
            'follow_jake' => new AdventureActionResult(
                nextScene: 'logan_pontinferieur',
                stateChanges: [
                    'logan_pontinferieur_variant' => 'jake',
                    'logan_pontprincipal_variant' => (bool) $state->get('loganaide', false) ? 'repeat_helped' : 'repeat_skipped',
                ],
            ),
            'continue_quarters' => new AdventureActionResult(
                nextScene: 'logan_quartierdesequipages',
                stateChanges: ['logan_quartierdesequipages_variant' => 'jake', 'loganavecjake' => false],
            ),
            'take_victuals' => new AdventureActionResult(
                nextScene: 'logan_mess',
                stateChanges: [
                    'logan_mess_variant' => 'taken',
                    'dunettevisitee' => false,
                    'victuailles' => true,
                    'inventory' => $this->mergeInventory($state, ['victuailles']),
                ],
            ),
            'give_victuals' => new AdventureActionResult(
                nextScene: 'logan_dunette',
                stateChanges: [
                    'logan_dunette_variant' => 'delivered',
                    'victuailles' => false,
                    'dunetteok' => true,
                    'loganconfiance' => (int) $state->get('loganconfiance', 0) + 10,
                    'inventory' => $this->removeInventory($state, ['victuailles']),
                ],
            ),
            'leave_dunette' => new AdventureActionResult(
                nextScene: 'logan_dunette',
                stateChanges: ['logan_dunette_variant' => 'visited', 'dunettevisitee' => true],
            ),
            'submit_dice_password' => $this->handleDicePassword((string) $request->post('capitaine', '')),
            'continue_parchment' => new AdventureActionResult(
                nextScene: 'logan_cabine',
                stateChanges: ['logan_cabine_variant' => 'parchment'],
            ),
            'submit_cap' => $this->handleCapPassword($state, (string) $request->post('cap', '')),
            default => parent::handle($config, $state, $request),
        };
    }

    private function pontPrincipalVariant(AdventureState $state): string
    {
        $stored = (string) $state->get('logan_pontprincipal_variant', '');
        if ($stored !== '' && $stored !== 'entry') {
            return $stored;
        }

        if ((bool) $state->get('loganpasaide', false)) {
            return 'repeat_skipped';
        }

        if ((bool) $state->get('loganaide', false)) {
            return 'repeat_helped';
        }

        return parent::variant($state, Request::capture());
    }

    private function dunetteVariant(AdventureState $state): string
    {
        if ((bool) $state->get('dunetteok', false)) {
            return 'done';
        }

        if ((bool) $state->get('victuailles', false)) {
            return 'carrying_food';
        }

        return parent::variant($state, Request::capture());
    }

    private function handleDicePassword(string $answer): AdventureActionResult
    {
        if ($this->normalizeInput($answer) !== 'suismoi') {
            return new AdventureActionResult(
                nextScene: 'logan_cale',
                stateChanges: ['logan_cale_variant' => 'wrong_password'],
            );
        }

        return new AdventureActionResult(
            nextScene: 'logan_cabine',
            stateChanges: [
                'ambrialogantrouve' => true,
                'logan_cabine_variant' => 'entry',
            ],
        );
    }

    private function handleCapPassword(AdventureState $state, string $answer): AdventureActionResult
    {
        if ($this->normalizeInput($answer) !== 'toutlemondeasonposte') {
            return new AdventureActionResult(
                nextScene: 'logan_cabine',
                stateChanges: ['logan_cabine_variant' => 'wrong_cap'],
            );
        }

        return new AdventureActionResult(
            nextScene: 'logan_tempete',
            stateChanges: [
                'logan_tempete_variant' => 'entry',
                'cap' => true,
            ],
            achievements: [['scenario' => 'ambria', 'name' => 'cap']],
        );
    }
}
