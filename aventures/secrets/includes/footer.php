<footer>
    <div id="inventaireshow" class="footerhidden">
        <?php
        $inventaire = [
            'piecead' => '
                <a href="/escaperpg/images/secrets/ad.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/ad.png" title="piecehomme" alt="pièce avec une tête d\'homme">
                </a>',
            'piecese' => '
                <a href="/escaperpg/images/secrets/se.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/se.png" title="pieceserpent" alt="pièce avec un serpent">
                </a>',
            'pieceev' => '
                <a href="/escaperpg/images/secrets/ev.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/ev.png" title="piecefemme" alt="pièce avec une tête de femme">
                </a>',
            'piecedi' => '
                <a href="/escaperpg/images/secrets/di.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/di.png" title="piecevieilhomme" alt="pièce avec une tête de vieil homme">
                </a>',
            'piecepo' => '
                <a href="/escaperpg/images/secrets/po.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/po.png" title="piecepomme" alt="pièce avec une pomme">
                </a>',
            'coffret' => '
                <a href="/escaperpg/aventures/secrets/manoir/coffret.php">
                    <img src="/escaperpg/images/secrets/coffret.png" title="coffret" alt="un petit coffret">
                </a>',
            'papier' => '
                <a href="/escaperpg/aventures/secrets/manoir/papier.php">
                    <img src="/escaperpg/images/secrets/papier.png" title="papier" alt="un morceau de papier avec une inscription étrange">
                </a>',
            'templar' => '
                <a href="/escaperpg/images/secrets/templar.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/templar.png" title="codetemplier" alt="un papier avec l\'explication d\'un code">
                </a>',
            'flacon' => '
                <a href="/escaperpg/images/secrets/flacon.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/flacon.png" title="flacon" alt="un flacon de somnifère">
                </a>',
            'analeptique' => '
                <a href="/escaperpg/images/secrets/analeptique.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/analeptique.png" title="analeptique" alt="un analeptique pour guérir les chiens empoisonnés">
                </a>',
            'recette' => '
                <a href="/escaperpg/images/secrets/recette.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/recette.png" title="recette" alt="une recette indiquant comment fabriquer un médicament">
                </a>',
            'journal1' => '
                <a href="/escaperpg/images/secrets/journal1.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal1.png" title="journal1" alt="la première page du journal de votre oncle">
                </a>',
            'journal2' => '
                <a href="/escaperpg/images/secrets/journal2.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal2.png" title="journal2" alt="la seconde page du journal de votre oncle">
                </a>',
            'journal3' => '
                <a href="/escaperpg/images/secrets/journal3.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal3.png" title="journal3" alt="la troisième page du journal de votre oncle">
                </a>',
            'journal4' => '
                <a href="/escaperpg/images/secrets/journal.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal4.png" title="journal4" alt="la quatrième page du journal de votre oncle">
                </a>',
            'journal5' => '
                <a href="/escaperpg/images/secrets/journal5.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal5.png" title="journal" alt="la cinquième page du journal de votre oncle">
                </a>',
            'journal6' => '
                <a href="/escaperpg/images/secrets/journal6.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal6.png" title="journal6" alt="la sixième page du journal de votre oncle">
                </a>',
            'journal7' => '
                <a href="/escaperpg/images/secrets/journal7.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal7.png" title="journal7" alt="la septième page du journal de votre oncle">
                </a>',
            'journal8' => '
                <a href="/escaperpg/images/secrets/journal8.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal8.png" title="journal8" alt="la huitième page du journal de votre oncle">
                </a>',
            'journal9' => '
                <a href="/escaperpg/images/secrets/journal9.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/journal9.png" title="journal9" alt="la dernière page du journal de votre oncle">
                </a>',
            'aveux' => '
                <a href="/escaperpg/images/secrets/aveux.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/aveux.png" title="aveux" alt="les aveux du docteur pellington">
                </a>',
            'oldcle' => '
                <a href="/escaperpg/images/secrets/oldcle.png" rel="lightbox[invent]" title="vieillecle">
                    <img src="/escaperpg/images/secrets/oldcle.png" title="vieillecle" alt="vieille clé">
                </a>',
            'petitecle' => '
                <a href="/escaperpg/images/secrets/petitecle.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/petitecle.png" title="petitecle" alt="petite clé">
                </a>',
            'tableaubrule' => '
                <a href="/escaperpg/aventures/secrets/manoir/tableaubrule.php">
                    <img src="/escaperpg/images/secrets/tableaubrule.png" title="tableaubrule" alt="les morceaux d\'un tableau brûlé">
                </a>',
            'magnamater' => '
                <a href="/escaperpg/images/secrets/magnamater.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/magnamater.png" title="magnamater" alt="le magna mater">
                </a>',
            'talisman' => '
                <a href="/escaperpg/images/secrets/talisman.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/talisman.png" title="talisman" alt="un étrange talisman confié par gaspard">
                </a>',
            'pnakotiques' => '
                <a href="/escaperpg/images/secrets/pnakotiques.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/pnakotiques.png" title="pnakotiques" alt="un manuscrit indiquant comment réaliser divers rituels">
                </a>',
            'pnakotiquesnotes' => '
                <a href="/escaperpg/images/secrets/pnakotiquesnotes.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/secrets/pnakotiquesnotes.png" title="pnakotiquesnotes" alt="une page avec une correspondance de symboles oniriques">
                </a>',
        ];

        if (!empty($_SESSION['inventaire'])) {
            foreach ($_SESSION['inventaire'] as $i) {
                echo '<div id="inventaire">' . $inventaire[$i] . '</div>';
            }
        } else {
            echo '<p>Il n\'y a rien dans votre inventaire pour le moment.</p>';
        }
        ?>
    </div>

    <div id="motsdepasseshow" class="footerhidden">
        <p>
            <?php
            if (isset($_SESSION['mdp'])) {
                $affichables = [];

                foreach ($_SESSION['mdp'] as $mdp) {
                    if (!is_array($mdp) && !empty($mdp)) {
                        $affichables[] = $mdp;
                    }
                }

                if (!empty($affichables)) {
                    echo implode(' - ', $affichables);
                } else {
                    echo 'Vous n\'avez trouvé aucun mot de passe pour le moment.';
                }
            } else {
                echo 'Vous n\'avez trouvé aucun mot de passe pour le moment.';
            }
            ?>
        </p>
    </div>
</footer>

<script src="/escaperpg/scripts/footershow.js"></script>
