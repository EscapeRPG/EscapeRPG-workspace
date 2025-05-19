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
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suite2']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/bagarretaverne.mp3" autoplay></audio>
								<p>
									Sans se démonter, le jeune homme soutient votre regard avant de répondre.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
									<div class="bulleperso">
										<p>
											Parce que le parchemin seul ne vous permettra pas de trouver ce que vous cherchez.
											Il faut savoir comment le lire et je suis le seul à le pouvoir, Louis m\'a appris comment le...
										</p>
									</div>
								</div>
								<p>
									Avant qu\'il ne termine sa phrase, un bruit à quelques mètres derrière vous attire votre attention.<br>
									<br>
									À deux tables de vous, une bagarre est en train d\'éclater entre 3 hommes.
									Ce n\'est pas une chose rare dans ce genre d\'établissement, mais vous savez que tout peut déraper très rapidement.<br>
									Le gamin a l\'air terrifié et perdu au milieu de tout ça.
									Vous envisagez d\'en profiter pour lui récupérer la carte et poursuivre votre chemin mais, pour une raison qui vous échappe, vous vous ravisez.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Viens gamin, on va continuer cette discussion ailleurs.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Vous vous retournez vers lui et vous apprêtez à récupérer votre arme.
								</p>
								<center>
									<form action="embrouilles" method="post">
										<input type="text" name="danger"><input type="submit" name="react" value="Réagir.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['react']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['danger'])))
								{
									case "attention":
										echo'
											<audio src="/escaperpg/sons/ambria/tavernehommetombe.mp3" autoplay></audio>
											<p>
												Vous réagissez juste à temps pour éviter le corps de l\'un des hommes qui a été propulsé vers vous et qui se vautre sur votre table, la renversant.
												Tout ce qui se trouvait dessus, dont votre sabre, se trouve maintenant au sol, derrière le type qui commence à se relever.<br>
												Le chaos créé a manifestement dérangé les personnes à la table voisine car l\'un des hommes qui y était installé s\'est maintenant redressé et, l\'alcool aidant sûrement, cherche à présent à en découdre.<br>
												<br>
												Arrivant juste derrière le jeune homme qui détient la carte, il s\'apprête à le dégager sans ménagement pour entrer dans la mêlée, un couteau à la main.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Petit, <span class="mdp2">derrière toi</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Sans prendre le temps de vérifier s\'il a eu le temps de se pousser, vous vous jetez en avant pour récupérer votre arme et donnez un coup de pommeau au type qui s\'était écroulé sur vous, l\'assommant pour le coup.
											</p>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="bagarre"><input type="submit" name="battre" value="Réagir.">
												</form>
											</center>
										';
										$_SESSION['mdp4'] = true;
										break;
									default:
										echo'
											<audio src="/escaperpg/sons/ambria/tavernehommetombe.mp3" autoplay></audio>
											<p>
												Vous vous retournez une seconde trop tard.<br>
												<br>
												Propulsé par un type bâti comme une armoire à glace, l\'un des combattants vous retombe lourdement dessus, vous faisant chuter et renversant la table avec tout ce qui se trouvait dessus, dont votre arme.<br>
												Repoussant l\'homme dans un grognement, vous vous redressez. Le coup reçu a dû vous cogner plus fort que vous ne le pensiez et vous sentez une douleur au niveau de la hanche.
												Vous allez sans doute boiter pendant un petit moment après cela.<br>
												<br>
												La scène a manifestement dérangé les personnes à la table voisine car l\'un des hommes qui y était installé s\'est maintenant redressé et, l\'alcool aidant sûrement, cherche à présent à en découdre.<br>
												<br>
												Arrivant juste derrière le jeune homme qui détient la carte, il s\'apprête à le dégager sans ménagement pour entrer dans la mêlée, un couteau à la main.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Petit, <span class="mdp2">derrière toi</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Sans prendre le temps de vérifier s\'il a eu le temps de se pousser, vous récupérez votre sabre qui se trouvait au sol et donnez un coup de pommeau au type qui s\'était écroulé sur vous, l\'assommant pour le coup.
											</p>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="bagarre"><input type="submit" name="battre" value="Réagir.">
												</form>
											</center>
										';
										$_SESSION['mdp4'] = true;
										$_SESSION['sullivanconfiance'] -= 10;
								}
						}
					elseif (isset ($_POST['battre']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['bagarre'])))
								{
									case "baissezvous":
										echo'
											<audio src="/escaperpg/sons/ambria/sullivanesquivecoup.mp3" autoplay></audio>
											<p>
												Vous vous baissez juste à temps pour éviter un coup de tabouret porté par un homme dans votre dos.<br>
												Vous retournant aussitôt, lame en main, vous donnez un coup fatal qui éventre l\'homme, déversant ses intestins sur le sol.
												Dans un hoquet, celui-ci tente maladroitement de rattraper ses organes avant de succomber.<br>
												De son côté, le jeune garçon semble s\'être ragaillardi et est aux prises avec un type faisant presque le double de sa taille.<br>
												<br>
												Finalement, ce petit a plus de ressources qu\'il n\'y paraît.<br>
												Esquivant les poings et les chopes lancées à travers la salle, donnant quelques coups de sabre pour dissuader la foule de vous chercher querelle, vous avancez petit à petit vers la sortie.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Gamin, ne reste pas là, <span class="mdp2">on sort</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="sortir"><input type="submit" name="partir" value="Sortir.">
												</form>
											</center>
										';
										$_SESSION['mdp5'] = true;
										break;
									default:
										echo'
											<audio src="/escaperpg/sons/ambria/sullivanprendcoup.mp3" autoplay></audio>
											<p>
												Vous n\'arrivez pas bien à comprendre ce que vous crie le jeune homme et tardez à réagir.<br>
												<br>
												Dans votre dos, un type s\'est armé d\'un tabouret et s\'en sert à présent comme d\'une masse pour frapper ce qui l\'entoure.
												Vous ne voyez pas le coup venir et vous constatez tout juste que vous êtes sa prochaine cible.<br>
												Vous vous baissez juste à temps pour éviter le gros de l\'attaque, mais l\'arme improvisée heurte violemment votre tempe, vous sonnant quelques instants et ouvrant une plaie d\'où s\'écoule un long filet de sang.<br>
												Vous faites quelques pas en arrière, le temps de reprendre vos esprits puis, lame en main, vous partez à l\'assaut donner un coup fatal qui éventre l\'homme, déversant ses intestins sur le sol.
												Dans un hoquet, celui-ci tente maladroitement de rattraper ses organes avant de succomber.<br>
												De son côté, le jeune garçon semble s\'être ragaillardi et est aux prises avec un type faisant presque le double de sa taille.<br>
												<br>
												Finalement, ce petit a plus de ressources qu\'il n\'y paraît.<br>
												Esquivant les poings et les chopes lancées à travers la salle, donnant quelques coups de sabre pour dissuader la foule de vous chercher querelle, vous avancez petit à petit vers la sortie.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Gamin, ne reste pas là, <span class="mdp2">on sort</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="sortir"><input type="submit" name="partir" value="Sortir.">
												</form>
											</center>
										';
										$_SESSION['mdp5'] = true;
										$_SESSION['sullivanconfiance'] -= 20;
								}
						}
					elseif (isset ($_POST['partir']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['sortir'])))
								{
									case "compris":
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
												Vous sortez de la taverne, laissant derrière-vous le vacarme de la confrontation qui ne s\'est toujours pas arrêtée.<br>
												Quelques cris de douleur et des bruits de verre brisé sont les dernières choses que vous entendez alors que vous vous dirigez vers les docks, le garçon quelques pas derrière.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Bon... tu peux m\'expliquer ce qu\'il s\'est passé là-bas ?
														Pourquoi tout le monde s\'est lancé à se battre comme ça, t\'as parlé de la carte à qui ?
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="embrouilles" method="post">
													<input type="submit" name="seloigner" value="Suivant.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Ce n\'est manifestement pas la réponse attendue.
											</p>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="sortir"><input type="submit" name="partir" value="Sortir.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['loganreponse']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['logannom'])))
								{
									case "logan":
										echo'
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Logan. Logan Barthélémy.
													</p>
												</div>
											</div>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														D\'accord.<br>
														<br>
														Viens avec moi, on retourne aux docks pour embarquer sur mon vaisseau avant que quelqu\'un ne nous tombe dessus.
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Vous reprenez votre route en vous dirigeant vers les docks, où se trouve le Surgisseur des Tempêtes, votre navire.<br>
												À chaque intersection, vous observez autour de vous pour vérifier que personne n\'essaye de vous tendre une embuscade.
												Vous êtes rapidement partis de la taverne et avez ainsi gagné une précieuse avance, mais avec vos diverses recherches de la journée, le pire peut arriver.<br>
												Par moments, vous avez l\'impression d\'entendre l\'écho de pas dans les rues calmes de la ville.
											</p>
											<center>
												<form action="embarquement" method="post">
													<input type="submit" name="suite2" value="Suivant.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Êtes-vous sûr d\'avoir bien compris sa réponse ?
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Bon... C\'est quoi ton nom ?
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="embrouilles" method="post">
													<input type="text" name="logannom"><input type="submit" name="loganreponse" value="Suivant.">
												</form>
												<form action="embrouilles" method="post">
													<button type="submit" name="indice1" class="boutonindice"></button>
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['seloigner']) OR $_SESSION['seloigner'])
						{
							echo'
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
									<div class="bulleperso">
										<p>
											J-Je n\'en ai pas parlé !
											Je venais tout juste d\'arriver et je ne savais pas trop à qui...
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Ouais, ok, j\'ai compris.<br>
											<br>
											Dans tous les cas, l\'histoire va vite se répandre. Si on ne se dépêche pas on va avoir toute la ville sur nous...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Vous vous arrêtez subitement et vous retournez vers lui, braquant votre regard d\'acier dans le sien.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Tu t\'es pas trop mal débrouillé là-dedans.
											Je vais te laisser ta chance...
											Tu embarques sur mon vaisseau, tu nous aides avec la carte et tu auras ta part du butin, comme de droit.<br>
											<br>
											Mais écoute-moi bien : tu vas devoir te plier à la vie à bord, participer aux différentes tâches et te faire accepter par le reste de l\'équipage.<br>
											Si tu te fais tuer par un membre de l\'équipage ou que tu bascules par-dessus bord, ou si tu traînes un tant soit peu la patte, je t\'abandonne, c\'est clair ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Il vous regarde, l\'air déterminé, tout en acquiesçant d\'un signe de tête.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Bon... C\'est quoi ton nom ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<center>
									<form action="embrouilles" method="post">
										<input type="text" name="logannom"><input type="submit" name="loganreponse" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['seloigner'] = true;
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Vous avez demandé le nom de votre interlocuteur. Quel est-il ?
										</div>
										<center>
											<form action="embrouilles" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Vous avez demandé le nom de votre interlocuteur. Quel est-il ?<br>
											Il suffit de noter le prénom de ce personnage, incarné par le second joueur.
										</div>
										<center>
											<form action="embrouilles" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div class="reponse">
											La réponse est "Logan".
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="embrouilles" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					else
						{
							echo'
								<p>
									Le jeune homme déglutit péniblement en regardant fixement votre sabre sur la table.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
									</div>
									<div class="bulleperso">
										<p>
											Je... Je ne veux pas de problème.<br>
											<br>
											Écoutez, tout ce que je cherche, c\'est à partir d\'ici.
											Je n\'ai plus aucune attache. Je veux partir...
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Et qu\'est-ce que ça peut me faire, tes histoires ?
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
											Je sais, je sais !<br>
											<br>
											Écoutez, j\'ai quelque chose que vous voulez, vous avez ce que je recherche...
											Ce que je vous demande, c\'est d\'embarquer avec vous, rien de plus.
											En paiement, je vous offre le contenu de ma bourse. Et la carte.
										</p>
									</div>
								</div>
								<p>
									Vous vous penchez en avant, le regardant droit dans les yeux.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Alors dis-moi... Pourquoi je ne te trancherais pas la gorge à l\'instant pour te prendre cette carte ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<center>
									<form action="embrouilles" method="post">
										<input type="submit" name="suite2" value="Suivant.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
