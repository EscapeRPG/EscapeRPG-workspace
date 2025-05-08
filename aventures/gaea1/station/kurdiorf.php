<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "h"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/stylegaea.css">
		<meta charset="utf-8">
		<title>Couloir F - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if ($_SESSION['hvisited']): ?>
					<p>
						Vous passez de nouveau par le couloir F.<br>
						Après un rapide tour d'horizon, vous comprenez que les seules salles où vous pouvez vous rendre sont le couloir A,
						le hall principal et <?= $_SESSION['dvisited'] ? 'l\'infirmerie' : 'sykkerum' ?>, les autres portes étant toujours verrouillées par le manque d'énergie.
					</p>
							
				<?php else: ?>
					<p>
						La porte ouverte donne directement sur un immense couloir. Levant votre lampe, vous balayez les lieux de droite à gauche.
						Manifestement, aucun signe de vie ni de corps, vous ne savez toujours pas quoi en penser.
						Vous faites quelques pas dans un silence de mort, seulement brisé par le bruit de votre respiration dans votre casque.<br>
						Si le courant était rétabli et les systèmes de recyclage d'air de nouveau fonctionnels, le son pourrait de nouveau se propager et vos pas résonneraient probablement en écho,
						seul bruit perceptible de ce lieu...<br>
						À la réflexion, vous ne savez pas quelle option vous semble meilleure.<br>
						<br>
						Un peu plus loin au Nord, le couloir se divise en deux. Sur la droite, une porte fermée indique “Kurdior H”, un nouveau couloir, donc, si vous en croyez ce que vous avez vu jusqu'ici.
						Sur la gauche, il se prolonge avant de tourner, desservant deux portes : “Kurdior D”, dont la porte est fermée, et “Sykkerum”, qui semble entrouverte.
						En direction du Sud, vous apercevez deux autres portes, dont l'une ramène sur le couloir A.
					</p>
					
					<?php $_SESSION['oxygene'] -= 10; ?>
					<?php $_SESSION['htested'] = true; ?>
					<?php $_SESSION['hvisited'] = true; ?>
				<?php endif; ?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>