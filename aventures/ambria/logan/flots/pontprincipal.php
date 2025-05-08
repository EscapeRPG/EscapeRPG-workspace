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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/styleambria.css">
		<meta charset="utf-8">
		<title>Pont Principal - Le Trésor d'Ambria</title>
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
					if ($_SESSION['loganpasaide'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous repassez sur le pont principal.<br>
									Les marins ont fini de briquer le pont et sont en train de discuter un peu plus loin.
								</p>
							';
						}
					elseif ($_SESSION['loganaide'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous repassez sur le pont principal.<br>
									Les marins que vous avez aidés sont en train de discuter un peu plus loin, en vous voyant, ils vous font un signe de main accompagné d\'un sourire.
								</p>
							';
						}
					elseif (isset ($_POST['visiter']))
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											Pas d\'problème ! R\'viens nous voir si tu changes d\'avis, on est jamais contre un p\'tit coup d\'main !
										</p>
									</div>
								</div>
								<p>
									Vous reprenez la visite du navire.<br>
									<br>
									Alors que vous faites quelques pas, un matelot venant du pont inférieur s\'approche de vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											C\'est toi l\'nouveau ?<br>
											<br>
											Moi c\'est Jake, viens avec moi, j\'vais t\'faire visiter l\'bateau et t\'permettre de t\'installer un peu.
										</p>
									</div>
								</div>
								<center>
									<form action="pontinferieur.php" method="post">
										<input type="submit" name="suivre" value="Le suivre.">
									</form>
								</center>
							';
							$_SESSION['loganconfiance'] -= 10;
							$_SESSION['loganpasaide'] = true;
							$_SESSION['loganavecjake'] = true;
						}
					elseif (isset ($_POST['aider']))
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous penchant pour attraper une éponge, vous la plongez dans le seau plein d\'un liquide brunâtre et mousseux, et commencez à frotter le pont vigoureusement pour le nettoyer.<br>
									<br>
									Au bout d\'un moment, les gars avec vous vous disent que vous pouvez retourner à vos affaires et vous remercient de les avoir aidés,
									après avoir une nouvelle fois assuré que vous aurez droit à leur prochaine gorgée de rhum.<br>
									<br>
									Alors que vous faites quelques pas, un matelot venant du pont inférieur s\'approche de vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											C\'est toi l\'nouveau ?<br>
											<br>
											Moi c\'est Jake, viens avec moi, j\'vais t\'faire visiter l\'bateau et t\'permettre de t\'installer un peu.
										</p>
									</div>
								</div>
								<center>
									<form action="pontinferieur.php" method="post">
										<input type="submit" name="suivre" value="Le suivre.">
									</form>
								</center>
							';
							$_SESSION['loganaide'] = true;
							$_SESSION['loganconfiance'] += 10;
							$_SESSION['loganavecjake'] = true;
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Vous marchez sur le pont principal. Au-dessus de votre tête, le ciel est d\'un bleu étincelant, à peine entaché par de rares nuages à l\'horizon.
									Vous vous penchez quelques instants par-dessus le garde-fou, perdant votre regard dans les vagues et laissant vos pensées s\'écouler.<br>
									Vous avez réussi, vous êtes enfin parti de cette maudite île, loin des douloureux souvenirs qui s\'y trouvaient.<br>
									Vous profitez quelques minutes de cet instant, l\'odeur de la mer vous évoquant un parfum de liberté, puis reprenez votre marche sur le pont.<br>
									<br>
									Quelques hommes d\'équipage se trouvent ici, certains briquant le pont, d\'autres s\'assurant que les tonneaux et caisses sont bien arrimés.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											Alors euh… Logan, c\'est ça ? Comment tu t\'sens à bord ?
										</p>
									</div>
								</div>
								<p>
									Vous leur répondez avec un sourire en leur disant que vous êtes heureux d\'avoir embarqué et que vous allez essayer de vous habituer à la vie à bord.<br>
									Comme pour confirmer vos dires, vous manquez de glisser sur une partie du pont en train d\'être briquée. Les types rigolent de bon cœur.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											Tant qu\'t\'es là, donne-nous donc un coup d\'main ! On t\'offrira un coup à boire la prochaine fois qu\'on aura droit à une ration d\'tafia !
										</p>
									</div>
								</div>
								<center>
									<form action="pontprincipal.php" method="post">
										<input type="submit" name="visiter" value="Visiter le bateau."><input type="submit" name="aider" value="Les aider.">
									</form>
								</center>
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