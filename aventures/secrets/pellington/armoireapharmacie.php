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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/stylesecrets.css">
		<meta charset="utf-8">
		<title>Salle de bain - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['melanger']) AND $_POST['3'] == "30" AND $_POST['4'] == "15" AND $_POST['7'] == "50" AND empty($_POST['1']) AND empty($_POST['2']) AND empty($_POST['5']) AND empty($_POST['6']) AND empty($_POST['8']) AND empty($_POST['9']))
						{
							echo '
								<audio src="/escaperpg/sons/secrets/melange.mp3" autoplay></audio>
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/analeptique.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/analeptique.png"></a>
									</div>
									Vous avez réussi à synthétiser correctement un antidote pour soigner les chiens !<br>
									<br>
									Il s\'agit d\'un <span class="mdp">analeptique</span> que vous prenez avec vous.
								</p>
								<center>
									<form action="armoireapharmacie.php" method="post">
										<input type="submit" name="anti" value="Ajouter à l\'inventaire.">
									</form>
								</center>
							';
							$_SESSION['mdp18'] = true;
						}
					elseif (isset($_POST['anti']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Il semblerait que vous n\'ayez plus rien à trouver par ici.
								</p>
								<center>
									<form action="sdb.php" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
							$_SESSION['recette'] = false;
							$_SESSION['antidote'] = true;
						}
					elseif (isset($_POST['melanger']))
						{
							echo '
								<p>
									Il semblerait que cela n\'ait pas fonctionné.
								</p>
								<form action="armoireapharmacie.php" method="post">
									<div id="armoireapharmacie">
										<img src="/escaperpg/images/secrets/armoireapharmacie.png">
										<input type="text" name="1" id="1" class="hg" placeholder="0">
										<input type="text" name="2" id="2" class="hm" placeholder="0">
										<input type="text" name="3" class="hd" placeholder="0">
										<input type="text" name="4" class="mg" placeholder="0">
										<input type="text" name="5" class="mm" placeholder="0">
										<input type="text" name="6" class="md" placeholder="0">
										<input type="text" name="7" class="bg" placeholder="0">
										<input type="text" name="8" class="bm" placeholder="0">
										<input type="text" name="9" class="bd" placeholder="0">
									</div>
									<center>
										<input type="submit" name="melanger" value="Mélanger.">
									</center>
								</form>
								<center>
									<form action="sdb.php" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
						}	
					else
						{
							echo '
								<p>
									L\'armoire à pharmacie contient de nombreux flacons de divers produits médicaux.<br>
									<br>
									Sans connaître de formule, il pourrait être dangereux de les mélanger.
								</p>
								<form action="armoireapharmacie.php" method="post">
									<div id="armoireapharmacie">
										<img src="/escaperpg/images/secrets/armoireapharmacie.png">
										<input type="text" name="1" id="1" class="hg" placeholder="0">
										<input type="text" name="2" id="2" class="hm" placeholder="0">
										<input type="text" name="3" class="hd" placeholder="0">
										<input type="text" name="4" class="mg" placeholder="0">
										<input type="text" name="5" class="mm" placeholder="0">
										<input type="text" name="6" class="md" placeholder="0">
										<input type="text" name="7" class="bg" placeholder="0">
										<input type="text" name="8" class="bm" placeholder="0">
										<input type="text" name="9" class="bd" placeholder="0">
									</div>
									<center>
										<input type="submit" name="melanger" value="Mélanger.">
									</center>
								</form>
								<center>
									<form action="sdb.php" method="post">
										<input type="submit" name="retour" value="Retour.">
									</form>
								</center>
							';
							$_SESSION['armoireopened'] = true;
						}				
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>