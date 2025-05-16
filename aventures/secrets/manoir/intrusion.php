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
		<title>Intrusion - Secrets Familiaux</title>
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
					if (isset($_POST['suivant']))
						{
							echo '
								<p>
									Par précaution, vous préférez ne pas toucher aux restes de votre repas et d\'avertir les domestiques.<br>
									<br>
									Vous avez le reste de la journée devant vous pour décider de fouiller le manoir et faire l\'inventaire des biens de votre oncle, avant de retourner vous coucher dans votre <span class="lieu">chambre</span>.
								</p>
								<center>
									<form action="rdc" method="post">
										<input type="submit" name="suivant2" value="Faire un tour.">
									</form>
									<form action="nuit" method="post">
										<input type="submit" name="nuit" value="Aller dormir.">
									</form>
								</center>
							';
							$_SESSION['intrusion'] = true;
							$_SESSION['chiensmalades'] = true;
						}
					else
						{
							echo '
								<p>
									La fenêtre de la salle à manger est ouverte alors qu\'il n\'est clairement pas la saison pour aérer, malgré l\'<span class="mdp">odeur</span> qui règne dans le manoir.
									Quelqu\'un a dû passer par là.<br>
									Vous inspectez un peu mieux la pièce et apercevez des traces de boue sur le sol, traversant la salle à manger.<br>
									<br>
									En remontant la piste, vous voyez que le rôdeur, qui s\'est bel et bien introduit chez vous, s\'est dirigé juste à côté de l\'endroit où vous étiez en train de manger, avant de se diriger vers la cuisine puis de ressortir par la fenêtre.
								</p>
								<center>
									<form action="intrusion" method="post">
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
