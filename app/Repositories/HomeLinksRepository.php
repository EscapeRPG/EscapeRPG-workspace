<?php

namespace App\Repositories;

use PDO;

class HomeLinksRepository
{
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    public function getMembers(): array
    {
        $statement = $this->db->prepare(
            "SELECT id, avatar FROM `0membres` WHERE id != :excluded ORDER BY id ASC"
        );
        $statement->execute([
            'excluded' => 'le narrateur',
        ]);

        return array_map(
            static fn (array $member): array => [
                'id' => $member['id'],
                'avatar' => $member['avatar'],
                'display_name' => ucwords($member['id'], " -_<>()[]'\".,!?;/Â§$+=*|{}&"),
            ],
            $statement->fetchAll()
        );
    }

    public function getSupporters(): array
    {
        $statement = $this->db->query("SELECT noms FROM tipeurs ORDER BY noms");

        return array_map(
            static fn (array $supporter): string => $supporter['noms'],
            $statement->fetchAll()
        );
    }
}
