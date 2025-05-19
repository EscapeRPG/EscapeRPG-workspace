<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "d"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title><?php if ($_SESSION['hvisited']) { echo'Infirmerie'; } else { echo'Sykkerum'; } ?> - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<main>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if ($_SESSION['evisited']): ?>
					<?php if ((rand(0,100) <= 10) && !$_SESSION['eventb']): ?>
						<p>
							Alors que vous entrez dans l'infirmerie, vous entendez un choc sourd provenant de la porte au fond à gauche.<br>
							Malgré le manque d'air et votre combinaison qui atténue votre perception, vous êtes <?= $_SESSION['feminin'] ? 'sûre' : 'sûr' ?> de ce que vous avez entendu.
							Y a-t-il quelqu'un de vivant derrière ?<br>
							<br>
							Vous approchez de la porte et tentez de l'ouvrir mais rien ne se passe.
							Vous cognez dessus à l'aide de votre lampe pour amplifier le son et attendez quelques instants, sans obtenir de résultat.
							<?= $_SESSION['feminin'] ? 'Résignée' : 'Résigné' ?>, vous vous rendez à l'évidence : il ne doit vraisemblablement y avoir personne derrière.
							Peut-être était-ce un objet flottant en apesanteur qui a cogné contre la porte, ou tout simplement votre imagination ?
						</p>

						<div id="exploration" onmousemove="lampe()">
							<img src="/escaperpg/images/gaea1/station/infirmerie.png">
							<form action="sykkerum" method="post">
								<button type="submit" name="documents" id="documents"><img src="/escaperpg/images/gaea1/station/documents.png"></button>
							</form>
							<canvas id="canvasexplo"></canvas>
						</div>

						<p>
							Un chaos sans nom règne dans l'infirmerie, avec les lits défaits et sales, les documents répandus partout et les divers débris.
							Y a-t-il quoi que ce soit ici qui puisse se révéler utile ?
						</p>
						
						<script src="/escaperpg/aventures/gaea1/scripts/lampe.js"></script>

						<?php $_SESSION['eventb'] = true; ?>
						
					<?php else: ?>
						<div id="exploration" onmousemove="lampe()">
							<img src="/escaperpg/images/gaea1/station/infirmerie.png">
							<form action="sykkerum" method="post">
								<button type="submit" name="documents" id="documents"><img src="/escaperpg/images/gaea1/station/documents.png"></button>
							</form>
							<canvas id="canvasexplo"></canvas>
						</div>

						<p>
							Un chaos sans nom règne dans l'infirmerie, avec les lits défaits et sales, les documents répandus partout et les divers débris.
							Y a-t-il quoi que ce soit ici qui puisse se révéler utile ?
						</p>
						
						<script src="/escaperpg/aventures/gaea1/scripts/lampe.js"></script>
					<?php endif; ?>

				<?php elseif ($_SESSION['hvisited']): ?>
					<?php if (isset($_POST['documents'])): ?>
						<p>
							Vous attrapez quelques feuilles au hasard.<br>
							Principalement du texte, écrit dans cette langue que vous ne comprenez pas, et des schémas médicaux complexes dépassant vos connaissances en la matière.
							Vous les lâchez en soupirant.
						</p>

						<form action="sykkerum" method="post">
							<input type="submit" name="retour" value="retour.">
						</form>
								
					<?php elseif (isset($_POST['casierinfirmerie'])): ?>
						<p>
							Avisant un casier en métal, vous approchez et donnez un grand coup sur le cadenas qui le verrouillait, le faisant sauter.<br>
							À l'intérieur se trouvent quelques vêtements, une paire de lunettes ainsi qu'un petit portefeuille que vous ouvrez.
							En dehors d'éléments que vous estimez peu dignes d'intérêt, vous mettez la main sur un pass de sécurité.<br>
							<br>
							Sur la photo, vous voyez les traits d'une femme dans la quarantaine, blonde, vêtue d'un uniforme strict avec un écusson stylisé sur la poitrine.
							Probablement une administratrice de la station, ou une fonction équivalente. Le pass indique “SEKKURIT - A”.
							Nul besoin de traducteur pour comprendre que vous êtes maintenant en possession d'un pass de sécurité de niveau A, qui devrait vous ouvrir la plupart des accès.<br>
							<br>
							... Du moins, une fois que vous aurez rétabli le courant.
						</p>
						
						<form action="sykkerum" method="post">
							<input type="submit" name="prendre" value="le prendre.">
						</form>
						
					<?php elseif (isset($_POST['prendre'])): ?>
						<script src="/escaperpg/scripts/inventaireadd.js"></script>

						<p>
							Vous glissez précieusement le pass dans l'une des sacoches de votre combinaison.
						</p>
						
						<form action="sykkerum" method="post">
							<input type="submit" name="retour" value="retour.">
						</form>
						
						<?php $_SESSION['inventaire'][] = 'deckPass'; ?>
						
					<?php elseif ($_SESSION['dvisited']): ?>
						<?php if (rand(0,100) <= 10 && !$_SESSION['eventb']): ?>
							<p>
								Alors que vous entrez dans l'infirmerie, vous entendez un choc sourd provenant de la porte au fond à gauche.<br>
								Malgré le manque d'air et votre combinaison qui atténue votre perception, vous êtes <?= $_SESSION['feminin'] ? 'sûre' : 'sûr' ?> de ce que vous avez entendu.
								Y a-t-il quelqu'un de vivant derrière ?<br>
								<br>
								Vous approchez de la porte et tentez de l'ouvrir mais rien ne se passe.
								Vous cognez dessus à l'aide de votre lampe pour amplifier le son et attendez quelques instants, sans obtenir de résultat.
								<?= $_SESSION['feminin'] ? 'Résignée' : 'Résigné' ?>, vous vous rendez à l'évidence : il ne doit vraisemblablement y avoir personne derrière.
								Peut-être était-ce un objet flottant en apesanteur qui a cogné contre la porte, ou tout simplement votre imagination ?
							</p>

							<div id="exploration" onmousemove="lampe()">
								<img src="/escaperpg/images/gaea1/station/infirmerie.png">
								<form action="sykkerum" method="post">
									<button type="submit" name="documents" id="documents"><img src="/escaperpg/images/gaea1/station/documents.png"></button>

									<?php if (!in_array('deckPass', $_SESSION['inventaire'])): ?>
										<button type="submit" name="casierinfirmerie" id="casierinfirmerie"><img src="/escaperpg/images/gaea1/station/casierinfirmerie.png"></button>
									<?php endif; ?>
								</form>
								<canvas id="canvasexplo"></canvas>
							</div>

							<p>
								Un chaos sans nom règne dans l'infirmerie, avec les lits défaits et sales, les documents répandus partout et les divers débris.
								Y a-t-il quoi que ce soit ici qui puisse se révéler utile ?
							</p>

							<form action="komunodek" method="post">
								<input type="submit" name="komunodek" value="retourner inspecter la porte.">
							</form>
							
							<script src="/escaperpg/aventures/gaea1/scripts/lampe.js"></script>
							
							<?php $_SESSION['eventb'] = true; ?>
							
						<?php else: ?>
							<div id="exploration" onmousemove="lampe()">
								<img src="/escaperpg/images/gaea1/station/infirmerie.png">
								<form action="sykkerum" method="post">
									<button type="submit" name="documents" id="documents"><img src="/escaperpg/images/gaea1/station/documents.png"></button>
									
									<?php if (!in_array('deckPass', $_SESSION['inventaire'])): ?>
										<button type="submit" name="casierinfirmerie" id="casierinfirmerie"><img src="/escaperpg/images/gaea1/station/casierinfirmerie.png"></button>
									<?php endif; ?>
								</form>
								<canvas id="canvasexplo"></canvas>
							</div>

							<p>
								Un chaos sans nom règne dans l'infirmerie, avec les lits défaits et sales, les documents répandus partout et les divers débris.
								Y a-t-il quoi que ce soit ici qui puisse se révéler utile ?
							</p>

							<form action="komunodek" method="post">
								<input type="submit" name="komunodek" value="retourner inspecter la porte.">
							</form>

							<script src="/escaperpg/aventures/gaea1/scripts/lampe.js"></script>
						<?php endif; ?>
									
					<?php else: ?>
						<p>
							Utilisant une nouvelle fois la barre de fer, vous forcez l'ouverture afin de pouvoir vous faufiler à l'intérieur.<br>
							<br>
							Votre lampe révèle alors une série de lits médicaux, ainsi que des bureaux et de nombreux terminaux informatiques. Vous comprenez que vous êtes dans une infirmerie.<br>
							Les lits sont défaits et une substance étrange, brunâtre, semble avoir teinté la plupart des draps.<br>
							<br>
							De nombreux documents sont suspendus en apesanteur, parmi le matériel médical.
							Ils pourraient peut-être vous en apprendre plus sur l'état de la station, mais ils sont évidemment écrits dans la langue inconnue de GAEA-1.<br>
							<br>
							La porte au fond à gauche semble verrouillée et celle de droite attire votre attention.
						</p>
						
						<form action="komunodek" method="post">
							<input type="submit" name="observer" value="observer.">
						</form>
						
						<?php
							$_SESSION['oxygene'] -= 10;
							$_SESSION['dtested'] = true;
							$_SESSION['dvisited'] = true;
						?>
					<?php endif; ?>
						
				<?php else: ?>
					<p>
						Bien essayé, mais ça ne marchera pas comme ça !
					</p>

					<?php $_SESSION['plancurrent'] = null; ?>
				<?php endif; ?>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>
