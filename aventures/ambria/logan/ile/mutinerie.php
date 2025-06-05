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
		<title>Voyage de retour - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Le voyage de retour dure plusieurs mois, Jake se révélant encore plus tyrannique que le précédent capitaine, faisant trimer les hommes plus que de raison.<br>
									<br>
									Évitant cependant les mauvaises rencontres avec les navires de la Flotte Royale anglaise, le voyage se passe plutôt tranquillement
									et vous acceptez les tâches que l\'on vous donne en sachant que la situation ne sera pas éternelle.<br /<
									<br>
									Un jour, alors que les dernières lueurs du soleil s\'effacent à l\'horizon,
									Jake annonce que le Surgisseur des Tempêtes est proche d\'un port où il compte s\'arrêter pour profiter un peu de son argent “durement gagné” avec des filles de joie et tout l\'alcool qu\'il pourra prendre,
									les réserves du bateau ayant depuis longtemps été dilapidées.<br /<
									<br>
									Le navire accoste ainsi et plusieurs marins reçoivent la permission de descendre à terre, tandis que les autres -vous y compris-
									doivent rester à bord pour s\'assurer que personne ne tente de vous voler quoi que ce soit.<br>
									Vous comprenez que, malgré votre participation à la mutinerie, Jake et les autres se défient de vous et essayent de vous tenir à l\'écart.<br>
									<br>
									Peu importe, vous sentez que ce soir sera le moment idéal pour prendre la fuite dans la nuit, un beau butin dans la poche.
								</p>
								<center>
									<form action="mutinerie" method="post">
										<input type="submit" name="nuit" value="Attendre la nuit.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['nuit']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/pontinferieur.mp3" autoplay></audio>
								<p>
									Un peu plus tard, alors que la plupart des hommes restés à bord sont endormis et que les autres sont toujours en train de boire à la taverne, vous vous levez furtivement de votre couchette.<br>
									Votre objectif : récupérer votre part du butin et filer sans que personne ne s\'en aperçoive.<br>
									<br>
									Pour cela, il va vous falloir être prudent car le moindre faux pas révèlera vos intentions et vous ne donnez pas cher de votre peau si les pirates vous mettent la main dessus.<br>
									<br>
									Vous n\'aurez droit qu\'à un seul essai.
								</p>
								<center>
									<form action="mutinerie" method="post">
										<input type="submit" name="agir" value="Agir.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['agir']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/pontinferieur.mp3" autoplay></audio>
								<div id="game-container-1" class="game-container">
									<div id="map-and-controls">
										<div id="game-map-1" class="game-map">
											<div id="tiles" class="layer"></div>
											<div id="sprites" class="layer"></div>
											<div id="tresorimg">
												<img src="/escaperpg/images/ambria/tresordispo.png">
											</div>
											<div id="crack1">
												<img src="/escaperpg/images/ambria/cracking.png"/>
											</div>
											<div id="crack2">
												<img src="/escaperpg/images/ambria/cracking.png"/>
											</div>
											<div id="crack3">
												<img src="/escaperpg/images/ambria/cracking.png"/>
											</div>
										</div>
									</div>
									<br>
									<div id="controls">
										<button id="up">↑</button><br>
										<button id="left">←</button><button id="right">→</button><br>
										<button id="down">↓</button>
									</div>
								</div>
								<script src="/escaperpg/aventures/ambria/logan/scripts/mutinerie.js"></script>
								<p>
									La première chose à laquelle vous devez faire attention est Barthy, qui dort dans la couchette la plus proche de vous.
									Il a l\'ouïe fine et le sommeil très léger et se réveillera à coup sûr si vous passez près de lui, aussi devez-vous faire le plus grand détour possible.<br>
									Vous pouvez passer par les quelques hamacs laissés vacants, mais ne pouvez vous risquer à passer sous ceux dans lesquels Lloyd et d\'autres hommes dorment actuellement.<br>
									<br>
									De plus, vous savez que plusieurs planches sur le pont sont usées et risquent de craquer si vous passez dessus.
									Heureusement, vous avez appris à les reconnaître.<br>
									<br>
									Quand vous serez dans la pièce suivante, il vous faudra faire attention aux hommes qui sont de garde et qui pourraient vous voir.
									Mais avec l\'obscurité de la nuit, vous savez que leur champ de vision sera réduit.<br>
									<br>
									Il vous faudra vous rendre tout au bout du pont, dans la cambuse où a été stocké le trésor, pour y récupérer votre bien avant de pouvoir repartir par l\'escalier, vers la liberté.
								</p>
							';
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
								<p>
									Le voyage de retour se révèle long et pénible, tout le monde ployant sous le poids des sacs bien remplis.<br>
									<br>
									De retour au Surgisseur des Tempêtes, vous êtes accueillis par les quelques hommes restés à bord.<br>
									Ils semblent légèrement déconcertés par l\'absence de Sullivan, mais Jake leur explique la situation et, compte tenu de leur réaction, vous comprenez qu\'ils faisaient également partie de la conspiration.<br>
									<br>
									Faisant ruisseler le butin sur le pont, sous le regard avide de vos comparses, Jake met fin à la discussion et ordonne d\'ouvrir les tonneaux d\'alcool de la réserve personnelle du capitaine déchu,
									s\'imposant ainsi comme le nouveau leader du navire.<br>
									<br>
									La fête dure toute la nuit dans une ambiance plutôt joyeuse.<br>
									Le matin venu, Jake réunit l\'équipage qui peine à sortir du sommeil suite à la beuverie, puis procède au partage du butin.<br>
									Tout le monde reçoit une part égale, en dehors des quatre meneurs de la mutinerie, qui se partagent entre eux la part qui aurait du revenir à Sullivan.<br>
									<br>
									Le nouveau capitaine vous lance alors un sac bien rempli devant les jambes.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Tiens mon gars, t\'as bien mérité ta part toi aussi. T\'as fait c\'qu\'il fallait, quand il le fallait.<br /<
											<br>
											Avec les aut\', on est fiers de te compter parmi nous !
										</p>
									</div>
								</div>
								<p>
									Vous esquissez un sourire que vous espérez sincère et, alors que l\'équipage apprête le navire pour repartir vers l\'horizon, vous commencez à échafauder un plan pour vous échapper à la première occasion.
								</p>
								<center>
									<form action="mutinerie" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
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
