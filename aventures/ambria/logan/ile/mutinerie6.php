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
		<title>Voyage de retour - Le Trésor d'Ambria</title>
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
					echo'
						<audio src="/escaperpg/sons/ambria/mutinerieechec.mp3" autoplay></audio>
						<div class="dialogue">
							<div class="portrait">
								<img src="/escaperpg/images/ambria/lloyd.png">
							</div>
							<div class="bulleperso">
								<p>
									Hé, toi là, qu\'est-ce que tu fais ici ?!
								</p>
							</div>
						</div>
						<p>
							Le garde se jette sur vous.<br /<
							<br>
							Vous tentez de fuir aussi vite que possible, mais vous êtes bien vite rattrapé par des hommes surgissant de tous les côtés.
						</p>
						<div class="dialogue">
							<div class="portrait">
								<img src="/escaperpg/images/ambria/lloyd.png">
							</div>
							<div class="bulleperso">
								<p>
									Ooooh, toi… Ça fait un moment que j\'t\'ai à l\'œil, j\'savais qu\'tu t\'comportais bizarrement d\'puis quelques temps !<br>
									<br>
									LES GARS ! Y A LE P\'TIT QU\'ESSAYE DE S\'TIRER !
								</p>
							</div>
						</div>
						<p>
							Vous voyez la haine dans le regard de vos anciens compagnons qui vous empoignent pour vous neutraliser alors que vous essayez de vous débattre, sans succès.
							Ils vous entravent rapidement les mains puis vous emmènent à la cale, où se trouve une cellule dans laquelle ils vous enferment en attendant le retour de Jake pour savoir ce qu\'il vont faire de vous.<br /<
							<br>
							Vous le savez, dans la piraterie les traîtres ne font pas long feu et votre fin est proche, à présent.<br /<
							<br>
							Finalement, la vie d\'aventure dont vous rêviez n\'aura été que de courte durée.
						</p>
						<center>
							<form action="../ends/2d5pl4.php" method="post">
								<input type="submit" name="suivant" value="Fin.">
							</form>
						</center>
					';
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>