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
		<title>Manoir - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['suivant']) AND !isset($_POST['suivre']))
						{
							echo '
								<audio src="/escaperpg/sons/secrets/chiens.mp3" autoplay></audio>
								<p>
									L\'antique demeure de vos ancêtres se dresse au fond de l\'allée traversant un immense jardin.<br>
									Vous êtes accueilli par des aboiements de <span class="mdp">chiens</span>.<br>
									<br>
									Vous ne saviez pas que votre oncle en avait.
								</p>
								<center>
									<form action="15hamiltonstreet" method="post">
										<input type="submit" name="suivant2" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp6'] = true;
						}
					elseif (isset($_POST['suivant2']) AND !isset($_POST['suivre']))
						{
							echo '
								<p>
									Gaspard s\'approche de la grille.
									<p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/secrets/gaspard.png">
											</div>
											<div class="bulleperso">
												<p>
													Désolé pour ça. Nous avons eu quelques… <span class="mdp">soucis</span> ces derniers temps et votre oncle a préféré assurer sa sécurité. Je vous en prie, suivez-moi.
												</p>
											</div>
										</div>
									</p>
								</p>
								<center>
									<form action="15hamiltonstreet" method="post">
										<input type="submit" name="suivre" value="Le suivre.">
									</form>
								</center>
							';
							$_SESSION['mdp7'] = true;
						}
					elseif (isset($_POST['suivre']))
						{
							echo '
								<p>
									Il vous fait traverser l\'allée et vous tend un jeu de clés.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/gaspard.png">
										</div>
										<div class="bulleperso">
											<p>
												Tenez, voici les clés du manoir. Elles sont à vous maintenant. Je vous laisse entrer, je dois aller nourrir les chiens.
											</p>
										</div>
									</div>
									Vous êtes devant la porte du manoir qui semble fermée.<br>
									<br>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/porteentree.png">
									</div>
									<br>
									<div id="enigme">
										<form action="manor" method="post">
											<button type="submit" name="cle1" class="cle1">
											<button type="submit" name="cle2" class="cle2">
											<button type="submit" name="cle3" class="cle3">
											<button type="submit" name="cle4" class="cle4" formaction="manoir.php">
											<button type="submit" name="cle5" class="cle5">
										</form>
									</div>
								</p>
							';
						}
					else
						{
							echo '
								<p>
									Le manoir Deckard est situé aux abords de la ville, dans une petite zone boisée, calme et isolée.<br>
									<br>
									Il est 20 heures lorsque vous arrivez devant les grilles.
								</p>
								<center>
									<form action="15hamiltonstreet" method="post">
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
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
