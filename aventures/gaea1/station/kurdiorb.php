<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "n"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title><?php if ($_SESSION['poweron']) { echo'Couloir B'; } else { echo'Kurdior B'; } ?> - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if ($_SESSION['poweron']): ?>
					<p>
						Vous êtes dans le couloir B !
					</p>

					<?php $_SESSION['ntested'] = true; ?>
					<?php $_SESSION['nvisited'] = true; ?>
					
				<?php else: ?>
					<p>
						Vous arrivez devant une porte fermée. Tant que le réacteur de la station n'aura pas été relancé, vous ne pourrez pas passer par là.
					</p>
							
					<?php $_SESSION['ntested'] = true; ?>
					<?php $_SESSION['plancurrent'] = null; ?>
				<?php endif; ?>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>