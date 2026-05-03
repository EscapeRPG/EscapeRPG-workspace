<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class BibliothequeSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'bibliotheque_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('bibliotheque_magna', false) && (bool) $state->get('bibliotheque_templar', false)) {
            return 'done';
        }

        $response = $state->get('bibliotheque_response');
        return is_string($response) && $response !== '' ? $response : 'default';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $inventory = (array) $state->get('inventory', []);
        $action = (string) $request->post('action', '');

        if ($action === 'take_magna') {
            return new AdventureActionResult(nextScene: 'bibliotheque', stateChanges: [
                'bibliotheque_magna' => true,
                'bibliotheque_response' => 'take_magna',
                'inventory' => $this->mergeNotes($inventory, ['magnamater']),
            ]);
        }

        if ($action === 'take_templar') {
            return new AdventureActionResult(nextScene: 'bibliotheque', stateChanges: [
                'bibliotheque_templar' => true,
                'bibliotheque_response' => 'take_templar',
                'inventory' => $this->mergeNotes($inventory, ['templar']),
            ]);
        }

        $response = $this->resolveInput((string) $request->post('bibliotheque', ''), [
            'symbole',
            'opusfavori',
            'magnamater',
        ]);

        return new AdventureActionResult(nextScene: 'bibliotheque', stateChanges: [
            'bibliotheque_response' => $response,
        ]);
    }
}
