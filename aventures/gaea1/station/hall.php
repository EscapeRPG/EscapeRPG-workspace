<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "l"; $_SESSION['lvisited'] = true; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title>Hall Principal - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<p>
					Vous revenez dans l'immense hall.<br>
					<br>
					L'ambiance qui règne dans cette pièce vous met définitivement mal à l'aise, avec tout cet espace comme figé dans le temps, vide et mort.
					Vous prenez quelques minutes pour déambuler et fouiller l'endroit, mais vous laissez rapidement tomber votre inspection, ne trouvant rien qui vous semble utile.
				</p>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>