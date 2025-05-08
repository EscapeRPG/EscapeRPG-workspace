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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>Introduction - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					echo'<div id="succespopup">';
					$nouveausucces = '<img src="/escaperpg/images/succes/general/debut.png"><span><u><b>Se lancer dans l\'aventure</b></u><br>Commencer une aventure pour la première fois</span>';
					$scenario = 'general';
					$description = 'début';
					$cache = 'non';
					$rarete = 'succesnormal';
					include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					$nouveausucces = '<img src="/escaperpg/images/succes/ambria/debut.png"><span><u><b>En route pour l\'aventure</b></u><br>Lancer l\'aventure pour la première fois</span>';
					$scenario = 'ambria';
					$description = 'début';
					$cache = 'non';
					$rarete = 'succesnormal';
					include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					echo'</div>';
					
				?>
				<p>
					1702.<br>
					<br>
					Vous êtes Sullivan Mason, le terrible capitaine du Surgisseur des Tempêtes, craint par-delà les mers.
					La seule évocation de votre nom suffit à faire trembler de peur les marins de tous les pays.<br>
					Votre réputation n'a d'égale que votre cruauté et vous sillonnez les océans depuis de longues années, à la recherche des plus fabuleux trésor.<br>
					<br>
					Ces derniers temps, cependant, vous n'avez réussi à mettre la main que sur de maigres butins et vous n'êtes plus en mesure de mener le train de vie auquel vous et votre équipage vous êtes habitués.
					L'humeur de tous est de plus en plus maussade...<br>
					Heureusement, l'un de vos contacts vous a parlé d'une carte pouvant vous mener sur la piste du légendaire trésor d'Ambria, la cité perdue.<br>
					<br>
					Cette carte serait apparemment détenue par un habitant de l'Île de la Tortue...
				</p>
				<center>
					<form action="tortuga.php" method="post">
						<input type="submit" name="continuer" value="Accoster.">
					</form>
				</center>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>