<aside>
    <img src="<?= asset('assets/img/secrets/inspecteurdeckard.png') ?>" alt="Bastian Deckard" title="Inspecteur Deckard">

    <?php
    $manorScenes = [
        'rdc', 'salon', 'aile', 'etage', 'chambre', 'bureau', 'bureauprive',
        'bureauprive2', 'coffret', 'courtcircuit', 'cuves',
        'bibliotheque', 'chambres', 'grenier', 'cave', 'jardin',
        'maisongaspard', 'chenil', 'serre',
    ];
    $pellingtonScenes = [
        'pellingtonrdc', 'pellingtonvestibule', 'pellingtonsalon', 'pellingtonpremier',
        'pellingtonchambre', 'salledebain', 'pellingtondeuxieme', 'pellingtongrenier',
        'pellingtoncave',
    ];
    ?>

    <?php if (in_array($scene ?? '', $manorScenes, true)): ?>
        <div class="secrets-navigation">
            <img src="<?= asset('assets/img/secrets/bordtop.png') ?>" alt="">
            <h1>Manoir Deckard</h1>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/manoir/rdc') ?>">Rez-de-chaussée</a></h2>
            <ul>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/salon') ?>">Salon</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/aile') ?>">Aile des domestiques</a></li>
            </ul>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/manoir/etage') ?>">Étage</a></h2>
            <ul>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/chambre') ?>">Chambre de William</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/' . (!empty($state['bureau_private_unlocked']) ? 'bureauprive' : 'bureau')) ?>">Bureau</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/bibliotheque') ?>">Bibliothèque</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/chambres') ?>">Chambres</a></li>
            </ul>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/manoir/grenier') ?>">Grenier</a></h2>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/manoir/cave') ?>">Cave</a></h2>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/manoir/jardin') ?>">Jardin</a></h2>
            <ul>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/maisongaspard') ?>">Maison de Gaspard</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/chenil') ?>">Chenil</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/manoir/serre') ?>">Serre</a></li>
            </ul>
            <img src="<?= asset('assets/img/secrets/bordbottom.png') ?>" alt="">
        </div>

        <?php if (empty($state['pellington_visit'])): ?>
            <?php
            $sleepScene = !empty($state['manor_day']) ? 'nuit' : 'jour2';
            $sleepAction = !empty($state['manor_day']) ? 'nuit' : 'entrer';
            ?>
            <form action="<?= url('/aventures/secretsfamiliaux/manoir/' . $sleepScene) ?>" method="post">
                <button type="submit" class="action" name="action" value="<?= e($sleepAction) ?>">ALLER DORMIR</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (in_array($scene ?? '', $pellingtonScenes, true)): ?>
        <div class="secrets-navigation">
            <img src="<?= asset('assets/img/secrets/bordtop.png') ?>" alt="">
            <h1>Maison de Pellington</h1>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/rdc') ?>">Rez-de-chaussée</a></h2>
            <ul>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/vestibule') ?>">Vestibule</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/salon') ?>">Salon</a></li>
            </ul>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/premieretage') ?>">Premier étage</a></h2>
            <ul>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/chambre') ?>">Chambre du docteur</a></li>
                <li>- <a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/salledebain') ?>">Salle de bain</a></li>
            </ul>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/deuxiemeetage') ?>">Deuxième étage</a></h2>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/grenier') ?>">Grenier</a></h2>
            <h2><a href="<?= url('/aventures/secretsfamiliaux/107parkavenue/cave') ?>">Cave</a></h2>
            <img src="<?= asset('assets/img/secrets/bordbottom.png') ?>" alt="">
        </div>

        <?php if (!empty($state['pellington_visit'])): ?>
            <form action="<?= url('/aventures/secretsfamiliaux/manoir/rdc') ?>" method="post">
                <button type="submit" class="action" name="action" value="entrer">RENTRER</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
    <div id="motsdepasse"><input type="submit" value="NOTES"></div>
    <?php $currentSceneUrl = (string) (($adventure['scene_urls'][$scene] ?? null) ?: $scene); ?>
    <form action="<?= url('/aventures/' . ($adventure['slug'] ?? '') . '/' . ltrim($currentSceneUrl, '/')) ?>" method="post">
        <input type="hidden" name="action" value="save_game">
        <input type="submit" name="save" value="SAUVEGARDER">
    </form>
</aside>
