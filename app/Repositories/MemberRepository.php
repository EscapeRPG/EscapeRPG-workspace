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
     * Crée un nouveau membre.
     */
    public function create(string $username, string $email, string $passwordHash, string $avatar): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO `membres` (pseudo, email, password, avatar, date_inscription) VALUES (:pseudo, :email, :password, :avatar, :date_inscription)"
        );
        $statement->execute([
            'pseudo' => mb_strtolower(trim($username)),
            'email' => trim($email),
            'password' => $passwordHash,
            'avatar' => $avatar,
            'date_inscription' => date('Y-m-d H:i:s'),
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
