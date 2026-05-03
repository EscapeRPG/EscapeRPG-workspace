<?php

namespace App\Services\Adventures\Scenarios\SecretsFamiliaux\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class SalleDeBainSceneHandler extends SimpleSceneHandler
{
    private const string SCENE = 'salledebain';

    /**
     * @var array<string, string>
     */
    private const array ANTIDOTE_RECIPE = [
        '1' => '0',
        '2' => '0',
        '3' => '30',
        '4' => '15',
        '5' => '0',
        '6' => '0',
        '7' => '50',
        '8' => '0',
        '9' => '0',
    ];

    public function __construct()
    {
        parent::__construct(stepKey: 'pellington_salledebain_step');
    }

    public function variant(AdventureState $state, Request $request, bool $isLandingPage = false): string
    {
        $step = (int) $state->get('pellington_salledebain_step', 0);

        if ($step === 3) {
            return 'acquired';
        }

        if (in_array('analeptique', (array) $state->get('inventory', []), true)) {
            return 'done';
        }

        return match ($step) {
            1 => 'armoire',
            2 => 'success',
            4 => 'failed',
            default => (bool) $state->get('pellington_armoire_opened', false) ? 'opened' : 'step_0',
        };
    }

    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        return match ((string) $request->post('action', '')) {
            'open_armoire' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_armoire_opened' => true,
                'pellington_salledebain_step' => 1,
            ]),
            'melanger' => $this->handleMix($state, $request),
            'take_analeptique' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_salledebain_step' => 3,
                'inventory' => $this->mergeNotes((array) $state->get('inventory', []), ['analeptique']),
            ]),
            'retour' => new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_salledebain_step' => 0,
            ]),
            default => new AdventureActionResult(nextScene: self::SCENE),
        };
    }

    private function handleMix(AdventureState $state, Request $request): AdventureActionResult
    {
        $isCorrect = true;
        foreach (self::ANTIDOTE_RECIPE as $field => $expected) {
            if ((string) $request->post($field, '') !== $expected) {
                $isCorrect = false;
                break;
            }
        }

        if (!$isCorrect) {
            return new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
                'pellington_armoire_opened' => true,
                'pellington_salledebain_step' => 4,
            ]);
        }

        return new AdventureActionResult(nextScene: self::SCENE, stateChanges: [
            'pellington_armoire_opened' => true,
            'pellington_salledebain_step' => 2,
        ]);
    }
}
