<?php

namespace App\Repositories;

use PDO;

/**
 * Gère les opérations de lecture et d'écriture sur les membres.
 */
class ToolsRepository
{
    /**
     * @param PDO $db Connexion PDO partagée de l'application.
     */
    public function __construct(
        private readonly PDO $db,
    ) {
    }

    /**
     * Recherche un sondage par slug.
     */
    public function getSondage(string $slug): ?array
    {
        $statement = $this->db->prepare("SELECT * FROM `sondage` WHERE slug = :slug LIMIT 1");
        $statement->execute([
            'slug' => mb_strtolower(trim($slug)),
        ]);

        return $statement->fetch() ?: null;
    }

    /**
     * Crée un sondage avec un slug aléatoire de 20 caractères alphanumériques.
     */
    public function createSondage(string $titre, array $propositions): string
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz0123456789';
        do {
            $slug = '';
            for ($i = 0; $i < 20; $i++) {
                $slug .= $alphabet[random_int(0, strlen($alphabet) - 1)];
            }
        } while ($this->getSondage($slug) !== null);

        $statement = $this->db->prepare('INSERT INTO sondage (slug, titre, propositions) VALUES (:slug, :titre, :propositions)');
        $statement->execute([
            'slug' => $slug,
            'titre' => $titre,
            'propositions' => json_encode($propositions, JSON_THROW_ON_ERROR),
        ]);

        return $slug;
    }

    /**
     * Recherche un sondage par slug.
     */
    public function getParticipants(string $slug): ?array
    {
        $statement = $this->db->prepare("SELECT sp.* FROM sondage_participants sp INNER JOIN sondage s ON sp.sondage_id = s.id WHERE s.slug = :slug ORDER BY sp.id");
        $statement->execute([
            'slug' => mb_strtolower(trim($slug)),
        ]);

        return $statement->fetchAll();
    }

    public function addVote(int $sondageId, string $pseudo, array $reponses): void
    {
        $statement = $this->db->prepare('INSERT INTO sondage_participants (sondage_id, pseudo, reponses) VALUES (:sondage_id, :pseudo, :reponses)');
        $statement->execute([
            'sondage_id' => $sondageId,
            'pseudo' => $pseudo,
            'reponses' => json_encode($reponses, JSON_THROW_ON_ERROR),
        ]);
    }
}
