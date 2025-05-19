<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
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
		<title>Bureau privé - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png" alt="inspecteur deckard"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['suivantelec']) OR $_SESSION['shortcut'])
						{
							echo '
								<p>
									Le moral déjà bien affecté par les derniers événements, vous manquez de peu de paniquer mais réussissez à vous ressaisir.<br>
									À tâtons, vous finissez par trouver un petit boîtier sur le mur, que vous ouvrez pour découvrir un système archaïque de câblages électriques.
									Si vous désirez retrouver la lumière, il va falloir remettre de l\'ordre dans tout ça.
								</p>
								<div id="panneauelec">
									<div class="dropperelec" id="c1"></div>
									<div class="dropperelec" id="d1"></div>
									<div class="dropperelec" id="e1"></div>
									<div class="dropperelec" id="a2"></div>
									<div class="dropperelec" id="b2"></div>
									<div class="dropperelec" id="c2"></div>
									<div class="dropperelec" id="d2"></div>
									<div class="dropperelec" id="e2"></div>
									<div class="dropperelec" id="a3"></div>
									<div class="dropperelec" id="b3"></div>
									<div class="dropperelec" id="c3"></div>
									<div class="dropperelec" id="d3"></div>
									<div class="dropperelec" id="e3"></div>
									<div class="dropperelec" id="a4"></div>
									<div class="dropperelec" id="b4"></div>
									<div class="dropperelec" id="c4"></div>
									<div class="dropperelec" id="d4"></div>
									<div class="dropperelec" id="e4"></div>
									<div class="dropperelec" id="a5"></div>
									<div class="dropperelec" id="b5"></div>
									<div class="dropperelec" id="c5"></div>
									<div class="dropperelec" id="d5"></div>
									<div class="dropperelec" id="e5"></div>
								</div>
								<br>
								<center>
									<div class="draggableelec" id="dragelec1"><img src="/escaperpg/images/secrets/cables/1.png" id="dra1"></div>
									<div class="draggableelec" id="dragelec2"><img src="/escaperpg/images/secrets/cables/2.png" id="dra2"></div>
									<div class="draggableelec" id="dragelec3"><img src="/escaperpg/images/secrets/cables/3.png" id="dra3"></div>
									<div class="draggableelec" id="dragelec4"><img src="/escaperpg/images/secrets/cables/4.png" id="dra4"></div>
									<div class="draggableelec" id="dragelec5"><img src="/escaperpg/images/secrets/cables/5.png" id="dra5"></div>
									<div class="draggableelec" id="dragelec6"><img src="/escaperpg/images/secrets/cables/6.png" id="dra6"></div>
									<div class="draggableelec" id="dragelec7"><img src="/escaperpg/images/secrets/cables/7.png" id="dra7"></div>
									<div class="draggableelec" id="dragelec8"><img src="/escaperpg/images/secrets/cables/8.png" id="dra8"></div>
									<div class="draggableelec" id="dragelec9"><img src="/escaperpg/images/secrets/cables/9.png" id="dra9"></div>
									<div class="draggableelec" id="drag1elec0"><img src="/escaperpg/images/secrets/cables/10.png" id="dra10"></div>
									<div class="draggableelec" id="dragelec11"><img src="/escaperpg/images/secrets/cables/11.png" id="dra11"></div>
									<div class="draggableelec" id="dragelec12"><img src="/escaperpg/images/secrets/cables/12.png" id="dra12"></div>
									<div class="draggableelec" id="dragelec13"><img src="/escaperpg/images/secrets/cables/13.png" id="dra13"></div>
									<div class="draggableelec" id="dragelec14"><img src="/escaperpg/images/secrets/cables/14.png" id="dra14"></div>
									<div class="draggableelec" id="dragelec15"><img src="/escaperpg/images/secrets/cables/15.png" id="dra15"></div>
									<div class="draggableelec" id="dragelec16"><img src="/escaperpg/images/secrets/cables/16.png" id="dra16"></div>
									<div class="draggableelec" id="dragelec17"><img src="/escaperpg/images/secrets/cables/17.png" id="dra17"></div>
									<div class="draggableelec" id="dragelec18"><img src="/escaperpg/images/secrets/cables/18.png" id="dra18"></div>
									<div class="draggableelec" id="dragelec19"><img src="/escaperpg/images/secrets/cables/19.png" id="dra19"></div>
									<div class="draggableelec" id="dragelec20"><img src="/escaperpg/images/secrets/cables/20.png" id="dra20"></div>
									<div class="draggableelec" id="dragelec21"><img src="/escaperpg/images/secrets/cables/21.png" id="dra21"></div>
									<div class="draggableelec" id="dragelec22"><img src="/escaperpg/images/secrets/cables/22.png" id="dra22"></div>
									<div class="draggableelec" id="dragelec23"><img src="/escaperpg/images/secrets/cables/23.png" id="dra23"></div>
								</center>
								<script src="/escaperpg/aventures/scripts/dragdropelec.js"></script>
								<center>
									<form action="#" method="post">
										<input type="submit" name="reset" value="Réinitialiser.">
									</form>
								</center>
							';
						}
					else
						{
							echo'
								<p>
									<audio src="/escaperpg/sons/secrets/courtcircuit.mp3" autoplay></audio>
									Alors que vous tirez dessus, un arc électrique apparaît entre deux tiges de métal au sommet de la cuve que vous venez d\'activer.
									Cependant, l\'effet dure à peine une seconde avant que le courant dans la maison ne se coupe brutalement, plongeant la pièce dans l\'obscurité.
								</p>
								<center>
									<form action="courtcircuit" method="post">
										<input type="submit" name="suivantelec" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['shortcut']=true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
