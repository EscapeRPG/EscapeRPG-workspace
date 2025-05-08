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
		<title>Introduction - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php if (isset ($_POST['commencer']) || $_SESSION['cineintro']): ?>
			<?php
				include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php";
				$_SESSION['cineintro'] = true;
			?>

			<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

			<div id="bloc_page">
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

				<div id="txt">
					<?php if (isset($_POST['suivant'])): ?>
						<audio src="/escaperpg/sons/gaea1/eveil.mp3" autoplay></audio>

						<p>
							Vous ouvrez péniblement les yeux, <?= $_SESSION['feminin'] ? 'réveillée' : 'réveillé' ?> de force par le vaisseau.
							<?= $_SESSION['feminin'] ? 'Nauséeuse' : 'Nauséeux' ?>, vous mettez de longues secondes à sortir de l'état de stase,
							le liquide censé réchauffer votre corps parcourant lentement vos veines.<br><br>
							Vous faites un premier pas, hésitant, hors du caisson, vos yeux se réhabituant peu à peu à la faible lumière de l'habitacle.<br>
							Vous entendez alors les bips caractéristiques indiquant la détection d'une anomalie proche.<br><br>
							Tout en reprenant vos forces, vous faites les quelques pas qui vous séparent du tableau de bord afin de consulter le terminal.
						</p>

						<form action="signal" method="post">
							<input type="submit" name="suivant" value="suivant.">
						</form>
					<?php else: ?>
						<p>
							Depuis trois semaines, vous êtes en transit à bord du Seeker, transportant une cargaison de minerais précieux récoltés dans un champ d'astéroïdes aux abords de PA-99-N2 b.
							Sa revente vous aidera à payer les équipements nécessaires au vaisseau pour vous permettre de partir dans le secteur inexploré et dangereux M31.<br>
							<br>
							Le voyage se passe sans encombre depuis votre départ,
							l'ordinateur de bord étant suffisamment performant pour éviter tout obstacle néfaste tandis que vous dormez dans votre caisson cryogénique.
						</p>

						<form action="andromede" method="post">
							<input type="submit" name="suivant" value="suivant.">
						</form>
					<?php endif; ?>
				</div>
			</div>

			<div id="load"><div id="loader"></div></div>

			<script src="/escaperpg/scripts/aventures-chargement.js"></script>

			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>

		<?php else: ?>
			<div id="intro-wrap">
				<div id="fondintro">
					<img src="/escaperpg/images/gaea1/etoiles.png">
					<div id="vaisseauintro">
						<img src="/escaperpg/images/gaea1/vaisseau.png">
						<div id="reacteur1"></div>
						<div id="reacteur2"></div>
						<div id="reacteur3"></div>
						<div id="reacteur4"></div>
						<div id="reacteur5"></div>
					</div>
				</div>

				<div id="fondunoir"></div>

				<div id="fondintro2">
					<img src="/escaperpg/images/gaea1/etoiles2.png">
					<img src="/escaperpg/images/gaea1/etoiles3.png" id="etoilespan">
					<img src="/escaperpg/images/gaea1/etoiles3.png" id="etoilespan2">
					<div id="etoile"></div>
					<div id="etoile2"></div>
					<div id="etoile3"></div>
					<div id="etoile4"></div>
					<div id="etoile5"></div>
					<div id="etoile6"></div>
					<div id="etoile7"></div>
					<div id="etoile8"></div>
					<div id="etoile10"></div>
					<div id="vaisseauintro2">
						<div id="reacteur6"></div>
						<img src="/escaperpg/images/gaea1/vaisseau2.png">
					</div>
					<div id="etoile9"></div>
				</div>

				<div id="fondunoir2"></div>

				<div id="textintro1">
					<div class="type1">Quelque part aux confins de la galaxie d'Andromède.</div>
					<div class="type2">Secteur P1-CMF-86.</div><br>
					<div class="type3">Année 1 058 depuis l'Exode.</div>
				</div>

				<div id="textintro2">
					<div class="type4"><i>SEEKER</i>, vaisseau d'exploration.</div>
					<div class="type5">Provenance : Planète PA-99-N2 b.</div>
					<div class="type6">Destination : Station Kamari, secteur P1-AZ-0340.</div>
					<div class="type7">Équipage : 1, <?= htmlspecialchars(ucwords($_SESSION['pjprenom'])).' '.htmlspecialchars(strtoupper($_SESSION['pjnom'])) ?>.</div>
				</div>

				<div id="introtitre"></div>

				<form action="andromede" method="post">
					<input type="submit" name="commencer" id="introinput" value="suivant.">
				</form>
			</div>

			<div id="loadintro"><div id="loader"></div></div>

			<script src="/escaperpg/aventures/gaea1/scripts/chargementintro.js"></script>
		<?php endif; ?>
	</body>
</html>