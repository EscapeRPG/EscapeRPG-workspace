<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/stylesAmbria.php"; ?>
		<meta charset="utf-8">
		<title>Les Grottes - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
		<main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
			<div id="txt">
				<audio src="/escaperpg/sons/ambria/grotte.mp3" autoplay></audio>
				<div class="enigmelieu">
					<img src="/escaperpg/images/ambria/grottestorcheseteintes.png" alt="grotte">
				</div>
				<p>
					Désirant profiter pleinement du spectacle offert par la mousse, vous donnez l'ordre d'éteindre les torches.<br>
					S'exécutant, ils ne peuvent retenir un son admiratif devant la beauté féerique du tableau qui s'offre alors.<br>
					<br>
					Éclairant la pièce d'une douce lueur vert-bleu, la mousse révèle un tout nouveau paysage dans cette obscurité, s'étendant des parois jusqu'au plafond dans un enchevêtrement compliqué.
				</p>

				<?php
				$reponse = "Discutez avec l'autre joueur pour constituer l'alphabet qui vous permettra de traduire le message sur les portes de la cité.";
				$indice1 = "Observez bien les motifs tracés par la mousse. Ne vous rappellent-ils par quelque chose ?";
				$indice2 = "Il s'agit d'une partie de la traduction du langage ambrien.";
				$indice3 = "Logan aura peut-être accès à la seconde partie ?";
				include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
				$_SESSION['torcheseteintes'] = true;
				?>
			</div>
		</main>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
