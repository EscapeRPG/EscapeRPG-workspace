<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['plancurrent'] = "j"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/stylegaea.css">
		<meta charset="utf-8">
		<title><?php if ($_SESSION['kvisited']) { echo'Legerrum'; } else { echo'Entrepôt'; } ?>- Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<?php if ($_SESSION['kvisited']): ?>
					<?php if (in_array('energyCells', $_SESSION['inventaire'])): ?>
						<p>
							L'entrepôt est toujours aussi lugubre, la seule source de lumière étant votre lampe torche qui projette les ombres des étagères dans tous les sens,
							vous faisant parfois sursauter en croyant percevoir un mouvement, avant de vous rendre compte que ce n'était que l'ombre.
							Cette pièce vous met mal à l'aise et vous ne souhaitez pas traîner ici.
						</p>
								
					<?php elseif (isset ($_POST['prendre'])): ?>
						<script src="/escaperpg/scripts/inventaireadd.js"></script>

						<p>
							Avec ces cellules, vous devriez être en mesure de réalimenter le panneau menant au pont de commandement.
						</p>

						<form action="legerrum" method="post">
							<input type="submit" name="retour" value="retour.">
						</form>
						
						<?php $_SESSION['inventaire'][] = 'energyCells'; ?>
						<?php $_SESSION['oxygene'] -= 10; ?>
						
					<?php elseif ($_SESSION['dvisited']): ?>
						<p>
							Entrant dans la vaste salle, vous éclairez autour de vous des rayonnages d'équipements divers et variés.
							Vous avancez tout en fouillant rapidement les cartons de vis, de plaques métalliques et autres câbles avant de tomber sur ce que vous cherchiez :
							dans une mallette en métal assez épaisse se trouvent deux cellules énergétiques. Vous refermez la mallette et la tirez hors de l'étagère.
						</p>

						<form action="legerrum" method="post">
							<input type="submit" name="prendre" value="la prendre.">
						</form>
							
						<?php $_SESSION['jtested'] = true; ?>
						<?php $_SESSION['jvisited'] = true; ?>
						
					<?php else: ?>
						<?php if ($_SESSION['jvisited']): ?>
							<p>
								L'entrepôt est toujours aussi lugubre, la seule source de lumière étant votre lampe torche qui projette les ombres des étagères dans tous les sens,
								vous faisant parfois sursauter en croyant percevoir un mouvement, avant de vous rendre compte que ce n'était que l'ombre.
								Cette pièce vous met mal à l'aise et vous ne souhaitez pas traîner ici.
							</p>
									
						<?php else: ?>
							<p>
								Vous entrez dans une vaste pièce ressemblant à un entrepôt.
								Avec ce que vous avez à bord du SEEKER, vous pensez ne pas avoir besoin de ce qui est gardé ici mais, au cas où,
								vous notez que cette salle peut renfermer à peu près tout le matériel dont vous pourriez avoir l'utilité.<br>
								<br>
								Il est temps de reprendre votre exploration de la station.
							</p>
							
							<?php $_SESSION['jtested'] = true; ?>
							<?php $_SESSION['jvisited'] = true; ?>
						<?php endif; ?>
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

		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>