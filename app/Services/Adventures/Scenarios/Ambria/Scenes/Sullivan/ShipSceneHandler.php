<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class ShipSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ($this->scene === 'sullivan_cale' && (bool) $state->get('ambrialoganlocalise', false) && !(bool) $state->get('ambrialogantrouve', false)) {
            return 'logan_found';
        }

        if ($this->scene === 'sullivan_cabine' && (bool) $state->get('ambrialogantrouve', false)) {
            return (string) $state->get('sullivan_cabine_variant', 'logan_entry');
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'ask_ship' => $this->handleShipQuestion($request),
            'wake_jake' => new AdventureActionResult(nextScene: 'sullivan_quartierdesequipages', stateChanges: ['sullivan_quartierdesequipages_variant' => 'jake_awake']),
            'go_to_cale' => new AdventureActionResult(nextScene: 'sullivan_cale', stateChanges: ['sullivan_cale_variant' => 'logan_found']),
            'bring_logan_cabin' => new AdventureActionResult(
                nextScene: 'sullivan_cabine',
                stateChanges: ['ambrialogantrouve' => true, 'sullivan_cabine_variant' => 'logan_entry'],
            ),
            'take_journal' => new AdventureActionResult(
                nextScene: 'sullivan_cabine',
                stateChanges: [
                    'sullivan_cabine_variant' => 'journal_taken',
                    'ambriajournalsullivan' => true,
                    'inventory' => $this->mergeInventory($state, ['ambriajournalsullivan']),
                ],
            ),
            'continue_cap_setup' => new AdventureActionResult(nextScene: 'sullivan_cabine', stateChanges: ['sullivan_cabine_variant' => 'cap_setup']),
            'cap_success' => new AdventureActionResult(
                nextScene: 'sullivan_tempete',
                stateChanges: [
                    'sullivan_tempete_variant' => 'entry',
                    'cap' => true,
                    'ambriajournalsullivan' => true,
                    'inventory' => $this->mergeInventory($state, ['ambriajournalsullivan']),
                ],
                achievements: [['scenario' => 'ambria', 'name' => 'cap']],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleShipQuestion(Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('ask', ''));
        $variant = match ($this->scene) {
            'sullivan_pontprincipal' => match ($answer) {
                'logan' => 'ask_logan',
                'jake' => 'ask_jake',
                default => 'ask_unknown',
            },
            'sullivan_dunette' => match ($answer) {
                'logan' => 'ask_logan',
                'jake' => 'ask_jake',
                default => 'ask_unknown',
            },
            'sullivan_pontinferieur' => match ($answer) {
                'logan' => 'ask_logan',
                'jake' => 'ask_jake',
                default => 'ask_unknown',
            },
            'sullivan_mess' => match ($answer) {
                'logan' => 'ask_logan',
                'jake' => 'ask_jake',
                default => 'ask_unknown',
            },
            'sullivan_quartierdesequipages' => match ($answer) {
                'logan' => 'ask_logan',
                'jake' => 'jake_found',
                default => 'ask_unknown',
            },
            default => 'entry',
        };

        $stateChanges = [$this->scene . '_variant' => $variant];
        if ($this->scene === 'sullivan_quartierdesequipages' && $variant === 'jake_found') {
            $stateChanges['ambrialoganlocalise'] = true;
        }

        return new AdventureActionResult(nextScene: $this->scene, stateChanges: $stateChanges);
    }
}
