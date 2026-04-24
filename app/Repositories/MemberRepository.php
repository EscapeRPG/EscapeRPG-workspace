<?php

namespace App\Repositories;

use PDO;

class MemberRepository
{
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    public function findByUsername(string $username): ?array
    {
        $statement = $this->db->prepare("SELECT * FROM `0membres` WHERE id = :id LIMIT 1");
        $statement->execute([
            'id' => mb_strtolower(trim($username)),
        ]);

        return $statement->fetch() ?: null;
    }

    public function findByEmail(string $email): ?array
    {
        $statement = $this->db->prepare("SELECT * FROM `0membres` WHERE email = :email LIMIT 1");
        $statement->execute([
            'email' => trim($email),
        ]);

        return $statement->fetch() ?: null;
    }

    public function create(string $username, string $email, string $passwordHash, string $avatar): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO `0membres` (id, email, pass, avatar) VALUES (:id, :email, :pass, :avatar)"
        );
        $statement->execute([
            'id' => mb_strtolower(trim($username)),
            'email' => trim($email),
            'pass' => $passwordHash,
            'avatar' => $avatar,
        ]);
    }

    public function updateProfile(string $username, string $email, ?string $passwordHash = null, ?string $avatar = null): void
    {
        $fields = ['email = :email'];
        $params = [
            'id' => mb_strtolower(trim($username)),
            'email' => trim($email),
        ];

        if ($passwordHash !== null) {
            $fields[] = 'pass = :pass';
            $params['pass'] = $passwordHash;
        }

        if ($avatar !== null) {
            $fields[] = 'avatar = :avatar';
            $params['avatar'] = $avatar;
        }

        $statement = $this->db->prepare(
            'UPDATE `0membres` SET ' . implode(', ', $fields) . ' WHERE id = :id'
        );
        $statement->execute($params);
    }
}
