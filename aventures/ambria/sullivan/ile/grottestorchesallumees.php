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
				<?php if (isset($_SESSION['portescite'])): ?>
					<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
					<div class="enigmelieu">
						<img src="/escaperpg/images/ambria/grottestorchesallumees.png" alt="grotte torches allumées">
					</div>
					<p>
						Vous revenez dans l'antichambre où pousse l'étonnante mousse bioluminescente.
						Avec vos torches, vous essayer de l'observer de près et constatez que certains endroits semblent luire plus fortement,
						mais la lumière que vous émettez est trop puissante pour vraiment distinguer quoi que ce soit.<br>
						<br>
						Cette mousse pourrait-elle vous apporter quelque chose ?
					</p>

					<?php
					$reponse = `
						Remplacez l'adresse actuelle pour vous rendre sur <a href="grottestorcheseteintes.php">grottestorcheseteintes</a>
						et poursuivre votre aventure.`;
					$indice1 = "Cette mousse n'est réellement bioluminescente que si la pièce est plongée dans le noir.";
					$indice2 = "Essayez de trouver un moyen d'éteindre vos torches.";
					$indice3 = "N'oubliez pas qu'il faut bien observer tous les éléments de cette page pour trouver la solution.";
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
					?>
				<?php elseif (isset($_POST['lueur']) ||isset($_SESSION['grottes'])): ?>
					<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
					<div class="enigmelieu">
						<img src="/escaperpg/images/ambria/grottestorchesallumees.png" alt="grotte torches allumées">
					</div>
					<p>
						Alors que vous avancez, vous voyez que la lueur semble provenir d'une sorte d'antichambre un peu plus vaste.<br>
						En y débouchant, vous découvrez que les murs sont tapissés d'une mousse verdâtre bioluminescente.
						Vous prenez quelques instants pour admirer cette fascinante étrangeté naturelle,
						évoquant le phénomène que certains marins aperçoivent parfois en mer lorsqu'un certain type de plancton abonde.<br>
						<br>
						N'étant cependant pas venu pour contempler le paysage, vous reprenez rapidement la route.
					</p>
					<form action="portescite" method="post">
						<input type="submit" name="sortiegrottes" value="Chercher la sortie.">
					</form>
					<?php $_SESSION['grottes'] = true; ?>
				<?php else: ?>
					<audio src="/escaperpg/sons/ambria/grottetorche.mp3" autoplay></audio>
					<p>
						Vous avancez dans les grottes obscures, uniquement éclairé par les flammes des torches.<br>
						Les hommes sont silencieux et seuls les bruits de vos pas se font entendre, se répercutant en échos vers les profondeurs.<br>
						<br>
						Alors que vous marchez ainsi depuis un long moment, vous remarquez une sorte de lueur, droit devant vous.
					</p>
					<form action="grottestorchesallumees" method="post">
						<input type="submit" name="lueur" value="Suivant.">
					</form>
				<?php endif; ?>
			</div>
		</main>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
