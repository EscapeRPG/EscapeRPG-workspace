<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class PortesCiteSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $variant = parent::variant($state, $request, $isLandingPage);

        if ($variant !== 'entry') {
            return $variant;
        }

        return (bool) $state->get('portescite', false) ? 'porte' : 'entry';
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'observe_porte' => new AdventureActionResult(
                nextScene: 'logan_portescite',
                stateChanges: ['logan_portescite_variant' => 'porte', 'portescite' => true],
            ),
            'submit_boulets' => $this->handleBoulets($request),
            'enter_cite' => new AdventureActionResult(
                nextScene: 'logan_cite',
                stateChanges: ['logan_cite_variant' => 'entry', 'ile' => false],
                achievements: [['scenario' => 'ambria', 'name' => 'ambria']],
            ),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handleBoulets(Request $request): AdventureActionResult
    {
        $first = trim((string) $request->post('boule1', ''));
        $second = trim((string) $request->post('boule2', ''));
        $third = trim((string) $request->post('boule3', ''));

        return new AdventureActionResult(
            nextScene: 'logan_portescite',
            stateChanges: [
                'logan_portescite_variant' => $first === '4' && $second === '8' && $third === '6' ? 'opened' : 'wrong_boulets',
                'portescite' => true,
            ],
        );
    }
}
