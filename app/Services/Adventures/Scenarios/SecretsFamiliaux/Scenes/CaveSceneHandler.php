<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class CaveSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'cave_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $response = $state->get('cave_response');
        return is_string($response) && $response !== '' ? $response : 'default';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') === 'take_tableau') {
            return new AdventureActionResult(nextScene: 'cave', stateChanges: [
                'cave_response' => 'take_tableau',
                'cave_tableau_found' => true,
                'inventory' => $this->mergeNotes((array) $state->get('inventory', []), ['tableaubrule']),
            ]);
        }

        $response = (string) $request->post('action', '') === 'chercher'
            ? $this->resolveInput((string) $request->post('cave', ''), ['fuite', 'restes'])
            : 'default';

        return new AdventureActionResult(nextScene: 'cave', stateChanges: [
            'cave_response' => $response,
        ]);
    }
}
