<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title>Le Signal - Station GAEA-1</title>
	</head>

	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<main>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if (isset($_POST['suite'])): ?>
					<p>Une série d'informations défile devant vos yeux. À l'exception d'un signal émanant du vide, quelque part dans votre secteur, tout semble normal.</p>

					<div class="dialogue">
						<div class="bulleperso2">
							<p>
								C'est quoi, cette alerte ? Affichage plein écran.
							</p>
						</div>

						<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
					</div>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								Action impossible. Signal faible, traitement requis.
							</p>
						</div>
					</div>

					<p>
						Vous grognez une fois de plus et vous vous tournez vers l'écran de gestion de l'antenne.
					</p>

					<form action="signal" method="post">
						<input type="submit" name="calibrer" value="calibrer l'antenne.">
					</form>

				<?php elseif (isset ($_POST['calibrer']) OR $_SESSION['scan']): ?>
					<?php $_SESSION['scan'] = true ?>
					
					<div id="canvas-wrap" style="width: 80%">
						<img src="/escaperpg/images/gaea1/scan/fondscan.png">
						<canvas id="canvasfond"><img src="/escaperpg/images/gaea1/scan/etoiles.png" id="fond"></canvas>
						<canvas id="canvasoverlay"><img src="/escaperpg/images/gaea1/scan/scanoverlay.png" id="ol"></canvas>

						<div id="coordinates">
							Orientation de l'antenne :
							<ul>
								<li>X = <span id="mouseX"></span></li>
								<li>Y = <span id="mouseY"></span></li>
							</ul>
						</div>
					</div>

					<p>
						Vous vous saisissez du manche permettant de calibrer l'antenne. Vous êtes ainsi en mesure de déplacer la carte à l'écran.<br>
						En pointant directement la source du signal, vous devriez pouvoir récupérer les données et lire son contenu.
					</p>
					
					<script src="/escaperpg/aventures/gaea1/scripts/scanzoom.js"></script>
					
					<?php 
						$reponse = "Rendez-vous aux coordonnées suivantes et cliquez sur le point marron qui s'y trouve :<br><br>X = 1 044.<br>Y = 328.";
						$indice1 = "Tâchez de trouver les coordonnées de l'origine du signal.<br>
							Vous pouvez déplacer l'image à l'écran en cliquant dessus et en déplaçant votre souris, ainsi que zoomer à l'aide de la molette.<br>
							Activer le son pour cette énigme peut vous aider grandement.";
						$indice2 = "Essayez de zoomer dès que vous entendez le son du signal pour rétrécir la zone de recherche.";
						$indice3 = "Plus vous vous trouvez proche de la source du signal, plus celui-ci sera clair. Essayez de trouver la zone où le son est continu.";

						include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/indices.php";
					?>

				<?php else: ?>
					<audio src="/escaperpg/sons/gaea1/marvmusic.mp3" autoplay></audio>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								Bon réveil, <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?>, bienvenue sur la passerelle !
							</p>
						</div>
					</div>

					<p>
						Vous grognez en vous installant dans le fauteuil de pilotage.
						L'intelligence artificielle qui régit l'ordinateur vous accueille comme à son habitude avec une musique douce.<br>
						Quand vous l'avez installée, ça vous semblait être une bonne idée mais, avec le temps, ce rituel finit par vous taper sur le système.<br><br>
						Vous annoncez d'une voix pâteuse :
					</p>

					<div class="dialogue">
						<div class="bulleperso2">
							<p>
								Affiche les données de vol.
							</p>
						</div>
						
						<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
					</div>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								À vos ordres, <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?> !
							</p>
						</div>
					</div>

					<form action="signal" method="post">
						<input type="submit" name="suite" value="suivant.">
					</form>
				<?php endif; ?>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>
