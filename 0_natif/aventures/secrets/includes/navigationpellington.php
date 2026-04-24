<img src="/escaperpg/images/secrets/bordtop.png" alt="bord">
<h1>Navigation</h1>
<ul>
    <li><a href="rdc.php">Rez-de-Chaussée</a></li>
    <ul>
        <li><a href="vestibule.php">Vestibule</a></li>
        <li><a href="salon.php">Salon</a></li>
    </ul>
    <li><a href="premieretage.php">Premier étage</a></li>
    <ul>
        <li><a href="chambre.php">Chambre du docteur</a></li>
        <li><a href="sdb.php">Salle de bain</a></li>
    </ul>
    <li><a href="deuxiemeetage.php">Deuxième étage</a></li>
    <li><a href="grenier.php">Grenier</a></li>
    <li><a href="cave.php">Cave</a></li>
</ul>
<img src="/escaperpg/images/secrets/bordbottom.png" alt="bord">
<?php if (isset($_SESSION['visitepellington'])): ?>
    <form action="/escaperpg/aventures/secrets/manoir/rdc" method="post">
        <input type="submit" name="entrer" value="RENTRER">
    </form>
<?php endif; ?>
