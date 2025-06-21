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
		<title>Cave - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationpellington.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset($_POST['note']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Dans la chaudière, vous apercevez les restes calcinés d\'un livre à la couverture de cuir d\'un aspect étrange dont vous arrivez avec peine à lire le titre : Necronomicon.
									Vous voyez aussi dans le foyer des notes traitant des expériences menées par William, votre oncle.<br>
									Vous éteignez le feu aussi vite que possible et essayez d\'extraire les documents mais ceux-ci sont malheureusement beaucoup trop abîmés pour en tirer quoi que ce soit à présent.
									Cependant, un petit éclat de lumière au milieu des braises encore rougeoyantes attire votre regard.<br>
									<br>
									Vous écartez les morceaux incandescents et trouvez une nouvelle pièce que vous empochez aussitôt.
									<div id="enigme">
										<a href="/escaperpg/images/secrets/se.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/se.png"></a>
									</div>
								</p>
								<center>
									<form action="cave" method="post">
										<input type="submit" name="sse" value="Ajouter à l\'inventaire.">
									</form>
								</center>
							';
							$_SESSION['aveux'] = true;
						}
					elseif (isset($_POST['sse']))
						{
							echo '
								<script src="/escaperpg/scripts/inventaireadd.js"></script>
								<p>
									Vous semblez avoir trouvé ce que vous cherchiez ici, mais vous pouvez continuer à fouiller la maison de Pellington si vous le désirez,
									avant de retourner au <span class="lieu">manoir</span>.
								</p>
								<center>
									<form action="../manoir/rdc" method="post">
										<input type="submit" name="retour" value="Retour au manoir.">
									</form>
								</center>
							';
							$_SESSION['visitepellington'] = true;
							$_SESSION['jour'] = false;
							$_SESSION['sse'] = true;

					if (!in_array("piecese", $_SESSION['inventaire'])) {
						$_SESSION['inventaire'][] = "piecese";
					}
				}
					elseif ($_SESSION['visitepellington'])
						{
							echo '
								<p>
									Vous semblez avoir trouvé ce que vous cherchiez ici, mais vous pouvez continuer à fouiller la maison de Pellington si vous le désirez,
									avant de retourner au <span class="lieu">manoir</span>.
								</p>
								<center>
									<form action="../manoir/rdc" method="post">
										<input type="submit" name="retour" value="Retour au manoir.">
									</form>
								</center>
							';
						}
					else
						{
							echo '
								<p>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/pellcave.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/pellcave.png"></a>
									</div>
									<br>
									En arrivant dans la cave, vous sentez une odeur de brûlé.<br>
									Vous descendez l\'escalier et entrez dans la salle de la chaudière.<br>
									<br>
									Avec horreur, vous faites une macabre découverte : le docteur Pellington est affalé sur une chaise faisant face au fourneau, un trou béant dans le crâne et un revolver resté accroché dans sa main pendante.
									Le mur à côté de lui est recouvert de sang.
									Il semblerait que le pauvre homme se soit donné la mort peu de temps avant votre arrivée.<br>
									<br>
									Vous déglutissez avec peine et vous approchez pour trouver un mot sur le sol, griffoné à la hâte. Les derniers mots de Pellington :<br>
									<br>
									<div id="enigme">
										<a href="/escaperpg/images/secrets/aveux.png" rel="lightbox[invent]"><img src="/escaperpg/images/secrets/aveux.png"></a>
									</div>
									<br>
									Vous prenez la note avec vous.
								</p>
								<center>
									<form action="cave" method="post">
										<input type="submit" name="note" value="Ajouter à l\'inventaire.">
									</form>
								</center>
							';
							$_SESSION['mdp19'] = true;
							$_SESSION['mdp20'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
