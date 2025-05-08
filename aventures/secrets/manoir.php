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
		<title>Manoir - Secrets Familiaux</title>
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
					if (isset($_POST['suivant']))
						{
							echo '
								<p>
									Vous vous installez au bout de l\'immense table à manger et on vous apporte de quoi vous restaurer.<br>
									Vous vous sentez très seul dans cette immense habitation, les domestiques mangeant dans la cuisine.<br>
									<br>
									Il est assez tard lorsque vous terminez le repas et vous sentez la fatigue vous gagner, mais peut-être désirez-vous effectuer un tour du manoir avant d\'aller dormir ?
								</p>
								<center>
									<form action="manoir/rdc.php" method="post">
										<input type="submit" name="tour" value="Faire un tour.">
									</form>
									<form action="manoir/jour2.php" method="post">
										<input type="submit" name="dormir" value="Aller dormir.">
									</form>
								</center>
							';
						}
					else
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/manoir.png"><span><u><b>Nouveau propriétaire</b></u><br>Entrer pour la première fois dans le manoir</span>';
							$scenario = 'secrets';
							$description = 'manoir';
							$cache = 'non';
							$rarete = 'succesnormal';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo '
								<script src="/escaperpg/aventures/scripts/ouverturemanoir.js"></script>
								<div id="enigme">
									<a href="/escaperpg/images/secrets/rdc.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/rdc.png"></a>
								</div>
								<p>
									À votre entrée, vous sentez une bonne odeur émanant de la cuisine. Cependant, sous celle-ci, vous sentez des relents terribles d\'une <span class="mdp">odeur</span> plus pernicieuse.<br>
									<br>
									Avant que vous n\'ayez le temps d\'y réfléchir un peu, une vieille domestique s\'avance.
									<div class="dialogue">
										<div class="portrait">
											<img src="/escaperpg/images/secrets/monica.png">
										</div>
										<div class="bulleperso">
											<p>
												Ah ! Vous devez être M. Bastian. Je vous en prie, un bon repas vous attend dans la salle à manger.
											</p>
										</div>
									</div>
								</p>
								<center>
									<form action="manoir.php" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp8'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>