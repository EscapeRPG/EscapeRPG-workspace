<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class AileSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'aile_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $response = $state->get('aile_response');

        return is_string($response) && $response !== ''
            ? $response
            : 'default';
    }

    public function viewData(array $config, AdventureState $state, Request $request, bool $isLandingPage = false): array
    {
        return [
            'response' => $state->get('aile_response'),
        ];
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') !== 'interroger') {
            return new AdventureActionResult(nextScene: 'aile');
        }

        $response = $this->resolveInput((string) $request->post('domestiques', ''), [
            'pellington',
            'domestiques',
            'teona',
            'monica',
            'mmenouveau',
            'gaspard',
            'soucis',
            'odeur',
            'symbole',
            'bureau',
            'coupuresdecourant',
            'tableau',
            'opusfavori',
        ]);

        return new AdventureActionResult(
            nextScene: 'aile',
            stateChanges: [
                'aile_response' => $response,
            ],
        );
    }
}
