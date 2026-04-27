<?php

namespace App\Repositories;

use PDO;

/**
 * Persiste les sessions longues associées au "se souvenir de moi".
 */
class UserSessionRepository
{
    /**
     * @param PDO $db Connexion PDO partagée de l'application.
     */
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    /**
     * Retourne l'identifiant utilisateur associé à un token encore valide.
     */
    public function findValidUserIdByToken(string $token): ?string
    {
        $statement = $this->db->prepare(
            "SELECT user_id FROM user_session WHERE token = :token AND expires > NOW() LIMIT 1"
        );
        $statement->execute([
            'token' => $token,
        ]);

        $session = $statement->fetch();

        return $session['user_id'] ?? null;
    }

    /**
     * Enregistre un nouveau token persistant.
     */
    public function create(string $userId, string $token, string $expiresAt): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO user_session (user_id, token, expires) VALUES (:user_id, :token, :expires)"
        );
        $statement->execute([
            'user_id' => $userId,
            'token' => $token,
            'expires' => $expiresAt,
        ]);
    }

    /**
     * Supprime un token persistant.
     */
    public function deleteByToken(string $token): void
    {
        $statement = $this->db->prepare("DELETE FROM user_session WHERE token = :token");
        $statement->execute([
            'token' => $token,
        ]);
    }
}
