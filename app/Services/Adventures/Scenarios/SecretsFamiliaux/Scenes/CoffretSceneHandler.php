<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Support\UserInputNormalizer;

class CoffretSceneHandler extends SimpleSceneHandler
{
    use UserInputNormalizer;

    public function __construct()
    {
        parent::__construct(stepKey: 'coffret_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if (!in_array('coffret', (array) $state->get('inventory', []), true) && !(bool) $state->get('coffret_opened', false)) {
            return 'missing';
        }

        if ((bool) $state->get('coffret_opened', false)) {
            return 'puzzle';
        }

        return match ((int) $state->get('coffret_step', 0)) {
            1 => 'wrong',
            default => 'closed',
        };
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');
        if ($action === 'retour') {
            return new AdventureActionResult(nextScene: 'chambre');
        }

        if ($action !== 'inspect_coffret') {
            return new AdventureActionResult(nextScene: 'coffret');
        }

        if (!$this->inputMatches((string) $request->post('coffret', ''), 'aeb6fcu2m8')) {
            return new AdventureActionResult(nextScene: 'coffret', stateChanges: [
                'coffret_step' => 1,
            ]);
        }

        return new AdventureActionResult(nextScene: 'coffret', stateChanges: [
            'coffret_step' => 0,
            'coffret_opened' => true,
        ]);
    }
}
