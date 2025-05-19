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
		<title>Deuxième étage - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png" alt="inspecteur deckard"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['fouille']) AND str_replace($search, $replace, stripslashes($_POST['fouille'])) == "barbiturique")
						{
							echo '
								<p>
									En fouillant un peu, vous finissez par trouver des feuilles traitant de barbituriques et autres narcotiques.<br>
									<br>
									Sur l\'une d\'elles, vous trouvez une recette pour composer un traitement contrant leurs effets.
								</p>
								<div id="enigme">
									<a href="/escaperpg/images/secrets/recette.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/recette.png"></a>
								</div>
								<p>
									Vous la prenez avec vous, cela pourrait s\'avérer utile.
								</p>
								<center>
									<form action="deuxiemeetage" method="post">
										<input type="submit" name="recette" value="Ajouter à l\'inventaire.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['recette']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous estimez avoir passé suffisamment de temps à fouiller cette pièce et vous ne pensez pas pouvoir trouver quoi que ce soit d\'autre d\'utile ici.
								</p>
							';
							$_SESSION['recette'] = true;
							$_SESSION['flacon'] = false;
						}
					elseif (isset($_POST['fouille']))
						{
							echo '
								<p>
									Il ne semble rien y avoir ici en rapport avec ce que vous cherchez.
								</p>
								<center>
									<form action="deuxiemeetage" method="post">
										<input type="text" name="fouille"> <input type="submit" name="fouiller" value="Fouiller.">
									</form>
								</center>
							';
						}
					elseif ($_SESSION['recette'])
						{
							echo '
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/pelldeuxieme.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pelldeuxieme.png"></a>
									</div>
									<br>
									Tout cet étage est en fait un laboratoire où le docteur pouvait mener diverses expériences et synthétiser toutes sortes de médicaments.<br>
									<br>
									Vous trouvez tout un tas de notes à propos de ses travaux mais elles ne vous semblent d\'aucune utilité.
								</p>
							';
						}
					else
						{
							echo '
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/pelldeuxieme.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pelldeuxieme.png"></a>
									</div>
									<br>
									Tout cet étage est en fait un laboratoire où le docteur pouvait mener diverses expériences et synthétiser toutes sortes de médicaments.<br>
									<br>
									Vous trouvez tout un tas de notes à propos de ses travaux.
								</p>
								<center>
									<form action="deuxiemeetage" method="post">
										<input type="text" name="fouille"> <input type="submit" name="fouiller" value="Fouiller.">
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
