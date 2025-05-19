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
		<title>La Tempête - Le Trésor d'Ambria</title>
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
					if ($_SESSION['affale'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempetecracks.mp3" autoplay></audio>
								<p>
									Malgré votre entraînement, les conditions météorologiques et l\'urgence de la situation font que vous mettez du temps à grimpez et la voile continue d\'être battue par les vents, menaçant l\'intégrité du mât.<br>
									Vous vous hâtez d\'affaler la voile qui retombe en s\'ouvrant en grand sous l\'effet du vent. La bourrasque fait prendre un brusque écart au navire.<br>
									<br>
									Le capitaine a-t-il pris la bonne décision ?
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="submit" name="vigie" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['haubans'] = false;
							$_SESSION['loganconfiance'] -= 20;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempetecracks.mp3" autoplay></audio>
								<p>
									Malgré votre entraînement, les conditions météorologiques et l\'urgence de la situation font que vous mettez du temps à grimpez et la voile continue d\'être battue par les vents, menaçant l\'intégrité du mât.<br>
									Vous vous hâtez de ferler la voile en la repliant sur elle-même pour que le vent ne risque pas de la déchirer ou de vous propulser sur un rocher.
								</p>
								<center>
									<form action="tempete" method="post">
										<input type="submit" name="vigie" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['haubans'] = false;
							$_SESSION['loganconfiance'] -= 20;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
