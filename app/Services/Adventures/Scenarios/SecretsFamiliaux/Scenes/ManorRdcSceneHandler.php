<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class ManorRdcSceneHandler extends SimpleSceneHandler
{
    public function __construct()
    {
        parent::__construct(stepKey: 'rdc_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool)$state->get('pellington_visit', false)) {
            return 'after_pellington';
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return new AdventureActionResult(nextScene: 'rdc');
    }
}
