<?php

namespace App\Services\Adventures\Scenarios\Gaea1\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class KomunodekSceneHandler extends Gaea1SceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $variant = parent::variant($state, $request, $isLandingPage);
        if ($variant !== 'entry' && $variant !== 'revisit') {
            return $variant;
        }

        return $this->commandDeckVariant($state);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');
        if ($action === 'repair_with_cells') {
            $hasPass = in_array('deckPass', (array) $state->get('inventory', []), true);

            $inventory = array_values(array_filter(
                (array) $state->get('inventory', []),
                static fn (mixed $item): bool => $item !== 'energyCells',
            ));

            return new AdventureActionResult(
                nextScene: 'komunodek',
                stateChanges: [
                    'komunodek_variant' => $hasPass ? 'open_deck' : 'needs_pass_after_cells',
                    'deckpanel' => !$hasPass,
                    'deckopen' => $hasPass,
                    'etested' => true,
                    'evisited' => $hasPass,
                    'plancurrent' => $hasPass ? 'e' : null,
                    'inventory' => $inventory,
                    'oxygene' => max(0, (int) $state->get('oxygene', 100) - 10),
                ],
            );
        }

        if ($action === 'use_pass') {
            return new AdventureActionResult(
                nextScene: 'komunodek',
                stateChanges: [
                    'komunodek_variant' => 'open_deck',
                    'deckopen' => true,
                    'evisited' => true,
                    'plancurrent' => 'e',
                    'oxygene' => max(0, (int) $state->get('oxygene', 100) - 10),
                ],
            );
        }

        if ($action === 'connect_terminal') {
            $identifier = $this->normalizeInput((string) $request->post('identifiant', ''));
            $password = $this->normalizeInput((string) $request->post('motdepasse', ''));

            if ($identifier === 'ahyrdxbp718' && $password === 'gaeaikomunthyrd') {
                return new AdventureActionResult(
                    nextScene: 'komunodek',
                    stateChanges: [
                        'komunodek_variant' => 'login_success',
                        'hacking' => false,
                        'traduction' => true,
                        'notes' => $this->mergeNotes($state, ['a_hyrd_xbp718', 'GAEA-I_KomuntHyrd']),
                    ],
                    achievements: [['scenario' => 'gaea1', 'name' => 'hacking']],
                );
            }

            if ($identifier === 'ahyrdxbp718' && $password === 'hmpo62x4sdr') {
                return new AdventureActionResult(
                    nextScene: 'komunodek',
                    stateChanges: ['komunodek_variant' => 'encrypted_password'],
                );
            }

            if ($password === '0ff1s3r713') {
                return new AdventureActionResult(
                    nextScene: 'komunodek',
                    stateChanges: ['komunodek_variant' => 'officer_password'],
                    achievements: [['scenario' => 'gaea1', 'name' => 'offiser']],
                );
            }

            return new AdventureActionResult(
                nextScene: 'komunodek',
                stateChanges: ['komunodek_variant' => 'login_failure'],
            );
        }

        if ($action === 'translate_language') {
            return new AdventureActionResult(
                nextScene: 'komunodek',
                stateChanges: ['komunodek_variant' => 'translation', 'traduction' => true],
            );
        }

        if ($action === 'compile_language') {
            $success = (int) $request->post('schema1', 0) === 237
                && (int) $request->post('schema2', 0) === 555
                && (int) $request->post('schema3', 0) === 340;

            return new AdventureActionResult(
                nextScene: 'komunodek',
                stateChanges: [
                    'komunodek_variant' => $success ? 'translation_success' : 'translation_failure',
                    'traduction' => !$success,
                    'compilationterminee' => $success,
                ],
                achievements: $success ? [['scenario' => 'gaea1', 'name' => 'traducteur']] : [],
            );
        }

        if ($action === 'continue_after_translation') {
            return new AdventureActionResult(
                nextScene: 'komunodek',
                stateChanges: [
                    'komunodek_variant' => 'terminal_consultation',
                    'traduction' => false,
                    'terminal_consultation_seen' => true,
                    'oxygene' => max(0, (int) $state->get('oxygene', 100) - 10),
                ],
            );
        }

        return parent::handle($config, $state, $request);
    }

    private function commandDeckVariant(AdventureState $state): string
    {
        if ((bool) $state->get('deckopen', false)) {
            if ((bool) $state->get('terminal_consultation_seen', false)) {
                return 'terminal_consultation';
            }

            if ((bool) $state->get('compilationterminee', false)) {
                return 'translation_success';
            }

            if ((bool) $state->get('traduction', false)) {
                return 'translation';
            }

            if ((bool) $state->get('hacking', false)) {
                return 'hacking';
            }

            return 'deck_entry';
        }

        $inventory = (array) $state->get('inventory', []);
        $hasPass = in_array('deckPass', $inventory, true);
        $hasCells = in_array('energyCells', $inventory, true);

        if ((bool) $state->get('deckpanel', false) && $hasPass) {
            return 'ready_pass_after_panel';
        }

        if ($hasPass && $hasCells) {
            return 'ready_to_open';
        }

        if ($hasCells) {
            return 'ready_cells_only';
        }

        if ($hasPass) {
            return 'needs_cells';
        }

        return 'door_no_items';
    }
}
