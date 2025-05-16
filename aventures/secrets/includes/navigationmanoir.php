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
<<<<<<< HEAD
<ul>
	<li>
		<a href="etage.php">Étage</a>
		<ul>
			<li>
				<a href="chambre.php">Chambre de William</a>
			</li>
			<?php
				if ($_SESSION['bureauprive'])
					{
						echo '
							<li>
								<a href="bureauprive.php">Bureau privé</a>
							</li>
						';
					}
				else
					{
						echo '
							<li>
								<a href="bureau.php">Bureau</a>
							</li>
						';
					}		
			?>
			<li>
				<a href="bibliotheque.php">Bibliothèque</a>
			</li>
			<li>
				<a href="chambres.php">Chambres</a>
			</li>
		</ul>
	</li>
</ul>
<ul>
<li>
	<a href="grenier.php">Grenier</a>
</li>
</ul>
<ul>
	<li>
		<a href="cave.php">Cave</a>
	</li>
</ul>
<ul>
	<li>
		<a href="jardin.php">Jardin</a>
		<ul>
			<li>
				<a href="maisongaspard.php">Maison de Gaspard</a>
			</li>
			<li>
				<a href="chenil.php">Chenil</a>
			</li>
			<li>
				<a href="serre.php">Serre</a>
			</li>
		</ul>
	</li>
</ul>
<img src="/escaperpg/images/secrets/bordbottom.png">
<?php
	if ($_SESSION['visitepellington'] == false)
		{
			if ($_SESSION['jour'])
				{
					echo '
						<form action="nuit" method="post">
							<input type="submit" name="entrer" value="ALLER DORMIR">
						</form>
					';
				}
			else
				{
					echo '
						<center>
							<form action="jour2" method="post">
								<input type="submit" name="entrer" value="ALLER DORMIR">
							</form>
						</center>
					';
				}
		}
?>
=======
<img src="/escaperpg/images/secrets/bordbottom.png" alt="bord">
<?php if (!isset($_SESSION['visitepellington'])): ?>
    <form action="<?= isset($_SESSION['jour']) ? 'nuit' : 'jour2' ?>" method="post">
        <input type="submit" name="entrer" value="ALLER DORMIR">
    </form>
<?php endif; ?>
>>>>>>> 333f6ca500469084c310afa120a2f962080ca30a
