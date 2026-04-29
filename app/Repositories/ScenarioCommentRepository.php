<?php

namespace App\Repositories;

use PDO;

/**
 * Persiste les commentaires de fin pour tous les scenarios.
 */
class ScenarioCommentRepository
{
    public function __construct(
        private readonly PDO $db,
    ) {
        $this->ensureTableExists();
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getForScenario(string $scenario, int $page = 1, int $perPage = 5): array
    {
        $offset = max(0, ($page - 1) * $perPage);
        $statement = $this->db->prepare(
            "SELECT *
             FROM commentaires
             WHERE scenario = :scenario
             ORDER BY id DESC
             LIMIT :limit OFFSET :offset"
        );
        $statement->bindValue(':scenario', $scenario);
        $statement->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function countForScenario(string $scenario): int
    {
        $statement = $this->db->prepare("SELECT COUNT(*) FROM commentaires WHERE scenario = :scenario");
        $statement->execute([
            'scenario' => $scenario,
        ]);

        return (int) $statement->fetchColumn();
    }

    public function add(string $scenario, string $pseudo, string $message): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO commentaires (scenario, pseudo, message) VALUES (:scenario, :pseudo, :message)"
        );
        $statement->execute([
            'scenario' => $scenario,
            'pseudo' => mb_substr(trim($pseudo), 0, 20),
            'message' => trim($message),
        ]);
    }

    private function ensureTableExists(): void
    {
        $this->db->exec(
            "CREATE TABLE IF NOT EXISTS commentaires (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                scenario VARCHAR(100) NOT NULL,
                pseudo VARCHAR(20) NOT NULL,
                message TEXT NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                INDEX idx_scenario_created (scenario, created_at)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
        );
    }
}
