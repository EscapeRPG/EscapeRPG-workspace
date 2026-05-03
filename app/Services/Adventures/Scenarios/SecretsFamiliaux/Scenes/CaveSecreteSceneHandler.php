<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class CaveSecreteSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'cavesecrete_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $response = $state->get('cavesecrete_response');
        if (is_string($response) && $response !== '') {
            return $response;
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'suivant' => new AdventureActionResult(nextScene: 'cavesecrete', stateChanges: [
                'cavesecrete_step' => 1,
                'cavesecrete_response' => null,
            ]),
            'suivant2' => new AdventureActionResult(nextScene: 'cavesecrete', stateChanges: [
                'cavesecrete_step' => 2,
                'cavesecrete_response' => null,
            ], achievements: [
                ['scenario' => 'secretsfamiliaux', 'name' => 'vérité'],
            ]),
            'take_journals' => $this->takeJournals($state),
            'suivant3' => new AdventureActionResult(nextScene: 'cavesecrete', stateChanges: [
                'cavesecrete_step' => 4,
                'cavesecrete_response' => null,
            ]),
            'inspect' => $this->inspectCave($request),
            'think' => new AdventureActionResult(nextScene: 'pensees', stateChanges: [
                'cavesecrete_response' => null,
            ]),
            'retour' => new AdventureActionResult(nextScene: 'bureauprive2', stateChanges: [
                'cavesecrete_response' => null,
            ]),
            default => new AdventureActionResult(nextScene: 'cavesecrete'),
        };
    }

    private function takeJournals(AdventureState $state): AdventureActionResult
    {
        $inventory = (array) $state->get('inventory', []);
        $achievements = [];

        if (in_array('journal1', $inventory, true)) {
            $achievements[] = ['scenario' => 'secretsfamiliaux', 'name' => 'journal'];
        }

        return new AdventureActionResult(nextScene: 'cavesecrete', stateChanges: [
            'cavesecrete_step' => 3,
            'cavesecrete_response' => null,
            'inventory' => $this->mergeNotes($inventory, ['journal2', 'journal5', 'journal6', 'journal7', 'journal8', 'journal9']),
        ], achievements: $achievements);
    }

    private function inspectCave(Request $request): AdventureActionResult
    {
        $response = $this->resolveInput((string) $request->post('cave', ''), [
            'liquidejaunatre',
            'cadavres',
        ]);

        return new AdventureActionResult(nextScene: 'cavesecrete', stateChanges: [
            'cavesecrete_response' => $response,
        ]);
    }
}
