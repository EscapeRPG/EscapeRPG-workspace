<?php

namespace App\Repositories;

use PDO;

/**
 * Accède aux succès et à leur progression côté base de données.
 */
class AchievementRepository
{
    private const RARITY_ORDER = "'platine','diamant','gold','argent','bronze','normal'";

    /**
     * @param PDO $db Connexion PDO partagée de l'application.
     */
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    /**
     * Retourne les succès obtenus par un membre pour un scénario donné.
     */
    public function getEarnedByScenario(int|string $memberId, string $scenario): array
    {
        $statement = $this->db->prepare(
            "SELECT s.*
             FROM membre_succes ms
             JOIN succes s ON ms.id_succes = s.id
             WHERE ms.id_membre = :member
               AND s.scenario = :scenario
             ORDER BY FIELD(s.rarete, " . self::RARITY_ORDER . ")"
        );
        $statement->execute([
            'member' => $memberId,
            'scenario' => $scenario,
        ]);

        return $statement->fetchAll();
    }

    /**
     * Recherche un succès par scénario et nom technique.
     */
    public function findByScenarioAndName(string $scenario, string $name): ?array
    {
        $statement = $this->db->prepare(
            "SELECT * FROM succes WHERE scenario = :scenario AND nom = :name LIMIT 1"
        );
        $statement->execute([
            'scenario' => $scenario,
            'name' => $name,
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Indique si un membre possède déjà un succès donné.
     */
    public function memberHasAchievement(int|string $memberId, int|string $achievementId): bool
    {
        $statement = $this->db->prepare(
            "SELECT 1 FROM membre_succes WHERE id_membre = :member AND id_succes = :achievement LIMIT 1"
        );
        $statement->execute([
            'member' => $memberId,
            'achievement' => $achievementId,
        ]);

        return (bool) $statement->fetchColumn();
    }

    /**
     * Attribue un succès à un membre.
     */
    public function grantToMember(int|string $memberId, int|string $achievementId): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO membre_succes (id_membre, id_succes) VALUES (:member, :achievement)"
        );
        $statement->execute([
            'member' => $memberId,
            'achievement' => $achievementId,
        ]);
    }

    /**
     * Retourne tous les succès d'un scénario.
     */
    public function getAllByScenario(string $scenario): array
    {
        $statement = $this->db->prepare(
            "SELECT *
             FROM succes
             WHERE scenario = :scenario
             ORDER BY FIELD(rarete, " . self::RARITY_ORDER . ")"
        );
        $statement->execute([
            'scenario' => $scenario,
        ]);

        return $statement->fetchAll();
    }

    /**
     * Calcule la progression par scénario pour un membre.
     *
     * @param array<string, int> $targets
     * @return array<string, array{earned: int, total: int, percent: float|int}>
     */
    public function getScenarioProgress(int|string $memberId, array $targets): array
    {
        $progress = [];

        foreach ($targets as $scenario => $total) {
            $earned = count($this->getEarnedByScenario($memberId, $scenario));
            $percent = $total > 0 ? (100 - (($total - $earned) * 100) / $total) : 0;

            $progress[$scenario] = [
                'earned' => $earned,
                'total' => $total,
                'percent' => $percent,
            ];
        }

        return $progress;
    }
}
