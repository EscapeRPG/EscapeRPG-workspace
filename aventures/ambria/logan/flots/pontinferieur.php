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
		<title>Pont Inférieur - Le Trésor d'Ambria</title>
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
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['loganavecjake'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/pontinferieur.mp3" autoplay></audio>
								<p>
									Vous descendez l\'escalier menant au pont inférieur avec Jake.<br>
									<br>
									Vous voyez alors les canons alignés près des sabords, prêts à être utilisés dès que besoin.
									Les barils de poudre ainsi que les boulets sont entassés à portée pour faciliter leur utilisation et permettre à l\'équipage d\'être le plus réactif possible en cas d\'attaque.<br>
									Un peu plus loin, dans un espace aménagé spécialement, se trouve le <span class="lieu">quartier des équipages</span> où les hommes peuvent s\'allonger dans les branles lorsqu\'ils sont de repos.
									Juste derrière se trouve le <span class="lieu">mess</span>, lieu de convivialité où l\'équipage vient se restaurer, discuter ou encore jouer aux cartes.<br>
									<br>
									Jake se tourne vers vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Tu risques de passer pas mal de temps par ici. Y a pas mal de choses à faire et c\'est un peu le cœur du vaisseau, tu peux te rendre où tu veux depuis ici.<br>
											<br>
											Si on tombe sur un navire ennemi pendant not\' voyage, faudra qu\'tu aides à combattre.
											Tout c\'que t\'auras à faire, c\'est amener les boulets aux canons après chaque tir et obéir aux ordres des types avec qui tu s\'ras.
										</p>
									</div>
								</div>
								<p>
									Vous hochez la tête.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Là-bas c\'est le <span class="lieu">mess</span>, c\'est là qu\'on s\'réunit pour manger, mais c\'est pas l\'heure pour l\'moment.
											On va plutôt passer au <span class="lieu">quartier des équipages</span> et on va t\'assigner un endroit où dormir quand t\'auras b\'soin.
										</p>
									</div>
								</div>
								<center>
									<form action="quartierdesequipages" method="post">
										<input type="submit" name="continuer" value="Continuer la visite.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/pontinferieur.mp3" autoplay></audio>
								<p>
									Vous vous rendez au pont inférieur.<br>
									<br>
									Les canons sont alignés près des sabords, prêts à être utilisés dès que besoin.
									Les barils de poudre ainsi que les boulets sont entassés à portée pour faciliter leur utilisation et permettre à l\'équipage d\'être le plus réactif possible en cas d\'attaque.<br>
									Un peu plus loin, dans un espace aménagé spécialement, se trouve le <span class="lieu">quartier des équipages</span> où les hommes peuvent s\'allonger dans les branles lorsqu\'ils sont de repos.
									Juste derrière se trouve le <span class="lieu">mess</span>, lieu de convivialité où l\'équipage vient se restaurer, discuter ou encore jouer aux cartes.
								</p>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
