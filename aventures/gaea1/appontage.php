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
		<title>La Station - Station GAEA-1</title>
	</head>

	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<main>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if (isset($_POST['apponter']) OR $_SESSION['appontage']): ?>
					<?php $_SESSION['appontage'] = true; ?>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>
						
						<div id="bullemarv">
							<p id="bulleappontage">
								Parfait <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?> nous pouvons procéder à la manœuvre.
								Utilisez la manette jaune pour amorcer la descente, je vous préviendrai en cas de problème.
							</p>
							<p id="compteur">
								Il reste actuellement <span id="valdist">10</span> mètres à parcourir pour atteindre le sol.
							</p>
						</div>
					</div>

					<div id="canvas-wrap">
						<img src="/escaperpg/images/gaea1/appontage/cockpit.png">
						<div id="appontagehangar"><img src="/escaperpg/images/gaea1/appontage/hangar.png" id="hangar"></div>
						<div id="lumieres"><img src="/escaperpg/images/gaea1/hangarsas/lumieres.png"></div>
						<div id="canvascockpit"><img src="/escaperpg/images/gaea1/appontage/cockpit.png" id="cockpit"></div>
						<div id="thrusters" onmousedown="descente()"></div>
						<div id="propulseurs" class="eventsoff" onclick="propulseurs()"><img src="/escaperpg/images/gaea1/appontage/propulseurson.png" id="propulimg"></div>
						<div id="assiette"><img src="/escaperpg/images/gaea1/appontage/assiettenormale.png" id="assietteimg"></div>
						<div id="joystick_gauche" class="hidden" onclick="reglerassietteg()"><img src="/escaperpg/images/gaea1/appontage/assiettegauche.png" id="assiettegauche"></div>
						<div id="joystick_droite" class="hidden" onclick="reglerassietted()"><img src="/escaperpg/images/gaea1/appontage/assiettedroite.png" id="assiettedroite"></div>
						<div id="trainsatterrissage" class="hidden" onclick="trainsatt()"><img src="/escaperpg/images/gaea1/appontage/trainsatt.png"></div>
						<div id="canvascollision">
							<div id="croixgrisediv"><img src="/escaperpg/images/gaea1/appontage/croixgrise.png" id="croixgrise"></div>
							<div id="croixrougediv"><img src="/escaperpg/images/gaea1/appontage/croixrouge.png" id="croixrouge" class="hidden"></div>
							<div id="croixrouge2div"><img src="/escaperpg/images/gaea1/appontage/croixrouge.png" id="croixrouge2" class="hidden"></div>
							<div id="croixvertediv"><img src="/escaperpg/images/gaea1/appontage/croixverte.png" id="croixverte" class="hidden"></div>
						</div>

						<div id="controlscoll" class="eventsoff">
							<div id="hautdiv" onclick="collhaut()"><img src="/escaperpg/images/gaea1/appontage/haut.png" id="haut"></div>
							<div id="droitediv" onclick="colldroite()"><img src="/escaperpg/images/gaea1/appontage/droite.png" id="droite"></div>
							<div id="basdiv" onclick="collbas()"><img src="/escaperpg/images/gaea1/appontage/bas.png" id="bas"></div>
							<div id="gauchediv" onclick="collgauche()"><img src="/escaperpg/images/gaea1/appontage/gauche.png" id="gauche"></div>
						</div>

						<div id="controls2coll" class="hidden">
							<div id="haut2div" onclick="collhaut2()"><img src="/escaperpg/images/gaea1/appontage/haut.png" id="haut2"></div>
							<div id="droite2div" onclick="colldroite2()"><img src="/escaperpg/images/gaea1/appontage/droite.png" id="droite2"></div>
							<div id="bas2div" onclick="collbas2()"><img src="/escaperpg/images/gaea1/appontage/bas.png" id="bas2"></div>
							<div id="gauche2div" onclick="collgauche2()"><img src="/escaperpg/images/gaea1/appontage/gauche.png" id="gauche2"></div>
						</div>

						<div id="collactif" class="hidden"><img src="/escaperpg/images/gaea1/appontage/collactif.png"></div>
						<div id="manche"><img src="/escaperpg/images/gaea1/appontage/manche.png"></div>
						<div id="moteursbtn" class="hidden" onclick="moteursstop()"><img src="/escaperpg/images/gaea1/appontage/moteurs.png"></div>
					</div>
					<script src="/escaperpg/aventures/gaea1/scripts/appontage.js"></script>
					
					<?php
						$reponse = "Vous n'arrivez pas à vous poser ? Dans ce cas, cliquez <a href=\"station/hangar\" style=\"color: lightskyblue\">ici</a> pour passer à la suite.";
						$indice1 = "Essayez de faire descendre le Seeker à 0 mètre pour vous poser.";
						$indice2 = "Restez bien " . ($_SESSION['feminin'] ? 'appuyée' : 'appuyé') . " sur la manette jaune pour descendre automatiquement.
							En cas de souci, <i>M.A.R-V</i> interrompra automatiquement la descente.";
						$indice3 = "Si vous êtes " . ($_SESSION['feminin'] ? 'perdue' : 'perdu') . ", vérifiez les indications de votre ordinateur de bord, au-dessus. Elles vous seront utiles.";

						include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/indices.php";
					?>

				<?php else: ?>
					<p>
						L'intérieur du hangar est plongé dans les ténèbres.<br>
						Vous balayez l'espace avec les phares du vaisseau et constatez que l'endroit est dans un piteux état :
						de nombreux débris et machines de maintenance jonchent le sol, le rendant peu praticable.
					</p>

					<div class="dialogue">
						<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

						<div id="bullemarv">
							<p>
								L'énergie de la station semble coupée, l'appontage assisté est impossible. Passage en mode manuel.
							</p>
						</div>
					</div>

					<p>
						Vous installant bien au fond de votre fauteuil, vous prenez les manettes pour procéder à la manœuvre.
					</p>

					<form action="appontage" method="post">
						<input type="submit" name="apponter" value="apponter.">
					</form>
				<?php endif; ?>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>
