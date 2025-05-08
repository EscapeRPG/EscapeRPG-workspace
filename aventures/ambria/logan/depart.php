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
		<title>Introduction - Le Trésor d'Ambria</title>
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
					Vous êtes Logan Barthélémy, un jeune habitant de l'Île de la Tortue.<br>
					Depuis tout petit, vous êtes bercé par les récits que vous racontait votre mère pour vous endormir.
					Ces histoires d'explorateurs et d'aventuriers ont façonné votre imaginaire et vous vous êtes souvent surpris à rêver d'être l'un d'entre eux.<br>
					<br>
					Malheureusement, la réalité s'est révélée bien différente.<br>
					Vous n'avez pas connu votre père et l'homme avec qui votre mère s'est remariée n'est autre qu'une brute et un salaud.
					Vous ne comptez plus les fois où, ivre mort, celui-ci est rentré d'humeur massacrante pour vous battre tous les deux.<br>
					Jusqu'à ce fameux soir, il y a trois mois, où il est allé trop loin...<br>
					<br>
					Vous êtes désormais l'un de ces nombreux orphelins qui vivent dans la rue.
					La vie est dure, mais cela vaut toujours mieux que celle avec votre beau-père.<br>
					Votre seul refuge est la bibliothèque où vous pouvez revivre vos aventures, bien que vous ne sachiez pas lire.
					Heureusement, Louis, le bibliothécaire, est devenu votre ami et vous lit souvent de passionnants récits.<br>
					Vous espérez un jour pouvoir partir d'ici et vivre l'aventure à votre tour. Mais la vie n'est pas aussi simple et la réalité souvent cruelle.<br>
					Aujourd'hui cependant, quelque chose est différent : Louis vous a demandé de passer le voir à la nuit tombée. Il avait l'air soucieux sans que vous ne sachiez pourquoi.<br>
					<br>
					Vous avez attendu toute la journée que vienne l'heure du fameux rendez-vous et vous êtes maintenant devant la porte de la bibliothèque, anxieux.
				</p>
				<center>
					<form action="bibliotheque.php" method="post">
						<input type="submit" name="continuer" value="Entrer.">
					</form>
				</center>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>