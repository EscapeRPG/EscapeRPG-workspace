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
		<title>Salle de bain - Secrets Familiaux</title>
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
					if ($_SESSION['antidote'])
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/sdbarmoireopened.png">
									</div>
									Une salle de bain plutôt ordinaire, vous semble-t-il.<br>
									<br>
									Vous n\'avez plus rien à faire ici.
								</p>
							';
						}
					elseif ($_SESSION['armoireopened'])
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/sdb.png">
										<div id="armoireopened">
											<form action="armoireapharmacie" method="post">
												<button type="submit" name="armoireopened">
													<img src="/escaperpg/images/secrets/armoirepharmopened.png">
												<button>
											</form>
										</div>
									</div>
									Une salle de bain plutôt ordinaire, vous semble-t-il.<br>
									<br>
									Pensez-vous pouvoir faire quelque chose avec les flacons de l\'armoire à pharmacie ?
								</p>
							';
						}
					else
						{
							echo '
								<p>
									<div id="enigmelieu">
										<img src="/escaperpg/images/secrets/sdb.png">
										<div id="armoire">
											<form action="armoireapharmacie" method="post">
												<button type="submit" name="armoire">
													<img src="/escaperpg/images/secrets/armoirepharm.png">
												<button>
											</form>
										</div>
									</div>
									Une salle de bain plutôt ordinaire, vous semble-t-il.<br>
									<br>
									Pensez-vous pouvoir y trouver quoi que ce soit d\'utile ?
								</p>
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
