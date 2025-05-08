<?php
	$dossier = "/home/escaped/sessions/";
	ini_set('session.save_path', $dossier);
	ini_set('session.gc_probability', 1);
	ini_set('session.gc_maxlifetime', 24*3600);
	session_set_cookie_params(24*3600);
	session_start();
	ini_set ("safe_mode" , "off");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/stylegaea.css">
		<meta charset="utf-8">
		<title>Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<div id="bloc_page">
			<p>
				Oups, il semblerait que vous ayez entré une mauvaise adresse !<br>
				<br>
				Cliquez <a href=<?= $_SESSION['page'] ?>>ici</a> pour revenir à l'étape précédente.
			</p>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>