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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>Mess - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationbateau.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['dunettevisitee'])
						{
							echo '
								<audio src="/escaperpg/sons/ambria/mess.mp3" autoplay></audio>
								<p>
									Le mess est l\'endroit où la plupart des hommes viennent lorsqu\'ils ont un peu de temps libre pour manger, boire ou discuter.<br>
									<br>
									En approchant, vous entendez les clameurs à travers la porte. Vous ne savez pas ce qu\'il se passe à l\'intérieur exactement, mais il semblerait que des hommes se soient engagés dans une sorte de lutte.<br>
									En ouvrant la porte, vous voyez qu\'une demi-douzaine d\'hommes se tient autour d\'une table.
									Deux d\'entre eux sont engagés dans un bras de fer, les autres s\'étant placés de part et d\'autre pour encourager leur champion respectif.<br>
									<br>
									Vous passez en tâchant de gêner le moins possible et en essayant de ne pas prendre un coup involontaire, les hommes agitant les bras en tous sens.<br>
									De l\'autre côté de la pièce se tient la cuisine du coq, où un gros homme est affairé à préparer une sorte de soupe dans une immense casserole.<br>
									<br>
									Vous vous approchez de lui.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/don.png">
									</div>
									<div class="bulleperso">
										<p>
											Salut mon gars ! Qu\'est-ce que je peux faire pour toi ?
										</p>
									</div>
								</div>
								<p>
									Le type dégage une certaine bonhomie dans son attitude qui vous met rapidement en confiance.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Est-ce que je pourrais avoir quelque chose à grignoter ? C\'est pour l\'homme qui tient la barre, je ne connais pas son nom.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/don.png">
									</div>
								</div>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/don.png">
									</div>
									<div class="bulleperso">
										<p>
											Ah, oui ! Tu parles de Matthew, le timonier.<br>
											<br>
											Pas d\'souci mon gars, prends donc ça !
										</p>
									</div>
								</div>
								<p>
									Il vous tend un petit sac en toile dans lequel il fourre pêle-mêle deux pommes, une banane et une sorte de biscuit sec.
								</p>
								<center>
									<form action="mess" method="post">
										<input type="submit" name="add" value="Prendre et partir.">
									</form>
								</center>
							';
							$_SESSION['dunettevisitee'] = false;
						}
					elseif (isset ($_POST['add']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous le remerciez en prenant le sac, puis ressortez de la salle, prenant garde une nouvelle fois de ne pas déranger la scène qui s\'y déroule.
								</p>
							';
							$_SESSION['victuailles'] = true;
						}
					else
						{
							echo '
								<audio src="/escaperpg/sons/ambria/mess.mp3" autoplay></audio>
								<p>
									Le mess est l\'endroit où la plupart des hommes viennent lorsqu\'ils ont un peu de temps libre pour manger, boire ou discuter.<br>
									<br>
									En approchant, vous entendez les clameurs à travers la porte. Vous ne savez pas ce qu\'il se passe à l\'intérieur exactement, mais il semblerait que des hommes se soient engagés dans une sorte de lutte.<br>
									En ouvrant la porte, vous voyez qu\'une demi-douzaine d\'hommes se tient autour d\'une table.
									Deux d\'entre eux sont engagés dans un bras de fer, les autres s\'étant placés de part et d\'autre pour encourager leur champion respectif.<br>
									<br>
									Peu désireux de les déranger ou d\'être pris à partie, vous rebroussez chemin.
								</p>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
