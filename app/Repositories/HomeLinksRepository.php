<?php

namespace App\Repositories;

use PDO;

/**
 * Fournit les données annexes affichées sur la page d'accueil.
 */
class HomeLinksRepository
{
    /**
     * @param PDO $db Connexion PDO partagée de l'application.
     */
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    /**
     * Retourne la liste simplifiée des membres à afficher sur la home.
     */
    public function getMembers(): array
    {
        $statement = $this->db->prepare(
            "SELECT pseudo, avatar FROM `membres` WHERE pseudo != :excluded ORDER BY pseudo ASC"
        );
        $statement->execute([
            'excluded' => 'le narrateur',
        ]);

        return array_map(
            static fn (array $member): array => [
                'pseudo' => $member['pseudo'],
                'avatar' => $member['avatar'],
                'display_name' => ucwords($member['pseudo'], " -_<>()[]'\".,!?;/Â§$+=*|{}&"),
            ],
            $statement->fetchAll()
        );
    }

    /**
     * Retourne la liste des soutiens à afficher sur la home.
     */
    public function getSupporters(): array
    {
        $statement = $this->db->query("SELECT noms FROM tipeurs ORDER BY noms");

        return array_map(
            static fn (array $supporter): string => $supporter['noms'],
            $statement->fetchAll()
        );
    }
}
