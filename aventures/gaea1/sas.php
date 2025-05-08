<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/stylegaea.css">
		<meta charset="utf-8">
		<title>La Station - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if (isset($_POST['suivant'])): ?>
					<audio src="/escaperpg/sons/gaea1/station.mp3" autoplay></audio>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								J'ai déjà envoyé un message il y a 30 minutes, lorsque nous sommes entrés dans le champ radio.<br>
								Aucune réponse reçue et aucun signe d'activité repéré.
							</p>
						</div>
					</div>

					<p>
						Vous prenez quelques instants pour réfléchir.<br><br>
						Une station inconnue, près d'une planète inconnue, ne donnant pas signe de vie après avoir lancé un appel de détresse ?
						Cela pourrait tout aussi bien être un traquenard.
					</p>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								<?= $_SESSION['feminin'] ? 'Commandante' : 'Commandant' ?> ?
							</p>
						</div>
					</div>

					<div class="dialogue">
						<div class="bulleperso2">
							<p>
								Amène-nous jusqu'à la plateforme d'appontage, je vais aller voir ce qu'il se passe à bord.
							</p>
						</div>

						<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
					</div>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								Bien reçu.
							</p>
						</div>
					</div>

					<p>
						Alors que le Seeker s'oriente vers le hangar et que la station poursuit sa lente rotation, vous pouvez apercevoir l'inscription révélant son nom : GAEA-1.
					</p>

					<form action="sas" method="post">
						<input type="submit" name="suivant2" value="suivant.">
					</form>



				<?php elseif (isset ($_POST['suivant2'])): ?>
					<p>
						Observant l'approche de la station à travers la vitre du cockpit, vous constatez que votre vaisseau ralentit en arrivant devant la porte du hangar, qui reste hermétiquement close.
					</p>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								Requête d'appontage envoyée il y a 12 minutes et 56 secondes. Aucune réponse reçue.
							</p>
						</div>
					</div>

					<div class="dialogue">
						<div class="bulleperso2">
							<p>
								Je n'aime pas ça... Passe-moi les commandes du bras articulé, je vais forcer l'ouverture.
							</p>
						</div>
						
						<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
					</div>

					<form action="sas" method="post">
						<input type="submit" name="ouvrir" value="suivant.">
					</form>
				
				<?php elseif (isset ($_POST['ouvrir'])): ?>
					<div id="canvas-wrap">
						<img src="/escaperpg/images/gaea1/hangarsas/fond.png">
						<div id="portehangarsasdroite"><img src="/escaperpg/images/gaea1/hangarsas/portedroite.png"></div>
						<div id="portehangarsasgauche"><img src="/escaperpg/images/gaea1/hangarsas/portegauche.png"></div>
						<div id="hangarsas"><img src="/escaperpg/images/gaea1/hangarsas/hangarporteoverlay.png"></div>
						<canvas id="canvashangarsas" onmousemove="crosshair()"></canvas>
						<div id="hangarsasbtn" onmousedown="ouverturehangarsas()" onmousemove="crosshairgreen()"></div>
						<canvas id="canvasoverlay"></canvas>
						<div id="lumieres"><img src="/escaperpg/images/gaea1/hangarsas/lumieres.png"></div>
						<div id="hangarsasbras"><img src="/escaperpg/images/gaea1/hangarsas/bras.png"></div>
						<img src="/escaperpg/images/gaea1/hangarsas/cockpit.png" id="hangarsasoverlay">
					</div>

					<p>
						Vous agrippez le manche contrôlant le bras mécanique du vaisseau et tâchez d'ajuster votre position pour vous placer en face de l'ouverture manuelle du sas.<br>
						Une fois l'appareil stabilisé, vous n'avez plus qu'à diriger le bras en direction de la poignée rouge qui vous fait face.<br>
						<br>
						L'instrument est lent à se déployer, mais vous ne voyez pas d'autre solution.
					</p>

					<script src="/escaperpg/aventures/gaea1/scripts/hangarsas.js"></script>
							
				<?php else: ?>
					<audio src="/escaperpg/sons/gaea1/softalarm.mp3" autoplay></audio>

					<p>
						La discrète alerte vous sort de votre rêverie, alors que vous étiez en train de mâcher nonchalamment une barre de protéines.
					</p>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								Nous arrivons aux coordonnées spécifiées.<br><br>
								Nous nous trouvons actuellement aux abords d'une planète non répertoriée.
								Je détecte deux corps en orbite : une lune naturelle ainsi qu'un satellite artificiel. Construction d'apparence humaine, fabricant inconnu.
							</p>
						</div>
					</div>

					<p>
						Vous revenez dans la cabine de pilotage et observez ce qui semble être une station de taille moyenne, tournant lentement sur elle-même au-dessus d'une grande planète rocailleuse rouge.
						Vous ne saviez pas qu'il existait d'autres corps astraux que PA-99-N2 b dans cette galaxie et, manifestement, les personnes l'ayant découverte ont préféré taire cette information.
					</p>

					<div class="dialogue">
						<div class="bulleperso2">
							<p>
								Envoie-leur un message :
								<?= ($_SESSION['feminin'] ? 'commandante' : 'commandant').' '.htmlspecialchars($_SESSION['pjprenom']).' '.htmlspecialchars(strtoupper($_SESSION['pjnom'])) ?>, du Seeker,
								ayant intercepté votre appel de détresse. Quelle est la situation ?
							</p>
						</div>

						<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
					</div>

					<form action="sas" method="post">
						<input type="submit" name="suivant" value="suivant.">
					</form>

					<?php
						$_SESSION['indice1'] = false;
						$_SESSION['indice2'] = false;
						$_SESSION['indice3'] = false;
						$_SESSION['reponse'] = false;
					?>
				<?php endif; ?>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>