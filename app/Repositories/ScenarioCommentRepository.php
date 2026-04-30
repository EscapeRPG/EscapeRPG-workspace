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
            "SELECT c.*,
                CASE
                    WHEN m.id IS NULL THEN NULL
                    ELSE COALESCE(m.avatar, 'default.png')
                END AS member_avatar
             FROM commentaires c
             LEFT JOIN membres m ON LOWER(TRIM(m.pseudo)) = LOWER(TRIM(c.pseudo))
             WHERE c.scenario = :scenario
             ORDER BY c.id DESC
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

    public function add(string $scenario, string $pseudo, string $message, ?int $note = null): void
    {
        $note = $note !== null ? max(1, min(5, $note)) : null;
        $statement = $this->db->prepare(
            "INSERT INTO commentaires (scenario, pseudo, message, note) VALUES (:scenario, :pseudo, :message, :note)"
        );
        $statement->execute([
            'scenario' => $scenario,
            'pseudo' => mb_substr(trim($pseudo), 0, 20),
            'message' => trim($message),
            'note' => $note,
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
                note TINYINT UNSIGNED NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                INDEX idx_scenario_created (scenario, created_at)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
        );

        $columns = $this->db->query("SHOW COLUMNS FROM commentaires LIKE 'note'")->fetchAll();
        if ($columns === []) {
            $this->db->exec("ALTER TABLE commentaires ADD note TINYINT UNSIGNED NULL AFTER message");
        }
    }
}
