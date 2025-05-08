<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		
		<!-- [if lt IE 9]>
		<script src="http://html5shiv.googlecode.code/svn/trunk/html5.js"></scipt>
		<![endif]-->
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/stylesecrets.css">
		<meta charset="utf-8">
		<title>Chez Pellington - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['suivant']) AND !isset($_POST['suivant2']))
						{
							echo '
								<p>
									Après un petit détour dans le quartier, vous trouvez un accès à un parc entre les résidences vous permettant d\'accéder à l\'entrée arrière de la maison.
									En espérant qu\'elle soit ouverte.<br>
									<br>
									Vous vous hissez par-dessus la clôture en bois ceignant le jardin de Pellington et vous dirigez vers la porte.
									Heureusement, celle-ci n\'est pas fermée à clé et vous entrez à l\'intérieur.
								</p>
								<center>
									<form action="107parkavenue.php" method="post">
										<input type="submit" name="suivant2" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['suivant2']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/pellington.png"><span><u><b>Cambrioleur</b></u><br>Entrer chez le docteur Pellington</span>';
							$scenario = 'secrets';
							$description = 'pellington';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo '
								<div id="enigme">
									<a href="/escaperpg/images/secrets/pellrdc.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pellrdc.png"></a>
								</div>
								<br>
								<p>
									Vous avancez dans le salon pour voir si quelqu\'un se trouve ici, mais il ne semble y avoir personne.
									Vous vous annoncez à haute voix au cas où le docteur se trouve à l\'étage, mais n\'obtenez toujours aucune réponse.<br>
									<br>
									Tant pis, vous décidez de procéder directement à une fouille minutieuse de la maison pour tenter d\'obtenir vous-mêmes des informations.
								</p>
								<center>
									<form action="pellington/rdc.php" method="post">
										<input type="submit" name="tour" value="Faire le tour.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<p>
									Le docteur Pellington vit dans un quartier riche d\'Arkham, dans une grande maison à 3 étages et flanquée d\'autres maisons du même type sur les côtés.<br>
									Vous sonnez à la porte et attendez pendant ce qui vous semble être une éternité, mais vous n\'obtenez aucune réponse.<br>
									<br>
									Las d\'attendre, vous décidez de faire le tour de la maison pour voir s\'il n\'y a pas un accès par l\'arrière.
								</p>
								<center>
									<form action="107parkavenue.php" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>