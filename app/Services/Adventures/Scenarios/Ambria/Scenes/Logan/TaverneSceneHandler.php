<?php

namespace App\Services\Adventures\Scenarios\Ambria\Scenes\Logan;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;
use App\Services\Adventures\Scenarios\Ambria\Scenes\AmbriaSceneHandler;

class TaverneSceneHandler extends AmbriaSceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $action = (string) $request->post('action', '');

        if ($action === 'submit_password') {
            $answer = $this->normalizeInput((string) $request->post('objet', ''));

            if ($answer === 'cestatoijecrois') {
                return new AdventureActionResult(
                    nextScene: 'logan_taverne',
                    stateChanges: [
                        'logan_taverne_variant' => 'sullivan_arrival',
                        'logan_taverne_password_found' => true,
                    ],
                );
            }

            return new AdventureActionResult(
                nextScene: 'logan_taverne',
                stateChanges: ['logan_taverne_variant' => 'wrong_password'],
            );
        }

        return parent::handle($config, $state, $request);
    }
}
