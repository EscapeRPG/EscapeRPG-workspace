<img src="/escaperpg/images/secrets/bordtop.png">
<h1>
	Navigation
</h1>
<ul>
	<li>
		<a href="rdc.php">Rez-de-Chaussée</a>
		<ul>
			<li>
				<a href="salon.php">Salon</a>
			</li>
			<li>
				<a href="aile.php">Aile des domestiques</a>
			</li>
		</ul>
	</li>
</ul>
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
						<form action="nuit.php" method="post">
							<input type="submit" name="entrer" value="ALLER DORMIR">
						</form>
					';
				}
			else
				{
					echo '
						<center>
							<form action="jour2.php" method="post">
								<input type="submit" name="entrer" value="ALLER DORMIR">
							</form>
						</center>
					';
				}
		}
?>