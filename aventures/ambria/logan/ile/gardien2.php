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
		<title>Le Gardien - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					echo'
						<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
						<p>
							Escaladant péniblement, vous vous hissez sur le dos de la créature tout en parvenant à ne pas être éjecté par les mouvements brusques que celle-ci fait pour tenter de se débarrasser de vous.<br>
							<br>
							Vous remarquez alors une plaque de métal qui s\'est légèrement délogée de son emplacement.
							Prenant vos appuis, vous tirez votre lame au clair et l\'engouffrez dans l\'orifice avant de forcer pour faire levier.<br>
							La plaque ne tarde pas à céder et tombe lourdement au sol.
							Vous voyez à l\'intérieur de l\'ouverture ainsi créée tout un tas de rouages en pleine activité et commencez à frapper de toutes vos forces pour tenter d\'enrayer la machine.<br>
							<br>
							Soudain, le golem se cabre et commence à s\'agiter en tous sens et à frapper son dos de ses énormes mains pour tenter de vous écraser comme un vulgaire moustique.
							Le monstre donne une violente secousse en se redressant et vous n\'arrivez pas à garder votre prise.<br>
							<br>
							Éjecté sans ménagement, vous faites un vol plané au-dessus du sol et atterrissez sur la terrasse surplombant l\'entrée de la pyramide.<br>
							Vous roulez sur le sol et parvenez de justesse à ne rien vous casser.<br>
							<br>
							Toujours saisie de tremblements d\'une violence rare, la statue animée finit par flancher et tombe à moitié, son immense tête frappant le sol à quelques mètres de Sullivan.<br>
							<br>
							Cependant, votre adversaire ne semble pas vouloir s\'avouer vaincu et commence à prendre appui pour se redresser.
						</p>
						<div class="dialogue">
							<div class="bulleperso2">
								<p>
									Capitaine ! C\'est le moment de l\'achever, <span class="mdp2">MAINTENANT</span> !
								</p>
							</div>
							<div class="portrait2">
								<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
							</div>
						</div>
						<center>
							<form action="gardien" method="post">
								<input type="submit" name="golem2" value="Suivant.">
							</form>
						</center>
					';
					$_SESSION['loganconfiance'] += 20;
					$_SESSION['mdp10'] = true;
					$_SESSION['combat3'] = true;
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
