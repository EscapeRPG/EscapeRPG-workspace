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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/secrets/css/style.css">
		<meta charset="utf-8">
		<title>Salon - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['tab'])
						{
							echo '
								<p>
									Il semble ne plus rien y avoir d\'utile par ici.
								</p>
							';
						}
					else
						{
							if (isset ($_POST['salon']) AND str_replace($search, $replace, stripslashes($_POST['salon'])) == "tableau")
								{
									echo '
										<p>
											Vous observez autour de vous, en quête du fameux tableau décrit dans la note de Pellington, mais il semblerait qu\'il ait été décroché.<br>
											Vous vous souvenez en effet qu\'il y avait un tableau sur la cheminée, mais il ne reste maintenant plus qu\'un espace vide où il devait être accroché auparavant. <br>
											<br>
											Téona arrive juste à ce moment.
											<br>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/secrets/teona.png">
												</div>
												<div class="bulleperso">
													<p>
														Vous cherchez un tableau ?
														En effet, il y en avait bien un au-dessus de la cheminée, mais votre oncle l\'a détruit il y a quelques semaines.<br>
														Je crois savoir qu\'il a jeté les <span class="mdp">restes</span> à la <span class="lieu">cave</span>.
													</p>
												</div>
											</div>
										</p>
									';
									$_SESSION['tab'] = true;
									$_SESSION['mdp24'] = true;
								}
							elseif (isset($_POST['salon']))
								{
									echo'
										<p>
											Il n\'y a rien ici en rapport avec ce que vous cherchez.
										</p>
									';
								}
							else
								{
									echo '
										<p>
											Le grand salon semble tel que dans vos souvenirs, bien que cela fasse des années que vous n\'êtes pas venu ici.<br>
											Un feu de cheminée réchauffe agréablement la pièce.
											<center>
												<form action="salon.php" method="post">
													<input type="text" name="salon"> <input type="submit" name="chercher" value="Chercher.">
												</form>
											</center>
										</p>
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