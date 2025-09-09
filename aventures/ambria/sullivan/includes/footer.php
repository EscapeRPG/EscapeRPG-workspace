<footer>
    <div id="inventaireshow" class="footerhidden">
        <?php
        $inventaire = [
            'ambriawhisky' => '
                <a href="/escaperpg/images/ambria/fonddewhisky.png" rel="lightbox[invent]" title="Fond de whisky">
                    <img src="/escaperpg/images/ambria/fonddewhisky.png" title="Une bouteille contenant un fond de whisky donnée par le gérant de la taverne.">
                </a>',
            'bourse' => '
                <a href="/escaperpg/images/ambria/bourseencuir.png" rel="lightbox[invent]" title="Bourse en cuir">
                    <img src="/escaperpg/images/ambria/bourseencuir.png" title="Une bourse en cuir trouvée par terre.">
                </a>',
            'ambriajournalsullivan' => '
                <a href="/escaperpg/images/ambria/journalsullivan.png" rel="lightbox[invent]" title="Journal de Sullivan">
                    <img src="/escaperpg/images/ambria/journalsullivan.png" title="Votre journal de bord, où vous consignez nombre d\'informations utiles.">
                </a>',
            'tablette' => '
                <a href="/escaperpg/images/ambria/porte/tablette.png" rel="lightbox[sullivan]" title="Tablette en or gravée">
                    <img src="/escaperpg/images/ambria/porte/tablette.png" title="Une tablette en or gravée.">
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
