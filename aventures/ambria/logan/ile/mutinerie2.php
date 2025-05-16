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
		<title>Voyage de retour - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					echo'
						<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
						<p>
							Le lourd sac de richesses sur l\'épaule, vous passez la tête en haut de l\'escalier pour observer le pont.<br>
							<br>
							Quelques hommes se trouvent dessus, manifestement peu enclins à patrouiller avec vigilance, malgré les ordres de Jake.<br>
							Un ou deux autres types sont un peu plus proches, cependant vous remarquez qu\'ils sont trop occupés à fumer leur pipe en vous tournant le dos.
							Après tout, ces gaillards surveillent plutôt les menaces qui pourraient provenir de l\'extérieur du navire, ce qui vous offre un parfaite occasion de filer en douce.<br>
							<br>
							Sur la pointe des pieds, vous avancez sur le pont en direction du planchon toujours installé et descendez sur le ponton du quai.<br>
							Passant d\'ombre en ombre, vous parvenez à rejoindre la terre ferme sans qu\'aucune alerte ne soit lancée puis, dès que vous estimez être à une distance raisonnable pour être certain de ne plus être vu,
							vous vous mettez à courir sur la route, prenant une direction au hasard en espérant tomber sur une ville un peu plus loin, où les pirates ne viendront pas vous chercher.
							De là, avec la petite fortune que vous avez emmenée, vous pourrez trouver de quoi repartir ailleurs pour fonder une nouvelle vie, loin des tumultes de votre passé et de l\'aventure qui,
							au final, vous aura mené plus d\'une fois aux portes de la mort et dont vous vous passerez sans le moindre souci !<br>
							<br>
							Au bout de quelques kilomètres, vous croisez la route d\'un vieil homme en charrette qui vous propose de vous emmener à la ville la plus proche et grimpez avec lui.<br>
							<br>
							Avant même que le jour ne soit levé, vous êtes bien au chaud dans le lit d\'une auberge, prêt à passer la première véritable bonne nuit depuis bien des années.
							Les pirates du Surgisseur des Tempêtes sont loin derrière vous et, plus jamais, vous n\'entendrez parler d\'eux.
						</p>
						<center>
							<form action="../ends/2d5pl4" method="post">
								<input type="submit" name="suivant" value="Fin.">
							</form>
						</center>
					';
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
