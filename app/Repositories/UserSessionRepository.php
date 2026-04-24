<?php

namespace App\Repositories;

use PDO;

class UserSessionRepository
{
    public function __construct(
        private readonly PDO $db,
    ) {
    }

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

    public function deleteByToken(string $token): void
    {
        $statement = $this->db->prepare("DELETE FROM user_session WHERE token = :token");
        $statement->execute([
            'token' => $token,
        ]);
    }
}
