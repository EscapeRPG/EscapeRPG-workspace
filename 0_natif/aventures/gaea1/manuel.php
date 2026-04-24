<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title>Manuel - Station GAEA-1</title>
	</head>

	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<main>
			<nav>
				<?php if (!empty($_SESSION['pjnom'])): ?>
					<div id="namenav">
						<?= $_SESSION['genre'] ? ($_SESSION['feminin'] ? 'Commandante' : 'Commandant') : '' ?>
						<?= htmlspecialchars(ucfirst($_SESSION['pjprenom']) . ' ' . strtoupper($_SESSION['pjnom'])) ?>
					</div>
				<?php endif; ?>

				<div id="avatarnav-wrap">
					<img src="/escaperpg/images/gaea1/avatar/fond.png">
					<div id="avatarnav">
						<?= $_SESSION['avatar'] ?>
						<?php if ($_SESSION['combinaison']): ?>
							<img src="/escaperpg/images/gaea1/avatar/<?= $_SESSION['feminin'] ? 'combinaisonfemme' : 'combinaisonhomme' ?>.png">
						<?php endif; ?>
					</div>
				</div>

				<?php if ($_SESSION['combinaison']): ?>
					<div id="namenav">
						<h1>État de la combinaison :</h1>
						- Intégrité : <span class="systemes">100%</span>.<br>
						- Oxygène : 
						<span class="<?= ($_SESSION['oxygene'] > 50) ? 'systemes' : (($_SESSION['oxygene'] > 20) ? 'systemesdemi' : 'important') ?>">
							<?= $_SESSION['oxygene'] ?>%
						</span>.<br>
						- Sous-systèmes : <span class="systemes">OK</span>.
					</div>
				<?php endif; ?>
			</nav>

			<div id="txt">
				<div id="manuel-wrap">
					<button id="precedent" onclick="precedent()"><img src="/escaperpg/images/gaea1/gauche.png" id="btnPrev"></button>

					<div id="manuel">
						<div class="manuel-decoration"></div>
						<div class="manuel-decoration-inset"></div>
						<div id="page"></div>
					</div>

					<button id="suivant" onclick="suivant()"><img src="/escaperpg/images/gaea1/droite.png" id="btnNext"></button>
				</div>

				<input type="submit" onclick="window.close()" value="RETOUR">
				
				<script src="/escaperpg/aventures/gaea1/scripts/manuel.js"></script>
			</div>
		</div>
		
		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
	</body>
</html>
