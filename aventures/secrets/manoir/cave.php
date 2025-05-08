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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/css/style.css">
		<meta charset="utf-8">
		<title>Cave - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['cave']))
						{
							switch(str_replace($search, $replace, stripslashes($_POST['cave'])))
								{
									case "fuite":
										echo '
											<p>
												Vous inspectez les murs de la cave mais vous ne remarquez aucune trace d\'humidité. La théorie apportée par les domestiques ne semble pas être la bonne...
											</p>
											<center>
												<form action="cave.php" method="post">
													<input type="text" name="cave"> <input type="submit" name="chercher" value="Chercher.">
												</form>
											</center>
										';
										break;
									case "restes":
										echo '
											<p>
												Vous retroussez vos manches et commencez à fouiller les poubelles.
												Après tout, ce n\'est pas la première fois que l\'une de vos enquêtes vous mène à fouiller dans des ordures.<br>
												<br>
												Au bout d\'un moment, vous finissez par sortir quelques morceaux de tableau calcinés que vous essayez de rassembler.
												Malheureusement, votre oncle a détruit la majeure partie de l\'œuvre et vous ne pouvez pas compter le nombre de personnages se trouvant dessus.<br>
												<div id="enigme">
												<a href="/escaperpg/images/secrets/tableaubrule.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/tableaubrule.png"></a>
												</div>
												<br>
												Il vous faudrait essayer de savoir à quoi elle ressemble dans son intégralité pour avancer.<br>
												Dans le doute, vous prenez ces quelques morceaux avec vous.
											</p>
											<center>
												<form action="cave.php" method="post">
													<input type="submit" name="restab" value="Ajouter à l\'inventaire.">
												</form>
											</center>
										';
										break;
									default:
										echo '
											<p>
												Vous avez beau chercher, vous ne trouvez rien de particulier ici.
											</p>
											<center>
												<form action="cave.php" method="post">
													<input type="text" name="cave"> <input type="submit" name="chercher" value="Chercher.">
												</form>
											</center>
										';
										break;
								}
						}
					elseif (isset($_POST['restab']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous essayez de fouiller un peu plus, mais il est évident maintenant que vous ne trouverez pas d\'autres morceaux du tableau pour vous aider à avancer.
								</p>
								<center>
									<form action="cave.php" method="post">
										<input type="text" name="cave"> <input type="submit" name="chercher" value="Chercher.">
									</form>
								</center>
							';
							$_SESSION['restab'] = true;
							$_SESSION['restabinv'] = true;
						}
					else
						{
							echo '
								<p>
									En entrant dans la cave, vous êtes assailli par la terrible <span class="mdp">odeur</span> qui vous a gêné lors de votre arrivée.<br>
									Elle semble beaucoup plus forte ici. Cependant, vous n\'arrivez pas à découvrir d\'où elle pourrait provenir précisément.
								</p>
								<center>
									<form action="cave.php" method="post">
										<input type="text" name="cave"> <input type="submit" name="chercher" value="Chercher.">
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