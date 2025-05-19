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
		<title>Sur les Flots - Le Trésor d'Ambria</title>
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
				<?php if ($_SESSION['ambriasurlesflots']) { include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationbateau.php"; } ?>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous êtes actuellement sur le <span class="lieu">pont principal</span>.
									Vous saluez les hommes présents et pouvez vous diriger où vous le désirez.<br>
									Le Surgisseur des Tempêtes est assez grand. Au-dessus de vous se trouve la <span class="lieu">dunette</span> où vous pouvez trouver le timonier, marin gérant la barre pour diriger le bateau.
									En-dessous se trouve le <span class="lieu">pont inférieur</span> pour y inspecter les canons et accéder au <span class="lieu">mess</span> pour vous restaurer,
									ou le <span class="lieu">quartier des équipages</span> où vous pourrez dormir lorsque vous ne serez pas de quart.
									Enfin, encore en-dessous, il y a la <span class="lieu">cale</span> où sont entreposées toutes sortes de biens et où Barthy vous a donné rendez-vous par la suite.
								</p>
							';
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											Bon… C\'pas tout à fait ça. Faudra faire mieux mais j\'imagine qu\'t\'es un peu chamboulé après tout c\'qui s\'est passé.<br>
											<br>
											Bon allez, va faire un peu l\'tour du bateau pour t\'familiariser avec les lieux. On va pas avoir b\'soin d\'toi tout d\'suite.<br>
											Quand t\'auras fini, R\'joins-moi dans la <span class="lieu">cale</span>, j\'te présenterai aux autres autour d\'une partie d\'dés.<br>
											<br>
											Au fait, moi c\'est Barthy.
										</p>
									</div>
								</div>
								<p>
									
								</p>
								<center>
									<form action="flots2" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['ambriasurlesflots'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
