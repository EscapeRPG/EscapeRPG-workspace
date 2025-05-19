<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/css/style.css">
		<meta charset="utf-8">
		<title>Tableau brûlé - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png" alt="inspecteur deckard"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					echo'
						<p>
							<div id="enigmelieu">
								<img src="/escaperpg/images/secrets/tableaubrule.png">
							</div>
							Des fragments de tableau brûlés. Si seulement vous pouviez retrouver l\'œuvre originale !
						</p>
					';
					if (isset($_POST['indice']))
						{
							echo '
								<p>
									<span class="indice">
										Apparemment, le nom du peintre de ce tableau est intact et pourrait vous permettre de la retrouver entière en cherchant un peu.
									</span>
								</p>
								<center>
									<form action="tableaubrule" method="post">
										<button type="submit" name="indice2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice2']))
						{
							echo '
								<p>
									<span class="indice">
										Apparemment, le nom du peintre de ce tableau est intact et pourrait vous permettre de la retrouver entière en cherchant un peu.<br>
										Il s\'agit d\'un tableau du célèbre Rembrandt.
									</span>
								</p>
								<center>
									<form action="tableaubrule" method="post">
										<button type="submit" name="indice3" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice3']))
						{
							echo '
								<p>
									<span class="indice">
										Apparemment, le nom du peintre de ce tableau est intact et pourrait vous permettre de la retrouver entière en cherchant un peu.<br>
										Il s\'agit d\'un tableau du célèbre Rembrandt.<br>
										Le nom de cette peinture est "La Leçon d\'Anatomie", peinte en 1632.
									</span>
								</p>
								<center>
									<form action="tableaubrule" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['reponse']))
						{
							echo '
								<p>
									<span class="reponse">
										La note du docteur Pellington vous dit de compter le nombre de personnages présents sur ce tableau, sans préciser s\'il faut prendre en compte uniquement les vivants ou non.<br>
										Il faut donc bien compter tous les personnages, ce qui en donne 9.
									</span>
								</p>
							';
						}
					else
						{
							echo '
								<center>
									<form action="tableaubrule" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
