<?php

namespace App\Repositories;

use PDO;

/**
 * Gère les opérations de lecture et d'écriture sur les membres.
 */
class MemberRepository
{
    /**
     * @param PDO $db Connexion PDO partagée de l'application.
     */
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    /**
     * Recherche un membre par pseudo.
     */
    public function findByUsername(string $username): ?array
    {
        $statement = $this->db->prepare("SELECT * FROM `membres` WHERE pseudo = :pseudo LIMIT 1");
        $statement->execute([
            'pseudo' => mb_strtolower(trim($username)),
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Recherche un membre par adresse email.
     */
    public function findByEmail(string $email): ?array
    {
        $statement = $this->db->prepare("SELECT * FROM `membres` WHERE email = :email LIMIT 1");
        $statement->execute([
            'email' => trim($email),
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Libère un pseudo ou un email bloqué par une activation expirée.
     */
    public function deleteExpiredPending(string $username, string $email): void
    {
        $statement = $this->db->prepare(
            "DELETE FROM `membres`
             WHERE email_verified_at IS NULL
               AND activation_expires_at <= NOW()
               AND (pseudo = :pseudo OR email = :email)"
        );
        $statement->execute([
            'pseudo' => mb_strtolower(trim($username)),
            'email' => trim($email),
        ]);
    }

    /**
     * Crée un nouveau membre.
     */
    public function createPending(
        string $username,
        string $email,
        string $passwordHash,
        string $avatar,
        string $activationTokenHash,
    ): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO `membres` (
                pseudo,
                email,
                password,
                avatar,
                date_inscription,
                email_verified_at,
                activation_token_hash,
                activation_expires_at
            ) VALUES (
                :pseudo,
                :email,
                :password,
                :avatar,
                NOW(),
                NULL,
                :activation_token_hash,
                DATE_ADD(NOW(), INTERVAL 24 HOUR)
            )"
        );
        $statement->execute([
            'pseudo' => mb_strtolower(trim($username)),
            'email' => trim($email),
            'password' => $passwordHash,
            'avatar' => $avatar,
            'activation_token_hash' => $activationTokenHash,
        ]);
    }

    /**
     * Recherche un membre en attente à partir d'un jeton d'activation valide.
     */
    public function findPendingByActivationToken(string $tokenHash): ?array
    {
        $statement = $this->db->prepare(
            "SELECT * FROM `membres`
             WHERE activation_token_hash = :activation_token_hash
               AND activation_expires_at > NOW()
               AND email_verified_at IS NULL
             LIMIT 1"
        );
        $statement->execute([
            'activation_token_hash' => $tokenHash,
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Active définitivement un compte et invalide son jeton.
     */
    public function activate(int $memberId): void
    {
        $statement = $this->db->prepare(
            "UPDATE `membres`
             SET email_verified_at = NOW(),
                 activation_token_hash = NULL,
                 activation_expires_at = NULL
             WHERE id = :id AND email_verified_at IS NULL"
        );
        $statement->execute([
            'id' => $memberId,
        ]);
    }

    /**
     * Enregistre un nouveau jeton de réinitialisation valable une heure.
     */
    public function setPasswordResetToken(int $memberId, string $tokenHash): void
    {
        $statement = $this->db->prepare(
            "UPDATE `membres`
             SET password_reset_token_hash = :token_hash,
                 password_reset_expires_at = DATE_ADD(NOW(), INTERVAL 1 HOUR)
             WHERE id = :id AND email_verified_at IS NOT NULL"
        );
        $statement->execute([
            'id' => $memberId,
            'token_hash' => $tokenHash,
        ]);
    }

    /**
     * Recherche un membre à partir d'un jeton de réinitialisation valide.
     */
    public function findByValidPasswordResetToken(string $tokenHash): ?array
    {
        $statement = $this->db->prepare(
            "SELECT * FROM `membres`
             WHERE password_reset_token_hash = :token_hash
               AND password_reset_expires_at > NOW()
               AND email_verified_at IS NOT NULL
             LIMIT 1"
        );
        $statement->execute([
            'token_hash' => $tokenHash,
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Modifie le mot de passe et consomme le jeton de réinitialisation.
     */
    public function resetPassword(int $memberId, string $passwordHash): void
    {
        $statement = $this->db->prepare(
            "UPDATE `membres`
             SET password = :password,
                 password_reset_token_hash = NULL,
                 password_reset_expires_at = NULL
             WHERE id = :id"
        );
        $statement->execute([
            'id' => $memberId,
            'password' => $passwordHash,
        ]);
    }

    /**
     * Met à jour tout ou partie des informations d'un profil.
     */
    public function updateProfile(string $username, string $email, ?string $passwordHash = null, ?string $avatar = null): void
    {
        $fields = ['email = :email'];
        $params = [
            'pseudo' => mb_strtolower(trim($username)),
            'email' => trim($email),
        ];

        if ($passwordHash !== null) {
            $fields[] = 'password = :password';
            $fields[] = 'password_reset_token_hash = NULL';
            $fields[] = 'password_reset_expires_at = NULL';
            $params['password'] = $passwordHash;
        }

        if ($avatar !== null) {
            $fields[] = 'avatar = :avatar';
            $params['avatar'] = $avatar;
        }

        $statement = $this->db->prepare(
            'UPDATE `membres` SET ' . implode(', ', $fields) . ' WHERE pseudo = :pseudo'
        );
        $statement->execute($params);
    }
}
