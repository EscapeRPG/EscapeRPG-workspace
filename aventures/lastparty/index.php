<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		
		<!-- [if lt IE 9]>
		<script src="http://html5shiv.googlecode.code/svn/trunk/html5.js"></scipt>
		<![endif]-->
	   
		<link rel="stylesheet" href="/escaperpg/aventures/lastparty/css/style.css">
		<meta charset="utf-8">
		<title>Introduction - Last Party</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png"></div>
		<div id="bloc_page">
			<nav>
				<img src="/escaperpg/images/lastparty/jonathan.png">
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/lastparty/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['new']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/general/debut.png"><span><u><b>Se lancer dans l\'aventure</b></u><br>Commencer une aventure pour la première fois</span>';
							$scenario = 'general';
							$description = 'début';
							$cache = 'non';
							$rarete = 'succesnormal';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							$nouveausucces = '<img src="/escaperpg/images/succes/lastparty/debut.png"><span><u><b>Réveil difficile</b></u><br>Lancer l\'aventure pour la première fois</span>';
							$scenario = 'lastparty';
							$description = 'début';
							$cache = 'non';
							$rarete = 'succesnormal';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/sessioninc.php";
							echo '
								<p>
									Vous êtes Jonathan Le Tellier, un jeune homme de 23 ans.
									Hier soir, vous avez participé à une fête organisée par l\'une de vos amies où vous vous êtes bien amusé.<br>
									Du moins, c\'est ce que vous pensez...<br>
									<br>
									Est-ce vraiment bien le cas ?<br>
									<br>
									Vos souvenirs sont flous, vous n\'arrivez pas à vous remémorer ce que vous avez fait là-bas. Auriez-vous bu un peu trop d\'alcool ?
								</p>
								<center>
									<form action="eveil.php" method="post">
										<input type="submit" name="entrer" value="BIP BIP BIP !">
									</form>
								</center>
							';
						}
					else
						{
							echo'
								<center>
									<div id="dialoguenarrateur">
										<div class="portrait">
											<img src="/escaperpg/images/narrateur.png" alt="narrateur">
										</div>
										<div class="bulleperso">
											<p>
												Vous désirez jouer à ce scénario avec une musique appropriée ?<br>
												Je vous conseille de vous rendre sur <a href="https://www.youtube.com/watch?v=zhxjTlN9o_w&list=PLggiqSd087TR2aMa8fw-ucSIqcZMX5EXI&index=1" target="_blank" rel="noreferrer">ce lien</a> pour plus d\'immersion !<br>
												<br>
												Bonne aventure à vous !
											</p>
										</div>
									</div>
									<br>
									<form action="index.php" method="post">
										<input type="submit" name="new" value="NOUVELLE PARTIE.">
									</form>
									<br>
									<form action="save/load.php" method="post">
										<input type="submit" name="load" value="CHARGER UNE PARTIE.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
	</body>
</html>