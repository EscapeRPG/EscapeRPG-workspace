<?php

namespace App\Services\Adventures\Support;

use App\Core\Database;
use App\Repositories\AdventureSaveRepository;
use App\Services\Account\AuthService;

/**
 * Orchestre les sauvegardes d'aventure persistées en base.
 */
class AdventureSaveService
{
    private AdventureSaveRepository $repository;

    /**
     * Permet d'injecter un repository spécifique pour les tests ou l'extension.
     */
    public function __construct(
        ?AdventureSaveRepository $repository = null,
    ) {
        $this->repository = $repository ?? new AdventureSaveRepository(Database::get());
    }

    /**
     * Sauvegarde la progression du membre connecté.
     *
     * @param array<string, mixed> $state
     */
    public function saveForCurrentUser(string $scenarioSlug, array $state, string $scene): bool
    {
        $user = AuthService::user();
        if (!$user || empty($user['pseudo'])) {
            return false;
        }

        $this->repository->saveForMember($scenarioSlug, (string) $user['pseudo'], $state, $scene);

        return true;
    }

    /**
     * Sauvegarde la progression d'un visiteur via un nom et un code.
     *
     * @param array<string, mixed> $state
     */
    public function saveForGuest(string $scenarioSlug, string $saveName, string $saveCode, array $state, string $scene): void
    {
        $this->repository->saveForGuest(
            $scenarioSlug,
            trim($saveName),
            trim($saveCode),
            $state,
            $scene,
        );
    }

    /**
     * Charge la dernière sauvegarde du membre connecté.
     *
     * @return array{scene: string, state: array<string, mixed>}|null
     */
    public function loadForCurrentUser(string $scenarioSlug): ?array
    {
        $user = AuthService::user();
        if (!$user || empty($user['pseudo'])) {
            return null;
        }

        return $this->normalizeSave($this->repository->findForMember($scenarioSlug, (string) $user['pseudo']));
    }

    /**
     * Charge une sauvegarde visiteur par couple nom/code.
     *
     * @return array{scene: string, state: array<string, mixed>}|null
     */
    public function loadForGuest(string $scenarioSlug, string $saveName, string $saveCode): ?array
    {
        return $this->normalizeSave(
            $this->repository->findForGuest($scenarioSlug, trim($saveName), trim($saveCode))
        );
    }

    /**
     * Convertit une ligne de base de données en format exploitable par l'application.
     *
     * @return array{scene: string, state: array<string, mixed>}|null
     */
    private function normalizeSave(?array $save): ?array
    {
        if ($save === null) {
            return null;
        }

        $state = json_decode($save['state_json'] ?? '', true);
        if (!is_array($state)) {
            return null;
        }

        return [
            'scene' => (string) ($save['saved_scene'] ?? ($state['_scene'] ?? 'index')),
            'state' => $state,
        ];
    }
}
