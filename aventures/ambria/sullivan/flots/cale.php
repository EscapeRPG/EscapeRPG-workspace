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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>Cale - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['ambrialoganlocalise'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/cale.mp3" autoplay></audio>
								<p>
									Vous descendez à la cale, où s\'entasse tout le matériel nécessaire aux voyages.<br>
									Pour passer, vous serpentez entre les tas de planches servant à colmater d\'éventuelles brèches dans la coque puis longez le stock de barils de poudre et de victuailles.
									Sur votre passage, vous en profitez pour évaluer l\'état des stocks.<br>
									Pour le moment, vous estimez avoir encore assez de riz et autres condiments pour tenir plusieurs jours,
									mais vous constatez que la réserve de rhum -indispensable pour maintenir le moral de vos hommes- commence à se tarir.
									Vous ne vous faites pas d\'inquiétude sur le moment, sachant qu\'il en reste encore dans des barils sur le pont.<br>
									<br>
									Vous finissez par arriver dans une zone plus vaste où les marins viennent parfois pour être tranquilles.<br>
									À la lueur d\'une chandelle, vous trouvez Logan assis sur un tabouret, en train de jouer aux dés avec quatre autres marins.<br>
									<br>
									Tous se tournent vers vous lorsque vous arrivez.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Ah, enfin je te trouve !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
									<div class="bulleperso">
										<p>
											Capitaine, vous me cherchiez ? Qu\'est-ce que je peux faire pour vous ?
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Il est temps qu\'on discute, toi et moi.<br>
											<span class="mdp2">Suis-moi</span>.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Vous rebroussez chemin et vous vous dirigez vers votre <span class="lieu">cabine</span>.
								</p>
								<center>
									<form action="cabine.php" method="post">
										<input type="submit" name="suivantcabine" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['ambrialogantrouve'] = true;
							$_SESSION['mdp8'] = true;
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/pontinferieur.mp3" autoplay></audio>
								<p>
									Vous descendez à la cale, où s\'entasse tout le matériel nécessaire aux voyages.<br>
									Pour passer, vous serpentez entre les tas de planches servant à colmater d\'éventuelles brèches dans la coque
									puis longez le stock de barils de poudre et de victuailles jusqu\'à arriver dans une zone plus vaste où les marins viennent parfois pour être tranquilles.<br>
									<br>
									L\'endroit semble vide.<br>
									Vous tendez l\'oreille pour savoir si quelqu\'un se trouve ailleurs dans la cale mais ne percevez que les caquètements des poules et les reniflements des cochons dans leurs cages.<br>
									<br>
									Manifestement, il n\'y a personne ici.
								</p>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>