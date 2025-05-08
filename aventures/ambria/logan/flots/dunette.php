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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/styleambria.css">
		<meta charset="utf-8">
		<title>Dunette - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['dunetteok'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous repassez sur la dunette.<br>
									<br>
									Le timonier a fini de manger et vous fait un petit signe reconnaissant de la tête.<br>
									<br>
									Vous vous dirigez vers la poupe et observez un instant le sillage du Surgisseur des Tempêtes.<br>
									Vous pensez avoir aperçu un dauphin sauter hors de l\'eau, non loin, mais sans en être tout à fait sûr.<br>
									<br>
									Il est temps de reprendre votre visite.
								</p>
							';
						}
					elseif ($_SESSION['victuailles'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous vous approchez du timonier, le sac de victuailles dans les bras.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Ah, parfait ! Merci mon gars, j\'espère que le coq t\'a pas fait d\'scène pour lui avoir emprunté ça, au moins ?
										</p>
									</div>
								</div>
								<p>
									Amusé, vous lui dites que tout s\'est bien passé avant de le laisser savourer ce que vous lui avez apporté et de repartir visiter le bateau.
								</p>
							';
							$_SESSION['victuailles'] = false;
							$_SESSION['dunetteok'] = true;
							$_SESSION['loganconfiance'] += 10;
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous arrivez sur la dunette, où se trouve le timonier.
									Celui-ci se tient à côté de la barre, attendant que le capitaine lui donne ses ordres pour savoir quel cap donner au Surgisseur des Tempêtes.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Salut mon gars ! Alors comme ça, c\'est toi qui va pouvoir nous indiquer not\' prochaine destination, hein ?<br>
											Tu sais par où qu\'on doit s\'diriger alors ?
										</p>
									</div>
								</div>
								<p>
									Un peu honteux, vous lui avouez que vous n\'en savez rien pour le moment, n\'ayant jamais navigué vous ne savez pas comment vous y prendre.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Ah, tant pis ! Faudrait qu\'tu voies avec le cap, lui il saura quoi faire.<br>
											<br>
											Tiens, si ça t\'dérange pas : pendant qu\'tu fais le tour du vaisseau, tu voudrais pas passer au mess et m\'ramener un truc à manger ?
										</p>
									</div>
								</div>
								<p>
									Vous lui dites que vous allez faire votre possible pour lui apporter quelque chose et redescendez de la dunette.
								</p>
							';
							$_SESSION['dunettevisitee'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>