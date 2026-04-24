<?php

namespace App\Repositories;

use PDO;

class FriendRepository
{
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    public function getFriendsForMember(int|string $memberPk): array
    {
        $statement = $this->db->prepare(
            "SELECT m.*
             FROM 0membre_amis a
             JOIN 0membres m ON m.pk = a.id_ami
             WHERE a.id_membre = :member
             ORDER BY m.id ASC"
        );
        $statement->execute([
            'member' => $memberPk,
        ]);

        return $statement->fetchAll();
    }

    public function exists(int|string $memberPk, int|string $friendPk): bool
    {
        $statement = $this->db->prepare(
            "SELECT 1 FROM 0membre_amis WHERE id_membre = :member AND id_ami = :friend LIMIT 1"
        );
        $statement->execute([
            'member' => $memberPk,
            'friend' => $friendPk,
        ]);

        return (bool) $statement->fetchColumn();
    }

    public function add(int|string $memberPk, int|string $friendPk): void
    {
        $statement = $this->db->prepare(
            "INSERT INTO 0membre_amis (id_membre, id_ami) VALUES (:member, :friend)"
        );
        $statement->execute([
            'member' => $memberPk,
            'friend' => $friendPk,
        ]);
    }
}
