<img src="/escaperpg/images/secrets/bordtop.png" alt="bord">
<h1>Navigation</h1>
<ul>
    <li><a href="rdc">Rez-de-Chaussée</a></li>
    <ul>
        <li><a href="salon">Salon</a></li>
        <li><a href="aile">Aile des domestiques</a></li>
    </ul>
    <li><a href="etage">Étage</a></li>
    <ul>
        <li><a href="chambre">Chambre de William</a></li>
        <?php if ($_SESSION['bureauprive']): ?>
            <li><a href="bureauprive">Bureau privé</a></li>
        <?php else: ?>
            <li><a href="bureau">Bureau</a></li>
        <?php endif; ?>
        <li><a href="bibliotheque">Bibliothèque</a></li>
        <li><a href="chambres">Chambres</a></li>
    </ul>
    <li><a href="grenier">Grenier</a></li>
    <li><a href="cave">Cave</a></li>
    <li><a href="jardin">Jardin</a></li>
    <ul>
        <li><a href="maisongaspard">Maison de Gaspard</a></li>
        <li><a href="chenil">Chenil</a></li>
        <li><a href="serre">Serre</a></li>
    </ul>
</ul>
<img src="/escaperpg/images/secrets/bordbottom.png" alt="bord">
<?php if (!isset($_SESSION['visitepellington'])): ?>
    <form action="<?= isset($_SESSION['jour']) ? 'nuit' : 'jour2' ?>" method="post">
        <input type="submit" name="entrer" value="ALLER DORMIR">
    </form>
<?php endif; ?>
