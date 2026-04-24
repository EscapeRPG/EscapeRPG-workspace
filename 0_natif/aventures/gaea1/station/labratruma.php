<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "b"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title><?php if ($_SESSION['avisited'] OR $_SESSION['cvisited'] OR $_SESSION['gvisited']) { echo'Laboratoire A'; } else { echo'Labratrum A'; } ?> - Station GAEA-1</title>
	</head>

	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<main>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if ($_SESSION['avisited'] OR $_SESSION['cvisited'] OR $_SESSION['gvisited']): ?>
					<p>
						Vous êtes dans le laboratoire A !
					</p>
							
					<?php $_SESSION['bsalletested'] = true; ?>
					<?php $_SESSION['bsallevisited'] = true; ?>
					
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
