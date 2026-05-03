<?php

namespace App\Repositories;

use PDO;

/**
 * Persiste les sauvegardes d'aventures en base de données.
 */
class AdventureSaveRepository
{
    /**
     * Vérifie également l'existence de la table dédiée aux sauvegardes.
     */
    public function __construct(
        private readonly PDO $db,
    ) {
        $this->ensureTableExists();
    }

    /**
     * Sauvegarde l'état d'un scénario pour un membre identifié.
     *
     * @param array<string, mixed> $state
     */
    public function saveForMember(string $scenarioSlug, string $memberUsername, array $state, string $scene): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO adventure_saves (scenario_slug, member_username, state_json, saved_scene)
             VALUES (:scenario_slug, :member_username, :state_json, :saved_scene)
             ON DUPLICATE KEY UPDATE state_json = VALUES(state_json), saved_scene = VALUES(saved_scene), updated_at = CURRENT_TIMESTAMP"
        );
        $statement->execute([
            'scenario_slug' => $scenarioSlug,
            'member_username' => $memberUsername,
            'state_json' => json_encode($state, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'saved_scene' => $scene,
        ]);
    }

    /**
     * Sauvegarde l'état d'un scénario pour un visiteur.
     *
     * @param array<string, mixed> $state
     */
    public function saveForGuest(string $scenarioSlug, string $saveName, string $saveCode, array $state, string $scene): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO adventure_saves (scenario_slug, save_name, save_code, state_json, saved_scene)
             VALUES (:scenario_slug, :save_name, :save_code, :state_json, :saved_scene)
             ON DUPLICATE KEY UPDATE save_code = VALUES(save_code), state_json = VALUES(state_json), saved_scene = VALUES(saved_scene), updated_at = CURRENT_TIMESTAMP"
        );
        $statement->execute([
            'scenario_slug' => $scenarioSlug,
            'save_name' => $saveName,
            'save_code' => $saveCode,
            'state_json' => json_encode($state, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'saved_scene' => $scene,
        ]);
    }

    /**
     * Sauvegarde automatique transparente pour un visiteur reconnu par cookie.
     *
     * @param array<string, mixed> $state
     */
    public function saveForGuestToken(string $scenarioSlug, string $guestToken, array $state, string $scene): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO adventure_saves (scenario_slug, guest_token, state_json, saved_scene)
             VALUES (:scenario_slug, :guest_token, :state_json, :saved_scene)
             ON DUPLICATE KEY UPDATE state_json = VALUES(state_json), saved_scene = VALUES(saved_scene), updated_at = CURRENT_TIMESTAMP"
        );
        $statement->execute([
            'scenario_slug' => $scenarioSlug,
            'guest_token' => $guestToken,
            'state_json' => json_encode($state, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'saved_scene' => $scene,
        ]);
    }

    /**
     * Retourne la sauvegarde d'un membre pour un scénario.
     */
    public function findForMember(string $scenarioSlug, string $memberUsername): ?array
    {
        $statement = $this->db->prepare(
            "SELECT * FROM adventure_saves WHERE scenario_slug = :scenario_slug AND member_username = :member_username LIMIT 1"
        );
        $statement->execute([
            'scenario_slug' => $scenarioSlug,
            'member_username' => $memberUsername,
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Retourne une sauvegarde visiteur via son couple nom/code.
     */
    public function findForGuest(string $scenarioSlug, string $saveName, string $saveCode): ?array
    {
        $statement = $this->db->prepare(
            "SELECT * FROM adventure_saves WHERE scenario_slug = :scenario_slug AND save_name = :save_name AND save_code = :save_code LIMIT 1"
        );
        $statement->execute([
            'scenario_slug' => $scenarioSlug,
            'save_name' => $saveName,
            'save_code' => $saveCode,
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Retourne une sauvegarde automatique visiteur via son jeton anonyme.
     */
    public function findForGuestToken(string $scenarioSlug, string $guestToken): ?array
    {
        $statement = $this->db->prepare(
            "SELECT * FROM adventure_saves WHERE scenario_slug = :scenario_slug AND guest_token = :guest_token LIMIT 1"
        );
        $statement->execute([
            'scenario_slug' => $scenarioSlug,
            'guest_token' => $guestToken,
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Crée la table de sauvegarde si elle n'existe pas encore.
     */
    private function ensureTableExists(): void
    {
        $this->db->exec(
            "CREATE TABLE IF NOT EXISTS adventure_saves (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                scenario_slug VARCHAR(100) NOT NULL,
                member_username VARCHAR(100) NULL,
                save_name VARCHAR(100) NULL,
                save_code VARCHAR(20) NULL,
                guest_token VARCHAR(128) NULL,
                state_json LONGTEXT NOT NULL,
                saved_scene VARCHAR(100) NOT NULL,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                UNIQUE KEY unique_member_save (scenario_slug, member_username),
                UNIQUE KEY unique_guest_save (scenario_slug, save_name),
                UNIQUE KEY unique_guest_token_save (scenario_slug, guest_token)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
        );

        $this->ensureGuestTokenColumn();
        $this->ensureGuestTokenIndex();
    }

    private function ensureGuestTokenColumn(): void
    {
        $statement = $this->db->query("SHOW COLUMNS FROM adventure_saves LIKE 'guest_token'");
        if ($statement !== false && $statement->fetch()) {
            return;
        }

        $this->db->exec("ALTER TABLE adventure_saves ADD guest_token VARCHAR(128) NULL AFTER save_code");
    }

    private function ensureGuestTokenIndex(): void
    {
        $statement = $this->db->query("SHOW INDEX FROM adventure_saves WHERE Key_name = 'unique_guest_token_save'");
        if ($statement !== false && $statement->fetch()) {
            return;
        }

        $this->db->exec("ALTER TABLE adventure_saves ADD UNIQUE KEY unique_guest_token_save (scenario_slug, guest_token)");
    }
}
