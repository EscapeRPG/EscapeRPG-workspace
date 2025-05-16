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
		<title>Premier étage - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<p>
					<div id="enigme">
						<a href="/escaperpg/images/secrets/pellpremier.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pellpremier.png"></a>
					</div>
					<br>
					Le premier étage se compose de 4 pièces, outre l'espace contenant les escaliers descendant au <span class="lieu">rez-de-chaussée</span> et montant au <span class="lieu">deuxième</span>.<br>
					La pièce jouxtant directement l'escalier est assez spacieuse et sert de débarras au docteur, vous fouillez rapidement l'endroit mais il ne semble rien y avoir qui vous permettrait d'avancer dans votre enquête.<br>
					Un couloir mène ensuite à une chambre d'ami, où vous trouvez un lit sommaire ainsi qu'une armoire vide pour que les visiteurs de Pellington puisse déposer leurs affaires, rien d'intéressant ici.
					Vous arrivez ensuite dans la <span class="lieu">chambre</span> du maître de maison, collée à sa <span class="lieu">salle de bain</span>.
				</p>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
