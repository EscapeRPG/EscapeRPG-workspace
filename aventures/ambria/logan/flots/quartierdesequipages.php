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
		<title>Quartier des Équipages - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['loganavecjake'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/quartierequipages.mp3" autoplay></audio>
								<p>
									Le quartier des équipages est une partie du pont inférieur où sont installés les branles permettant de se reposer.<br>
									<br>
									Vous avancez entre les couches et les ronflements, soucieux de ne pas réveiller les quelques hommes qui prennent leur repos.<br>
									<br>
									Jake approche de l\'un des hamacs.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Tiens, ce s\'ra ta couchette ici.<br>
											Tu la partageras avec moi, on n\'est pas du même quart donc j\'dormirai ici quand tu s\'ras en train d\'travailler ailleurs.
										</p>
									</div>
								</div>
								<p>
									Il s\'installe à l\'intérieur.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Tu verras, c\'t\'assez confortable, une fois qu\'on s\'y habitué.<br>
											<br>
											Bon voilà, j\'t\'ai montré c\'que t\'avais besoin d\'voir en priorité. J\'te laisse voir ailleurs s\'tu veux, moi j\'vais piquer un p\'tit somme.<br>
											Salut !
										</p>
									</div>
								</div>
								<p>
									Vous le laissez là et repartez du dortoir.
								</p>
							';
							$_SESSION['loganavecjake'] = false;
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/quartierequipages.mp3" autoplay></audio>
								<p>
									Le quartier des équipages est une partie du pont inférieur où sont installés les branles permettant de se reposer.<br>
									<br>
									Vous avancez entre les couches et les ronflements, soucieux de ne pas réveiller les quelques hommes qui prennent leur repos.
								</p>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>