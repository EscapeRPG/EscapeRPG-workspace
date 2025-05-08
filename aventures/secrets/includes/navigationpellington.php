<img src="/escaperpg/images/secrets/bordtop.png">
<h1>
	Navigation
</h1>
<ul>
	<li>
		<a href="rdc.php">Rez-de-Chaussée</a>
		<ul>
			<li>
				<a href="vestibule.php">Vestibule</a>
			</li>
			<li>
				<a href="salon.php">Salon</a>
			</li>
		</ul>
	</li>
</ul>
<ul>
	<li>
		<a href="premieretage.php">Premier étage</a>
		<ul>
			<li>
				<a href="chambre.php">Chambre du docteur</a>
			</li>
			<li>
				<a href="sdb.php">Salle de bain</a>
			</li>
		</ul>
	</li>
</ul>
<ul>
	<li>
		<a href="deuxiemeetage.php">Deuxième étage</a>
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
<img src="/escaperpg/images/secrets/bordbottom.png">
<?php
	if ($_SESSION['visitepellington'])
		{
			echo '
				<form action="../manoir/rdc.php" method="post">
					<input type="submit" name="entrer" value="RENTRER">
				</form>
			';
		}					
?>