<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class PenseesSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'pensees_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $response = $state->get('pensees_response');

        return is_string($response) && $response !== '' ? $response : 'default';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');
        if ($action === 'retour_cimetiere') {
            return new AdventureActionResult(nextScene: 'cimetiere');
        }

        $response = $this->resolveInput((string) $request->post('thoughts', ''), [
            'oncle',
            'votreonclepeutrevenir',
        ]);

        $stateChanges = [
            'pensees_response' => $response,
        ];

        if ($response === 'oncle') {
            $stateChanges['truth_discovered'] = true;
        }

        return new AdventureActionResult(nextScene: 'pensees', stateChanges: $stateChanges);
    }
}
