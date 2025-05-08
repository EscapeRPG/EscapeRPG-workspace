<footer>
    <div id="inventaireshow" class="footerhidden">
        <?php
        $inventaire = [
            'manuel' => '
                    <a href="/escaperpg/aventures/gaea1/manuel" target="_blank" rel="noreferrer">
                        <img src="/escaperpg/images/gaea1/manuel/manuel.png" title="Votre manuel de pilote. Il contient de précieuses informations.">
                    </a>',
            'deckPass' => '
                    <a href="/escaperpg/images/gaea1/passcard.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/gaea1/passcard.png" title="La carte pass vous permettant d\'ouvrir les différentes portes de la station.">
                    </a>',
            'energyCells' => '
                    <a href="/escaperpg/images/gaea1/energycells.png" rel="lightbox[invent]">
                        <img src="/escaperpg/images/gaea1/energycells.png" title="Des cellules énergétiques pour remettre en état le panneau de la porte du pont de commandement.">
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
        <p></p>
    </div>
</footer>

<script src="/escaperpg/scripts/footershow.js"></script>
