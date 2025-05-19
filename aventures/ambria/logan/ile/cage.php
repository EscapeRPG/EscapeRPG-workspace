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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>La Pyramide - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['mdp12']) // La mutinerie n'a pas eu lieu mais Logan n'a pas gagné la confiance de l'équipage.
						{
							echo'
								<audio src="/escaperpg/sons/ambria/prisonmonte.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">C\'est bon</span> !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									La cage se soulève soudain et retourne se positionner dans le plafond, libérant aussitôt le capitaine qui félicite les gars une nouvelle fois puis avance vers le monticule de richesses.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Allez, emballez-moi tout ça, nous sommes riches, compagnons !
										</p>
									</div>
								</div>
								<center>
									<form action="../ends/4b56tr" method="post">
										<input type="submit" name="partir" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp18'] = true;
						}
					elseif ($_SESSION['mdp14']) // La mutinerie n'a pas eu lieu et Logan a gagné la confiance de l'équipage.
						{
							echo'
								<audio src="/escaperpg/sons/ambria/prisonmonte.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">Ça marche</span> !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									La cage se soulève soudain et retourne se positionner dans le plafond, libérant aussitôt le capitaine qui félicite les gars une nouvelle fois puis avance vers le monticule de richesses.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Allez, emballez-moi tout ça, nous sommes riches, compagnons !
										</p>
									</div>
								</div>
								<center>
									<form action="../ends/5cvq17" method="post">
										<input type="submit" name="partir" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp19'] = true;
						}
					else // La mutinerie a eu lieu mais Logan n'y a pas participé.
						{
							echo'
								<audio src="/escaperpg/sons/ambria/prisonmonte.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">Préparez-vous</span> !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Vous actionnez le levier. La cage se soulève soudain et retourne se positionner dans le plafond, libérant le capitaine.
									Aussitôt, il tire sa lame au clair et embroche Lloyd qui, stupéfié, n\'a pas eu le temps de réagir.<br>
									Pendant ce temps, profitant de l\'effet de surprise, vous plantez votre sabre dans le torse d\'un autre type.<br>
									<br>
									Laissant tomber ce qu\'ils avaient dans les mains, le reste des mutins sort les armes.<br>
									<br>
									Jake hurle :
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											FAITES-LEUR LA PEAU !
										</p>
									</div>
								</div>
								<center>
									<form action="../ends/3xtr21" method="post">
										<input type="submit" name="partir" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp17'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
