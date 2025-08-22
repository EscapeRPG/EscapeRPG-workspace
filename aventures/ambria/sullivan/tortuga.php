<?php
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php";
$_SESSION['tortuga'] = true;
?>
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
	<title>L'Île de la Tortue - Le Trésor d'Ambria</title>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
	<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
	<main>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
		<div id="txt">
			<audio src="/escaperpg/sons/ambria/accoste.mp3" autoplay></audio>
			<p>
				Vous êtes arrivé sur l'Île de la Tortue, cependant votre contact n'a su vous dire qui possédait la carte que vous cherchez.<br>
				<br>
				Vous devriez faire un tour pour en apprendre un peu plus, peut-être pourriez vous obtenir des informations au <span class="lieu">bordel</span>,
				sur les <span class="lieu">docks</span>, au <span class="lieu">marché</span> ou encore à la <span class="lieu">taverne</span> ?
			</p>
		</div>
		</div>
		<div id="load">
			<div id="loader"></div>
		</div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
</body>

</html>
