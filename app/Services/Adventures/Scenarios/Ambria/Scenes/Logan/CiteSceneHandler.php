<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class CiteSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'submit_enavant') {
            return $this->handleEnAvant($state, $request);
        }

        return parent::handle($config, $state, $request);
    }

    private function handleEnAvant(AdventureState $state, Request $request): AdventureActionResult
    {
        $answer = $this->normalizeInput((string) $request->post('enavant', ''));

        if ($answer !== 'premiereprime') {
            return new AdventureActionResult(
                nextScene: 'logan_cite',
                stateChanges: ['logan_cite_variant' => 'wrong_enavant'],
            );
        }

        return new AdventureActionResult(
            nextScene: 'logan_cite',
            stateChanges: [
                'logan_cite_variant' => 'first_prime',
            ],
        );
    }
}
