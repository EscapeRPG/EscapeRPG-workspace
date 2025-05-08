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
		<title>Matin - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['non']))
						{
							echo'<p>Vous raccrochez le téléphone et retournez au manoir pour prendre votre voiture, avant de vous diriger vers le <span class="lieu">107 Park Avenue</span>.</p>';
						}
					elseif (isset ($_POST['police']) AND str_replace($search, $replace, stripslashes($_POST['police'])) == "pellington")
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/bornepolice.png">
										</div>
										<div class="bulleperso">
											<p>
												L\'adresse du docteur Evan Pellington est le 107 Park Avenue à Arkham.<br>
												Désirez-vous autre chose ?
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="matin.php" method="post">
										<input type="submit" name="non" value="Non.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['police']))
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/bornepolice.png">
										</div>
										<div class="bulleperso">
											<p>
												Je ne comprends pas votre requête, pouvez-vous répéter ?
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="matin.php" method="post">
										<input type="text" name="police"> <input type="submit" name="repondre" value="Répondre.">
									</form>
									<form action="matin.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['telephone']) AND str_replace($search, $replace, stripslashes($_POST['telephone'])) == "inspecteurdeckard085" OR $_SESSION['telephone'])
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/bornepolice.png">
										</div>
										<div class="bulleperso">
											<p>
												Bonjour inspecteur Deckard, à quel sujet nous contactez-vous ?
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="matin.php" method="post">
										<input type="text" name="police"> <input type="submit" name="repondre" value="Répondre.">
									</form>
								</center>
							';
							if (isset($_POST['reponse']))
								{
									echo '
										<p>
											<span class="reponse">
												Demandez des informations sur "Pellington".
											</span>
										</p>
									';
								}
							elseif (isset($_POST['indice']))
								{
									echo '
										<p>
											<span class="indice">
												À ce stade de l\'enquête, vous devriez avoir des soupçons sur une personne en particulier dont vous avez pu entendre parler. Vous souvenez-vous de son nom ?
											</span>
										</p>
										<center>
											<form action="matin.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<center>
											<form action="matin.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['telephone'] = true;
						}
					elseif (isset($_POST['telephone']))
						{
							echo '
								<p>
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/bornepolice.png">
										</div>
										<div class="bulleperso">
											<p>
												Il semblerait que je n\'aie aucun agent associé à ce nom et numéro de badge. Pouvez-vous répéter votre grade, nom et numéro de badge je vous prie ?
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="matin.php" method="post">
										<input type="text" name="telephone"> <input type="submit" name="repondre" value="Répondre.">
									</form>
									<form action="matin.php" method="post">
										<button type="submit" name="indice" class="boutonindice"></button>
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/secrets/policebox.mp3" autoplay></audio>
								<p>
									Dès les premières lueurs de l\'aube, vous sortez du manoir et vous dirigez vers la première borne téléphonique de police que vous trouvez.
									Vous décrochez le combiné qui vous met en relation avec le central d\'Arkham.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/bornepolice.png">
										</div>
										<div class="bulleperso">
											<p>
												Bureau de police d\'Arkham, veuillez donner votre grade, nom et matricule je vous prie.
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="matin.php" method="post">
										<input type="text" name="telephone"> <input type="submit" name="repondre" value="Répondre.">
									</form>
								</center>
							';
							if (isset($_POST['reponse']))
								{
									echo '
										<p>
											<span class="reponse">
												Vous êtes l\'inspecteur Deckard, matricule 085, soit "inspecteurdeckard085".
											</span>
										</p>
									';
								}
							elseif (isset($_POST['indice2']))
								{
									echo '
										<p>
											<span class="indice">
												Vous avez oublié l\'une ou l\'autre de ces informations ? Où pourriez-vous les retrouver sur cette page ?<br>
												Avez-vous déjà essayé de cliquer sur votre photo à gauche ?
											</span>
										</p>
										<center>
											<form action="matin.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset($_POST['indice']))
								{
									echo '
										<p>
											<span class="indice">
												Vous avez oublié l\'une ou l\'autre de ces informations ? Où pourriez-vous les retrouver sur cette page ?
											</span>
										</p>
										<center>
											<form action="matin.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<center>
											<form action="matin.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>