<?php

namespace App\Repositories;

use PDO;

class AchievementRepository
{
    private const RARITY_ORDER = "'platine','diamant','gold','argent','bronze','normal'";

    public function __construct(
        private readonly PDO $db,
    ) {
    }

    public function getEarnedByScenario(int|string $memberPk, string $scenario): array
    {
        $statement = $this->db->prepare(
            "SELECT s.*
             FROM 0membre_succes ms
             JOIN 0succes s ON ms.id_succes = s.id
             WHERE ms.id_membre = :member
               AND s.scenario = :scenario
             ORDER BY FIELD(s.rarete, " . self::RARITY_ORDER . ")"
        );
        $statement->execute([
            'member' => $memberPk,
            'scenario' => $scenario,
        ]);

        return $statement->fetchAll();
    }

    public function findByScenarioAndName(string $scenario, string $name): ?array
    {
        $statement = $this->db->prepare(
            "SELECT * FROM 0succes WHERE scenario = :scenario AND nom = :name LIMIT 1"
        );
        $statement->execute([
            'scenario' => $scenario,
            'name' => $name,
        ]);

        return $statement->fetch() ?: null;
    }

    public function memberHasAchievement(int|string $memberPk, int|string $achievementId): bool
    {
        $statement = $this->db->prepare(
            "SELECT 1 FROM 0membre_succes WHERE id_membre = :member AND id_succes = :achievement LIMIT 1"
        );
        $statement->execute([
            'member' => $memberPk,
            'achievement' => $achievementId,
        ]);

        return (bool) $statement->fetchColumn();
    }

    public function grantToMember(int|string $memberPk, int|string $achievementId): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO 0membre_succes (id_membre, id_succes) VALUES (:member, :achievement)"
        );
        $statement->execute([
            'member' => $memberPk,
            'achievement' => $achievementId,
        ]);
    }

    public function getAllByScenario(string $scenario): array
    {
        $statement = $this->db->prepare(
            "SELECT *
             FROM 0succes
             WHERE scenario = :scenario
             ORDER BY FIELD(rarete, " . self::RARITY_ORDER . ")"
        );
        $statement->execute([
            'scenario' => $scenario,
        ]);

        return $statement->fetchAll();
    }

    public function getScenarioProgress(int|string $memberPk, array $targets): array
    {
        $progress = [];

        foreach ($targets as $scenario => $total) {
            $earned = count($this->getEarnedByScenario($memberPk, $scenario));
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
