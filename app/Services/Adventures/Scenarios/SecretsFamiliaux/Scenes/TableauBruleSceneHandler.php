<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class TableauBruleSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'tableaubrule_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        return in_array('tableaubrule', (array) $state->get('inventory', []), true)
            ? 'default'
            : 'missing';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'retour' => new AdventureActionResult(nextScene: 'cave'),
            default => new AdventureActionResult(nextScene: 'tableaubrule'),
        };
    }
}
