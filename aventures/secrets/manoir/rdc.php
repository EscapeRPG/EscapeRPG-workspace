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
		<title>Rez-de-chaussée - Secrets Familiaux</title>
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
					if ($_SESSION['visitepellington'])
						{
							echo '
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/rdc.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/rdc.png"></a>
									</div>
									<br>
									Vous êtes de retour au manoir, encore troublé par les découvertes faites dans la maison du docteur Pellington.<br>
									Vous ne savez pas ce que sont les embryons évoqués dans sa lettre d\'adieux, mais il semblerait que ce soit ici que vous puissiez en apprendre plus.<br>
									<br>
									Un tour du manoir s\'impose donc à vous.
								</p>
							';
						}
					else
						{
							echo '
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/rdc.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/rdc.png"></a>
									</div>
									<br>
									Depuis le hall d\'entrée où vous vous trouvez, un grand escalier mène à l\'<span class="lieu">étage</span>.<br>
									Sur votre gauche se trouve la salle à manger et la cuisine.<br>
									À droite, vous pouvez vous rendre au <span class="lieu">salon</span> ainsi qu\'à l\'<span class="lieu">aile des domestiques</span>.<br>
									<br>
									Vous pouvez utiliser le menu de navigation à gauche pour vous rendre où vous le désirez.
								</p>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>