<?php

namespace App\Services;

use App\Core\Database;
use App\Core\Session;
use App\Repositories\AchievementRepository;

class AchievementService
{
    private const POPUP_KEY = '_achievement_popup';

    private AchievementRepository $achievements;
    private Session $session;

    public function __construct(
        ?AchievementRepository $achievements = null,
        ?Session $session = null,
    ) {
        $this->achievements = $achievements ?? new AchievementRepository(Database::get());
        $this->session = $session ?? new Session();
    }

    public function grant(string $scenario, string $name, ?array $member = null): bool
    {
        $achievement = $this->achievements->findByScenarioAndName($scenario, $name);
        if (!$achievement) {
            return false;
        }

        $member ??= AuthService::user();
        $isNew = true;

        if ($member && isset($member['pk'])) {
            $isNew = !$this->achievements->memberHasAchievement($member['pk'], $achievement['id']);
            if ($isNew) {
                $this->achievements->grantToMember($member['pk'], $achievement['id']);
            }
        }

        if ($isNew) {
            $this->queuePopup($achievement, $member !== null);
        }

        return $isNew;
    }

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

    public function consumePopup(): array
    {
        return $this->session->pull(self::POPUP_KEY, []);
    }

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
