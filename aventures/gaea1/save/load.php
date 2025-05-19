<?php session_start(); ini_set ("safe_mode" , "off"); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title>Charger - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<main>
			<div id="txt">
				<?php if ($_SESSION['loggedin']): ?>
					<div id="succespopup">
						<?php 
							$nouveausucces = '<img src="/escaperpg/images/succes/general/charger.png"><span><u><b>On reprend ?</b></u><br>Reprendre sa progression dans une aventure</span>';
							$scenario = 'general';
							$description = 'charger';
							$cache = 'non';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
						?>
					</div>
					
					<?php
						isset($_COOKIE['LOGGED_USER']) ? $nom = $_COOKIE['LOGGED_USER'] : $nom = htmlspecialchars($_SESSION['idcompte']);
						$query = $conn->prepare("SELECT * FROM gaea1 WHERE id=? ORDER BY id DESC LIMIT 1");
						$query->execute([$nom]);
						$result = $query->fetch();
					?>

					<?php if ($result): ?>
						<?php
							$sess = $result['sess'];
							$savepage = $result['savepage'];
							$session = session_decode($sess);
						?>

						<p>La partie a été chargée avec succès ! Rendez-vous sur <a href=<?= $savepage ?>>cette page</a> pour la reprendre !</p>

					<?php else: ?>
						<p>Il y a eu une erreur quelque part, veuillez contacter le support à <a href="mailto:escaperpg@escaperpg.com">escaperpg [ at ] escaperpg.com</a> pour retrouver votre sauvegarde.</p>
					<?php endif; ?>

				<?php elseif (isset($_POST['continuer'])): ?>
					<div id="succespopup">
						<?php
							$nouveausucces = '<img src="/escaperpg/images/succes/general/charger.png"><span><u><b>On reprend ?</b></u><br>Reprendre sa progression dans une aventure</span>';
							$scenario = 'general';
							$description = 'charger';
							$cache = 'non';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
						?>
					</div>

					<?php
						$nom = $_POST['nom'];
						$code = $_POST['code'];
						$query = $conn->prepare("SELECT * FROM gaea1 WHERE id=? AND code=?");
						$query->execute([$nom, $code]);
						$result = $query->fetch();
					?>

					<?php if ($result): ?>
						<?php
							$sess = $result['sess'];
							$savepage = $result['savepage'];
							$session = session_decode($sess);
						?>

						<p>La partie a été chargée avec succès ! Rendez-vous sur <a href=<?= $savepage ?>>cette page</a> pour la reprendre !</p>

					<?php else: ?>
						<p>Il y a eu une erreur quelque part, veuillez réessayer.</p>
						
						<form action="load" method="post">
							<input type="text" name="nom" id="nom" placeholder="Nom" required>
							<input type="text" name="code" id="code" placeholder="Code" required>
							<input type="submit" name="continuer" value="Charger.">
						</form>
					<?php endif; ?>

				<?php else: ?>
					<p>
						Veuillez entrer le nom et le code utilisés lors de votre dernière sauvegarde.
					</p>

					<form action="load" method="post">
						<input type="text" name="nom" id="nom" placeholder="Nom" required>
						<input type="text" name="code" id="code" placeholder="Code" required>
						<input type="submit" name="continuer" value="Charger.">
					</form>
				<?php endif; ?>
			</div>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
	</body>
</html>
