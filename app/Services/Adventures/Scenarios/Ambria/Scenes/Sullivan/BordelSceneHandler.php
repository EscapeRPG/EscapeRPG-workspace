<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Sullivan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class BordelSceneHandler extends AmbriaSceneHandler
{
    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        if ((bool) $state->get('ambriapaul', false)) {
            return 'visited';
        }

        return parent::variant($state, $request, $isLandingPage);
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        return match ($action) {
            'give_paul' => $this->handlePaul($request),
            'talk_paul_map' => new AdventureActionResult(nextScene: 'sullivan_bordel', stateChanges: ['sullivan_bordel_variant' => 'paul_map']),
            'leave_paul' => $this->leavePaul($state),
            default => parent::handle($config, $state, $request),
        };
    }

    private function handlePaul(Request $request): AdventureActionResult
    {
        $success = $this->normalizeInput((string) $request->post('vieux', '')) === 'fonddewhisky';

        if (!$success) {
            return new AdventureActionResult(nextScene: 'sullivan_bordel', stateChanges: ['sullivan_bordel_variant' => 'wrong_paul']);
        }

        return new AdventureActionResult(nextScene: 'sullivan_bordel', stateChanges: ['sullivan_bordel_variant' => 'paul_drinks']);
    }

    private function leavePaul(AdventureState $state): AdventureActionResult
    {
        return new AdventureActionResult(
            nextScene: 'sullivan_bordel',
            stateChanges: [
                'sullivan_bordel_variant' => 'visited',
                'ambriapaul' => true,
                'ambriawhisky' => false,
                'inventory' => $this->removeInventory($state, ['ambriawhisky']),
            ],
        );
    }
}
