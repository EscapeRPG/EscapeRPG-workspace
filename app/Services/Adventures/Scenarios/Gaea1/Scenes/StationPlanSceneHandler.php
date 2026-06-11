<?php

namespace App\Services\Adventures\Scenarios\Gaea1\Scenes;

use App\Core\Request;
use App\Services\Adventures\Engine\AdventureActionResult;
use App\Services\Adventures\Engine\AdventureState;

class StationPlanSceneHandler extends Gaea1SceneHandler
{
    public function handle(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        if ((string) $request->post('action', '') === 'enter_station_room') {
            return $this->enterStationRoom($config, $state, $request);
        }

        return parent::handle($config, $state, $request);
    }

    /**
     * @param array<string, mixed> $config
     */
    private function enterStationRoom(array $config, AdventureState $state, Request $request): AdventureActionResult
    {
        $rooms = is_array($config['station_rooms'] ?? null) ? $config['station_rooms'] : [];
        $code = (string) $request->post('room', '');
        $room = is_array($rooms[$code] ?? null) ? $rooms[$code] : null;

        if ($room === null) {
            return new AdventureActionResult(
                nextScene: 'plan',
                stateChanges: ['plan_error' => 'Cette destination est inconnue.'],
            );
        }

        if (!$this->stationRoomAccessible($code, $room, $rooms, $state)) {
            return new AdventureActionResult(
                nextScene: 'plan',
                flashMessage: 'Vous ne pouvez pas essayer d\'entrer ici avant d\'avoir visité au moins l\'une des salles attenantes.',
                flashType: 'adventure_modal',
            );
        }

        if (($room['enabled'] ?? false) !== true) {
            return new AdventureActionResult(
                nextScene: 'plan',
                stateChanges: ['plan_error' => 'Cette salle sera explorée dans la suite de la migration.'],
            );
        }

        $scene = (string) ($room['scene'] ?? 'plan');
        $requiredState = (string) ($room['required_state'] ?? '');
        if ($requiredState !== '' && !(bool) $state->get($requiredState, false)) {
            return new AdventureActionResult(
                nextScene: $scene,
                stateChanges: [
                    'plancurrent' => null,
                    'plan_error' => '',
                    'visitestation' => true,
                    $scene . '_variant' => 'invalid_access',
                ],
            );
        }
        $requiredAnyState = array_values(array_filter((array) ($room['required_any_state'] ?? []), 'is_string'));
        if ($requiredAnyState !== []) {
            $allowed = false;
            foreach ($requiredAnyState as $stateName) {
                if ((bool) $state->get($stateName, false)) {
                    $allowed = true;
                    break;
                }
            }

            if (!$allowed) {
                return new AdventureActionResult(
                    nextScene: $scene,
                    stateChanges: [
                        'plancurrent' => null,
                        'plan_error' => '',
                        'visitestation' => true,
                        $scene . '_variant' => 'invalid_access',
                    ],
                );
            }
        }

        $visitedState = (string) ($room['visited_state'] ?? '');
        $testedState = (string) ($room['tested_state'] ?? '');
        $wasVisited = $visitedState !== '' && (bool) $state->get($visitedState, false);

        if (($room['blocked_without_power'] ?? false) === true && !(bool) $state->get('poweron', false)) {
            $changes = [
                'plancurrent' => null,
                'plan_error' => '',
                'visitestation' => true,
                $scene . '_variant' => 'blocked',
            ];
            if ($testedState !== '') {
                $changes[$testedState] = true;
            }

            return new AdventureActionResult(nextScene: $scene, stateChanges: $changes);
        }

        $changes = [
            'plancurrent' => $code,
            'plan_error' => '',
            'premiereobservation' => false,
            'visitestation' => true,
            $scene . '_variant' => $wasVisited ? 'revisit' : 'entry',
        ];
        if ($testedState !== '') {
            $changes[$testedState] = true;
        }
        if ($visitedState !== '' && ($room['mark_visited_on_entry'] ?? true) !== false) {
            $changes[$visitedState] = true;
        }

        if (($room['event_state'] ?? '') === 'eventa' && $code === 'o' && !(bool) $state->get('eventa', false) && random_int(0, 100) <= 40) {
            $changes['eventa'] = true;
            $changes[$scene . '_variant'] = 'event';
        }
        if (($room['event_state'] ?? '') === 'eventb' && $code === 'd' && !(bool) $state->get('eventb', false) && random_int(0, 100) <= (int) ($room['event_chance'] ?? 10)) {
            $changes['eventb'] = true;
            $changes[$scene . '_variant'] = $wasVisited ? 'event_search' : 'event_entry';
        }

        $oxygenDelta = (int) ($room['oxygen_delta_on_first_visit'] ?? 0);
        if ($oxygenDelta !== 0 && !$wasVisited) {
            $changes['oxygene'] = max(0, (int) $state->get('oxygene', 100) + $oxygenDelta);
        }

        return new AdventureActionResult(nextScene: $scene, stateChanges: $changes);
    }

    /**
     * @param array<string, mixed> $room
     * @param array<string, mixed> $rooms
     */
    private function stationRoomAccessible(string $code, array $room, array $rooms, AdventureState $state): bool
    {
        if ((bool) $state->get((string) ($room['visited_state'] ?? ''), false)) {
            return true;
        }

        foreach ((array) ($room['neighbors'] ?? []) as $neighborCode) {
            $neighbor = is_array($rooms[$neighborCode] ?? null) ? $rooms[$neighborCode] : null;
            if ($neighbor !== null && (bool) $state->get((string) ($neighbor['visited_state'] ?? ''), false)) {
                return true;
            }
        }

        return in_array($code, ['q', 'r', 'l'], true);
    }
}
