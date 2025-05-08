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
		<title>Couloir d'entrée - Last Party</title>
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
					if (isset($_POST['indice']))
						{
							echo '
								<p>
									Une carte de visite, appartenant à un certain Darren Braun. De qui peut-il bien s\'agir ?<br>
									La carte ne contient que très peu d\'informations...<br>
									<br>
									<div class="indice">
										L\'une des informations présente sur la carte devrait vous aider à avancer.
									</div>
								</p>
								<center>
									<form action="couloir.php" method="post">
										<button type="submit" name="indice2" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['indice2']))
						{
							echo '
								<p>
									Une carte de visite, appartenant à un certain Darren Braun. De qui peut-il bien s\'agir ?<br>
									La carte ne contient que très peu d\'informations...<br>
									<br>
									<div class="indice">
										L\'une des informations présente sur la carte devrait vous aider à avancer.<br>
										Essayez de contacter ce mystérieux Darren Braun.
									</div>
								</p>
								<center>
									<form action="couloir.php" method="post">
										<button type="submit" name="reponse" class="boutonreponse"></button>
									</form>
								</center>
							';
						}
					elseif (isset($_POST['reponse']))
						{
							echo '
								<p>
									Une carte de visite, appartenant à un certain Darren Braun. De qui peut-il bien s\'agir ?<br>
									La carte ne contient que très peu d\'informations...<br>
									<br>
									<div class="reponse">
										Envoyez un mail à <a href="mailto:whosdarrenbraun@gmail.com">whosdarrenbraun@gmail.com</a>. Essayez de lui demander qui il est ou ce que vous voulez !
									</div>
								</p>
							';
						}
					elseif (isset($_POST['add']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/lastparty/carte.png"><span><u><b>Mystérieux inconnu</b></u><br>Récupérer la carte de visite de Darren Braun</span>';
							$scenario = 'lastparty';
							$description = 'carte';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Une carte de visite, appartenant à un certain Darren Braun. De qui peut-il bien s\'agir ?<br>
									La carte ne contient que très peu d\'informations...
								</p>
								<center>
									<form action="couloir.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
							$_SESSION['cartevisite'] = true;
						}
					else
						{
							echo '
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/lastparty/cartedevisite.png" rel="lightbox[invent]"><img src="/escaperpg/images/lastparty/cartedevisite.png"></a>
									</div>
									Vous fouillez fébrilement les poches de votre veste, quand soudain vos doigts se posent sur quelque chose.
								</p>
								<center>
									<form action="couloir.php" method="post">
										<input type="submit" name="add" value="Prendre.">
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