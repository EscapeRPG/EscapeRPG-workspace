<footer>
    <div id="inventaireshow" class="footerhidden">
        <?php
        $inventaire = [
            'carnet' => '
                <a href="/escaperpg/images/lastparty/carnet.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/lastparty/carnet.png" title="Un carnet où vous avez noté tous vos mots de passe.">
                </a>',
            'cartevisite' => '
                <a href="/escaperpg/images/lastparty/cartedevisite.png" rel="lightbox[invent]">
                    <img src="/escaperpg/images/lastparty/cartedevisite.png" title="Une carte de visite d\'un certain Darren Braun."></a>
                </a>'
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
