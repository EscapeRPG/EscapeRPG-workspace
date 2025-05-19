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
		<title>La Taverne - Le Trésor d'Ambria</title>
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
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['battre']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['bagarre'])))
								{
									case "derrieretoi":
										echo'
											<audio src="/escaperpg/sons/ambria/tavernehommetombe.mp3" autoplay></audio>
											<p>
												Le type trébuche sur votre table et la renverse, ainsi que tout ce qui se trouvait dessus.
												Vous vous redressez prestement pour éviter de vous prendre un coup et en donnez malencontreusement un à un type assis derrière vous.
												Trop effrayé par la situation, vous n\'y prêtez pas vraiment attention, étant surtout concentré sur la recherche d\'une échappatoire.<br>
												<br>
												De son côté, le capitaine Mason essaye de récupérer son sabre mais celui-ci est actuellement bloqué sous le corps du gars qui s\'est effondré sur vous.
												Il relève la tête vers vous et semble vous dire quelque chose.<br>
												Vous vous retournez alors et apercevez du coin de l\'œil la silhouette du type que vous avez bousculé et qui s\'est relevé.
												Dans sa main, vous voyez un reflet de lumière qui révèle une lame de couteau.<br>
												<br>
												Dans votre cerveau, quelque chose semble se réveiller.
												Une sorte d\'instinct de survie qui envoie une décharge d\'adrénaline dans votre corps, vous sortant de votre torpeur.<br>
												Vous faites un pas de côté pour éviter le coup que l\'homme voulait vous asséner avec sa tête et profitez de son mouvement pour le poussez dans le dos et l\'envoyer un peu plus loin.
												Gardant l\'attention sur votre adversaire qui s\'est rattrapé in extremis sur une poutre,
												vous apercevez le capitaine qui a eu le temps de récupérer son sabre et est en train de se relever alors qu\'un autre type s\'apprête à le frapper à l\'aide d\'un tabouret.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														<span class="mdp2">Baissez-vous</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
											</div>
											<p>
												Sans prendre le temps de vérifier s\'il vous a entendu, vous reportez toute votre attention sur le grand type au couteau qui se rapproche de vous.
											</p>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="baston"><input type="submit" name="react" value="Réagir.">
												</form>
											</center>
										';
										$_SESSION['loganconfiance'] += 10;
										$_SESSION['mdp3'] = true;
										break;
									default:
										echo'
											<audio src="/escaperpg/sons/ambria/tavernehommetombe.mp3" autoplay></audio>
											<p>
												Le type trébuche sur votre table et la renverse, ainsi que tout ce qui se trouvait dessus.
												Vous vous redressez prestement pour éviter de vous prendre un coup et en donnez malencontreusement un à un type assis à une autre table derrière vous.
												Trop effrayé par la situation, vous n\'y prêtez pas vraiment attention, étant surtout concentré sur la recherche d\'une échappatoire.<br>
												<br>
												De son côté, le capitaine Mason essaye de récupérer son sabre mais celui-ci est actuellement bloqué sous le corps du gars qui s\'est effondré sur vous.
												Il relève la tête vers vous et semble vous dire quelque chose mais vous n\'arrivez pas à comprendre quoi.<br>
												Réagissant trop tard, vous vous retournez vers le type que vous avez bousculé et vous prenez de plein fouet le coup de boule qui vous assène, vous faisant chanceler.<br>
												<br>
												Faisant quelques pas en arrière, vous reprenez vos esprits et voyez le capitaine qui a récupéré son sabre.
												Derrière lui, un autre gars semble vouloir prendre part au combat en donnant un grand coup à Sullivan à l\'aide d\'un tabouret qu\'il a attrapé.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														<span class="mdp2">Baissez-vous</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
											</div>
											<p>
												Sans prendre le temps de vérifier s\'il vous a entendu, vous reportez toute votre attention sur le grand type qui vous a donné un coup et qui se rapproche de vous, un couteau à la main.
											</p>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="baston"><input type="submit" name="react" value="Réagir.">
												</form>
											</center>
										';
										$_SESSION['mdp3'] = true;
								}
						}
					elseif (isset ($_POST['react']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['baston'])))
								{
									case "onsort":
										echo'
											<audio src="/escaperpg/sons/ambria/sullivanesquivecoup.mp3" autoplay></audio>
											<p>
												Votre adversaire tente de vous donner un vicieux coup de couteau à l\'aine mais vous esquivez d\'un petit saut sur le côté.
												Attrapant un chope sur une table à portée, vous la fracassez sur le crâne de l\'individu qui tombe au sol.<br>
												Doutant qu\'il ne soit assommé, vous profitez de ce petit moment de répit pour vous faufiler entre les combattants et aller un peu plus loin.<br>
												<br>
												Vous cherchez le capitaine du regard et le voyez éviter des coups et agiter son sabre autour de lui pour s\'assurer un cercle de protection.<br>
												Captant votre regard, il vous crie de ne pas traîner ici et vous foncez vers la porte de sortie.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														<span class="mdp2">Compris</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
											</div>
											<p>
												La mêlée est devenue une bagarre générale dans la taverne et le chemin jusqu\'à l\'extérieur n\'est pas aisé, mais vous parvenez finalement à sortir du bâtiment sans prendre de coup.<br>
												<br>
												Une fois dehors, vous vous appuyez sur vos genoux pour reprendre votre souffle.<br>
												Sullivan arrive alors et vous attrape par l\'arrière du gilet pour vous attirer plus loin du tumulte.
											</p>
											<center>
												<form action="embrouilles" method="post">
													<input type="submit" name="suivant" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['loganconfiance'] += 20;
										$_SESSION['mdp4'] = true;
										break;
									default:
										echo'
											<audio src="/escaperpg/sons/ambria/sullivanprendcoup.mp3" autoplay></audio>
											<p>
												Votre adversaire tente de vous donner un vicieux coup de couteau à l\'aine mais vous esquivez de justesse d\'un petit saut sur le côté.
												Le couteau entaille tout de même largement votre chemise qui part en lambeaux.
												Attrapant un chope sur une table à portée, vous la fracassez sur le crâne de l\'individu qui tombe au sol.<br>
												Doutant qu\'il ne soit assommé, vous profitez de ce petit moment de répit pour vous faufiler entre les combattants pour aller un peu plus loin.<br>
												<br>
												Vous cherchez le capitaine du regard et le voyez éviter des coups et agiter son sabre autour de lui pour s\'assurer un cercle de protection.<br>
												Captant votre regard, il vous crie de ne pas traîner ici et vous foncez vers la porte de sortie.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														<span class="mdp2">Compris</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
											</div>
											<p>
												La mêlée est devenue une bagarre générale dans la taverne et le chemin jusqu\'à l\'extérieur n\'est pas aisé, mais vous parvenez finalement à sortir du bâtiment sans prendre de coup.<br>
												<br>
												Une fois dehors, vous vous appuyez sur vos genoux pour reprendre votre souffle.<br>
												Sullivan arrive alors et vous attrape par l\'arrière du gilet pour vous attirer plus loin du tumulte.
											</p>
											<center>
												<form action="embrouilles" method="post">
													<input type="submit" name="suivant" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['mdp4'] = true;
								}
						}
					elseif (isset ($_POST['suivant']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/bagarre.png"><span><u><b>Classique de la taverne</b></u><br>Participer à sa première bagarre</span>';
							$scenario = 'ambria';
							$description = 'bagarre';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo'
								<audio src="/escaperpg/sons/ambria/finbagarre.mp3" autoplay></audio>
								<p>
									Laissant derrière-vous le vacarme de la confrontation qui ne s\'est toujours pas arrêtée, vous vous dirigez tous les deux vers les docks.
									Quelques cris de douleur et des bruits de verre brisé sont les dernières choses que vous entendez alors que vous avancez dans les pas du capitaine, qui s\'arrête un peu plus loin et se retourne vers vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Bon... tu peux m\'expliquer ce qu\'il s\'est passé là-bas ? Pourquoi tout le monde s\'est lancé à se battre comme ça, t\'as parlé du parchemin à qui ?
										</p>
									</div>
								</div>
								<center>
									<form action="embrouilles" method="post">
										<input type="submit" name="suivant2" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo'
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											J-Je n\'en ai pas parlé ! Je venais tout juste d\'arriver et je ne savais pas trop à qui...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Ouais, ok, j\'ai compris.<br /<
											<br>
											Dans tous les cas, l\'histoire va vite se répandre. Si on ne se dépêche pas on va avoir toute la ville sur nous...
										</p>
									</div>
								</div>
								<p>
									Il braque son regard d\'acier dans le vôtre.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Tu t\'es pas trop mal débrouillé là-dedans. Je vais te laisser ta chance...<br>
											Tu embarques sur mon vaisseau, tu nous aides avec le parchemin et tu auras ta part du butin, comme de droit.<br>
											<br>
											Mais écoute-moi bien : tu vas devoir te plier à la vie à bord, participer aux différentes tâches et te faire accepter par le reste de l\'équipage.
											Si tu te fais tuer par un membre de l\'équipage ou que tu bascules par-dessus bord, ou si tu traînes un tant soit peu la patte, je t\'abandonne, c\'est clair ?
										</p>
									</div>
								</div>
								<p>
									Vous le regardez quelques secondes, silencieux, avant de hocher la tête. Le capitaine se redresse un peu, l\'air presque amusé par tout ce qui s\'est passé.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Bon... C\'est quoi ton nom ?
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">Logan</span>. Logan Barthélémy.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											D\'accord. Viens avec moi, on retourne aux docks pour embarquer sur mon vaisseau avant que quelqu\'un ne nous tombe dessus.
										</p>
									</div>
								</div>
								<p>
									Vous reprenez votre route en vous dirigeant vers les docks, où se trouve le Surgisseur des Tempêtes, le navire de Sullivan.<br>
									<br>
									À chaque intersection, ce dernier observe attentivement autour de lui pour vérifier que personne n\'essaye de vous tendre une embuscade.
									Par moments, vous avez l\'impression d\'entendre l\'écho de pas dans les rues calmes de la ville.
								</p>
								<center>
									<form action="embarquement" method="post">
										<input type="submit" name="embarquer" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp5'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/bagarretaverne.mp3" autoplay></audio>
								<p>
									Vous lui rendez son regard, tâchant de ne pas trembler et de ne laisser paraître aucune émotion, avant de tenter un coup de bluff.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Parce que le parchemin seul ne vous permettra pas de trouver ce que vous cherchez.
											Il faut savoir comment le lire et je suis le seul à le pouvoir, Louis m\'a appris comment le...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<p>
									Avant que vous ne puissiez terminer votre phrase, un bruit à quelques mètres derrière le capitaine attire votre attention.
									À deux tables de vous, une bagarre est en train d\'éclater entre trois hommes.<br>
									Vous ne savez trop comment réagir, n\'ayant jamais été dans ce genre de situation auparavant en dehors des trop nombreuses fois où votre beau-père revenait du même bâtiment où vous êtes actuellement,
									ivre mort et cherchant le moindre prétexte pour vous battre avec votre mère.
									Toutes les fois où cela arrivait, vous ne trouviez pas le courage de réagir,
									attendant seulement qu\'il ne fatigue et aille s\'endormir, vous laissant seul et terrorisé tandis que votre mère était forcée de le rejoindre.<br>
									<br>
									Le capitaine vous sort de vos sombres pensées.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Viens gamin, on va continuer cette discussion ailleurs.
										</p>
									</div>
								</div>
								<p>
									Il tend la main pour récupérer son arme lorsque vous apercevez derrière lui l\'un des hommes qui était en train de se battre se faire propulser vers vous.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Capitaine, <span class="mdp2">attention</span> !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
								</div>
								<center>
									<form action="embrouilles" method="post">
										<input type="text" name="bagarre"><input type="submit" name="battre" value="Réagir.">
									</form>
								</center>
							';
							$_SESSION['mdp2'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/footer.php"; ?>
	</body>
</html>
