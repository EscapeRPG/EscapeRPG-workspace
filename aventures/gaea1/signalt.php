<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
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

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if (isset ($_POST['valider'])): ?>
					<?php if ($_POST['onde'] == 0 AND $_POST['amplitude'] == 0): ?>
						<div id="succespopup">
							<?php
								$nouveausucces = '<img src="/escaperpg/images/succes/gaea1/signal.png"><span><u><b>Expert·e en communications</b></u><br>Intercepter et nettoyer le signal de détresse</span>';
								$scenario = 'gaea1';
								$description = 'signal';
								$cache = 'non';
								$rarete = 'succesbronze';
								include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							?>
						</div>

						<p>
							Une voix retentit dans l'habitacle, parlant dans une langue que vous ne comprenez pas.<br>
							<br>
							Le message est court et vous percevez une pointe d'angoisse dans la voix de l'interlocuteur.
						</p>

						<div class="dialogue">
							<div class="bulleperso2">
								<p>
									Qu'est-ce que ça raconte ? Lance la traduction.
								</p>
							</div>

							<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
						</div>

						<div class="dialogue">
							<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

							<div id="bullemarv">
								<p>
									Impossible, la langue est inconnue et je dispose de trop peu d'éléments exploitables pour établir un traducteur.
								</p>
							</div>
						</div>

						<p>
							Tout en faisant claquer vos mains sur les accoudoirs de votre fauteuil, vous vous y renfoncez lourdement en poussant un soupir d'exaspération.
						</p>

						<div class="dialogue">
							<div class="bulleperso2">
								<p>
									Parfait, c'est bien ma veine !
								</p>
							</div>

							<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
						</div>

						<div class="dialogue">
							<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

							<div id="bullemarv">
								<p>
									Mon logiciel d'analyse empathique indique que la personne qui a émis le message était en détresse. Les lois spatiales du Comité...
								</p>
							</div>
						</div>

						<div class="dialogue">
							<div class="bulleperso2">
								<p>
									Je sais, je sais ! Pfff...<br/>
									<br>
									Corrige la trajectoire. Mets le cap dans la direction du signal, on va voir ce qu'il se passe.
								</p>
							</div>
							
							<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
						</div>

						<div class="dialogue">
							<div id="marv"><img src="/escaperpg/images/gaea1/marv.png" alt="dialogue marv"></div>

							<div id="bullemarv">
								<p>
									Bien reçu, <?= $_SESSION['feminin'] ? 'commandante' : 'commandant' ?>. Mise à jour des coordonnées de destination. Activation des propulseurs.<br>
									<br>
									Arrivée prévue dans 5 heures, 48 minutes, 12 secondes.
								</p>
							</div>
						</div>

						<div class="dialogue">
							<div class="bulleperso2">
								<p>
									Parfait, préviens-moi quand on arrive.
								</p>
							</div>
							
							<div class="portrait2"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?= $_SESSION['avatar'] ?></div>
						</div>

						<p>
							Sans plus attendre, vous vous levez du siège de commandement et partez à l'arrière de la cabine, en direction de la petite cuisine. Un grand café vous fera le plus grand bien.
						</p>

						<form action="sas" method="post">
							<input type="submit" name="attendre" value="patienter jusqu'à l'arrivée.">
						</form>

					<?php else: ?>
						<p>Votre traitement ne semble pas suffisant.</p>

						<form action="signalt" method="post">
							<input type="submit" name="traiter" value="réessayer.">
						</form>
					<?php endif; ?>

				<?php elseif (isset($_POST['traiter']) OR $_SESSION['traitement']): ?>
					<?php $_SESSION['traitement'] = true; ?>
					
					<div id="ecransignal">
						<img src="/escaperpg/images/gaea1/traitement/ecransignal.png">
						<img src="/escaperpg/images/gaea1/traitement/signal.png" id="signal">
						<img src="/escaperpg/images/gaea1/traitement/signaloverlay.png" id="canvasoverlay">

						<div id="controlsonde">
							<button id="haut" onclick="pitchup()"><img src="/escaperpg/images/gaea1/traitement/haut.png" id="hautimg"></button>
							<button id="droite" onclick="fast()"><img src="/escaperpg/images/gaea1/traitement/droite.png" id="droiteimg"></button>
							<button id="bas" onclick="pitchdown()"><img src="/escaperpg/images/gaea1/traitement/bas.png" id="basimg"></button>
							<button id="gauche" onclick="slow()"><img src="/escaperpg/images/gaea1/traitement/gauche.png" id="gaucheimg"></button>
						</div>
					</div>

					<table id="onde">
						<tr>
							<td style="width: 50%">Longueur d'onde</td>
							<td style="width: 50%">Amplitude</td>
						</tr>

						<tr>
							<td><span id="ondetext">0</span></td>
							<td><span id="amplitudetext">0</span></td>
						</tr>
					</table>

					<p>
						Le signal semble encore avoir besoin d'être nettoyé pour éliminer les parasites.<br>
						Vous vous placez devant le module radio et commencez le traitement.
					</p>

					<form action="signalt" method="post">
						<input type="number" name="onde" id="inputspeed" value="6" class="hidden">
						<input type="number" name="amplitude" id="inputpitch" value="-3" class="hidden">
						<input type="submit" name="valider" value="valider.">
					</form>

					<script src="/escaperpg/aventures/gaea1/scripts/traitement.js"></script>
					
					<?php 
						$reponse = "Réglez la longueur d'onde à -6 et l'amplitude à 3.";
						$indice1 = "Tâchez de faire correspondre les courbes grâce aux commandes affichées.";
						$indice2 = "Réglez d'abord l'amplitude, ce sera plus simple pour trouver la bonne longueur d'onde par la suite.";
						$indice3 = "Il faut augmenter l'amplitude et de réduire la longueur d'onde.";

						include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/indices.php";
					?>

				<?php else: ?>
					<p>
						Vous pointez l'antenne en direction de la source du signal et commencez à récupérer des données.<br><br>
						Bientôt, vous commencez à entendre un son.
					</p>

					<form action="signalt" method="post">
						<input type="submit" name="traiter" value="traiter le signal.">
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