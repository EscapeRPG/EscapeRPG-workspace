<?php

namespace App\Services\Account;

use App\Core\Database;
use App\Core\Session;
use App\Repositories\AchievementRepository;

/**
 * Ordonne l'attribution des succès et la file d'affichage des popups.
 */
class AchievementService
{
    private const POPUP_KEY = '_achievement_popup';

    private AchievementRepository $achievements;
    private Session $session;

    /**
     * Permet d'injecter des dépendances spécifiques pour les tests.
     */
    public function __construct(
        ?AchievementRepository $achievements = null,
        ?Session $session = null,
    ) {
        $this->achievements = $achievements ?? new AchievementRepository(Database::get());
        $this->session = $session ?? new Session();
    }

    /**
     * Attribue un succès précis à un membre.
     */
    public function grant(string $scenario, string $name, ?array $member = null): bool
    {
        $achievement = $this->achievements->findByScenarioAndName($scenario, $name);
        if (!$achievement) {
            return false;
        }

        $member ??= AuthService::user();
        $isNew = true;

        if ($member && isset($member['id'])) {
            $isNew = !$this->achievements->memberHasAchievement($member['id'], $achievement['id']);
            if ($isNew) {
                $this->achievements->grantToMember($member['id'], $achievement['id']);
            }
        }

        if ($isNew) {
            $this->queuePopup($achievement, $member !== null);
        }

        return $isNew;
    }

    /**
     * Attribue plusieurs succès en une seule passe.
     *
     * @param array<int, array<string, string>> $items
     * @return array<int, array<string, string>>
     */
    public function grantMany(array $items, ?array $member = null): array
    {
        $granted = [];

        foreach ($items as $item) {
            if (!is_array($item) || empty($item['scenario']) || empty($item['name'])) {
                continue;
            }

            if ($this->grant($item['scenario'], $item['name'], $member)) {
                $granted[] = $item;
            }
        }

        return $granted;
    }

    /**
     * Retourne et vide la file des popups de succès à afficher.
     */
    public function consumePopup(): array
    {
        return $this->session->pull(self::POPUP_KEY, []);
    }

    /**
     * Ajoute un succès à la file d'affichage si ce n'est pas déjà fait.
     */
    private function queuePopup(array $achievement, bool $isLoggedIn): void
    {
        $queue = $this->session->get(self::POPUP_KEY, []);
        $key = ($achievement['scenario'] ?? '') . ':' . ($achievement['nom'] ?? '');

        foreach ($queue as $existing) {
            $existingKey = ($existing['scenario'] ?? '') . ':' . ($existing['nom'] ?? '');
            if ($existingKey === $key) {
                return;
            }
        }

        $queue[] = [
            'scenario' => $achievement['scenario'],
            'nom' => $achievement['nom'],
            'titre' => $achievement['titre'],
            'description' => $achievement['description'],
            'rarete' => $achievement['rarete'],
            'is_logged_in' => $isLoggedIn,
        ];

        $this->session->put(self::POPUP_KEY, $queue);
    }
}
