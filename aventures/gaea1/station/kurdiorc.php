<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "k"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title>Couloir C - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if ($_SESSION['ovisited']): ?>
					<p>
						Vous repassez par le couloir C, où rien ne semble avoir changé.
						Quelques casiers sont alignés contre les murs de part et d'autre.<br>
						À l'intérieur, quelques vêtements de travail, un carnet de notes vierge, un chalumeau, une caisse d'outils, ...
						A priori, rien qui ne vous aide à accéder au pont de commandement.
					</p>
							
				<?php else: ?>
					<p>
						Sortant du hall, vous arrivez dans un couloir par le milieu.<br>
						<br>
						Juste devant vous, à l'Ouest, se trouve une porte laissée grande ouverte, semblant donner sur une grande salle avec beaucoup de matériel.
						Le couloir continue au Nord et au Sud, se terminant sur des portes visiblement fermées.
					</p>
						
					<?php $_SESSION['oxygene'] -= 10; ?>
					<?php $_SESSION['ktested'] = true; ?>
					<?php $_SESSION['kvisited'] = true; ?>
				<?php endif; ?>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>