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
		<title>Rez-de-chaussée - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<p>
					<div id="enigme">
						<a href="/escaperpg/images/secrets/pellrdc.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pellrdc.png"></a>
					</div>
					<br>
					Vous êtes au rez-de-chaussée de la maison de Pellington.<br>
					<br>
					La porte arrière par laquelle vous êtes arrivé donne sur une cuisine, laquelle débouche aussitôt sur une grande salle à manger où de nombreux meubles servent au docteur à entreposer sa vaiselle.<br>
					Un petit couloir vous permet d'accéder aux toilettes d'un côté et au <span class="lieu">salon</span> de l'autre, où se trouvent également les escaliers menant au <span class="lieu">premier étage</span> et à la <span class="lieu">cave</span>.<br>
					Enfin, en vous dirigeant vers la porte d'entrée principale, vous devez passer par un <span class="lieu">vestibule</span> servant à déposer les vêtements de Pellington et de ses éventuels patients.<br>
				</p>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>