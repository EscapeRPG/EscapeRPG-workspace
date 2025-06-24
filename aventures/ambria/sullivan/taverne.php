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
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationtortuga.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['ambriabibliotheque'])
						{
							if (isset ($_POST['discuter']))
								{
									switch (str_replace($search, $replace, stripslashes($_POST['loganreponse'])))
										{
											case "quietesvous":
												echo'
													<audio src="/escaperpg/sons/ambria/epeeposee.mp3" autoplay></audio>
													<p>
														Vous attrapez une chaise et vous asseyez en face de lui.
													</p>
													<div class="dialogue">
														<div class="bulleperso2">
															<p>
																Alors tu n\'as pas entendu parler de moi ?
																Le Capitaine Sullivan Mason, ça te parle ?<br>
																<br>
																Mais peu importe, tu as quelque chose que je recherche, et je ne suis pas du genre patient.
																Donne-moi le parchemin.
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
																Le Capitaine... ?<br>
																Je... Je ne vois pas de quoi vous voulez parler !
															</p>
														</div>
													</div>
													<p>
														Vous vous penchez en avant. Vous avez déjà passé trop de temps sur ce maudit caillou à la recherche de ce papier.<br>
														Vous tirez votre lame au clair et la posez violemment sur la table, faisant sursauter votre interlocuteur.
													</p>
													<div class="dialogue">
														<div class="bulleperso2">
															<p>
																J\'ai pas le temps de jouer, gamin.
																Tu sais très bien de quoi je parle.
															</p>
														</div>
														<div class="portrait2">
															<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
														</div>
													</div>
													<center>
														<form action="embrouilles" method="post">
															<input type="submit" name="suite" value="Suivant.">
														</form>
													</center>
												';
												break;
											default:
												echo'
													<p>
														Ça ne semble pas être ça. Peut-être devez-vous attendre une information de la part de ce jeune homme, incarné par l\'autre joueur ?<br>
														<br>
														Vous vous approchez de la table à laquelle un jeune homme à l\'air paniqué s\'est installé.<br>
														Ce dernier regarde dans toutes les directions, tel un animal apeuré.<br>
														<br>
														En arrivant au niveau de la table, vous jetez la bourse qui atterrit juste devant lui en déversant un peu de son contenu.
													</p>
													<div class="dialogue">
														<div class="bulleperso2">
															<p>
																<span class="mdp2">C\'est à toi je crois</span>.
															</p>
														</div>
														<div class="portrait2">
															<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
														</div>
													</div>
													<p>
														Vous attendez de voir sa réaction, tout en affichant votre célèbre sourire de prédateur.
													</p>
													<center>
														<form action="taverne" method="post">
															<input list="notesListe" name="loganreponse"><input type="submit" name="discuter" value="Discuter.">
														</form>
														<form action="taverne" method="post">
															<button type="submit" name="indice3" class="boutonindice"></button>
														</form>
													</center>
												';
										}
								}
							elseif (isset ($_POST['tavernlogan']) OR $_SESSION['mdp3'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/boursejetee.mp3" autoplay></audio>
										<p>
											Vous vous approchez de la table à laquelle un jeune homme à l\'air paniqué s\'est installé.<br>
											Ce dernier regarde dans toutes les directions, tel un animal apeuré.<br>
											<br>
											En arrivant au niveau de la table, vous jetez la bourse qui atterrit juste devant lui en déversant un peu de son contenu.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													<span class="mdp2">C\'est à toi je crois</span>.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Vous attendez de voir sa réaction, tout en affichant votre célèbre sourire de prédateur.
										</p>
										<center>
											<form action="taverne" method="post">
												<input list="notesListe" name="loganreponse"><input type="submit" name="discuter" value="Discuter.">
											</form>
										</center>
									';
									$_SESSION['mdp3'] = true;
									if (isset ($_POST['indice']))
										{
											echo'
												<div id="indice">
													Qu\'est-ce que le jeune homme vous a répondu ?
												</div>
												<center>
													<form action="taverne" method="post">
														<button type="submit" name="indice4" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['indice4']))
										{
											echo'
												<div id="indice">
													Qu\'est-ce que le jeune homme vous a répondu ?<br>
													C\'est à l\'autre joueur de vous donner le bon mot de passe.
												</div>
												<center>
													<form action="taverne" method="post">
														<button type="submit" name="reponse2" class="boutonreponse"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['reponse2']))
										{
											echo'
												<div class="reponse">
													Entrez le mot de passe "qui êtes-vous".
												</div>
											';
										}
									else
										{
											echo'
												<center>
													<form action="taverne" method="post">
														<button type="submit" name="indice" class="boutonindice"></button>
													</form>
												</center>
											';
										}
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/taverne.mp3" autoplay></audio>
										<div id="enigmelieu">
											<img src="/escaperpg/images/ambria/taverne.png">
											<div id="tavlogan">
												<form action="taverne" method="post">
													<button type="submit" name="tavernlogan">
														<img src="/escaperpg/images/ambria/tavernelogan.png">
													</button>
												</form>
											</div>
										</div>
										<p>Vous entrez dans la taverne et avisez les différentes personnes présentes, à la recherche de quelqu\'un qui pourrait sembler anxieux.</p>
									';
									if (isset ($_POST['indice']))
										{
											echo'
												<div id="indice">
													Essayez de repérer la personne que recherche Sullivan et de cliquer dessus.
												</div>
												<center>
													<form action="taverne" method="post">
														<button type="submit" name="indice2" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['indice2']))
										{
											echo'
												<div id="indice">
													Essayez de repérer la personne que recherche Sullivan et de cliquer dessus.<br>
													Cherchez quelqu\'un qui dénote dans le décor, et qui n\'a pas pu prendre de verre vu que c\'est vous qui avez sa bourse.
												</div>
												<center>
													<form action="taverne" method="post">
														<button type="submit" name="reponse" class="boutonreponse"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['reponse']))
										{
											echo'
												<div class="reponse">
													Cliquez sur le jeune homme qui est assis à la table au fond à gauche, avec la chemise bleue.
												</div>
											';
										}
									else
										{
											echo'
												<center>
													<form action="taverne" method="post">
														<button type="submit" name="indice" class="boutonindice"></button>
													</form>
												</center>
											';
										}
								}
						}
					else
						{
							if (isset ($_POST['don']) AND str_replace($search, $replace, stripslashes($_POST['don'])) == "vieuxtype" AND $_SESSION['ambriapaul'] OR $_SESSION['ambriawhisky'])
								{
									echo'
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/don.png">
											</div>
											<div class="bulleperso">
												<p>
													Alors, il vous a raconté quelque chose d\'intéressant ?<br>
													<br>
													Désolé si ça n\'est pas le cas, mais je ne vous redonnerai pas de whisky gratuitement encore une fois, n\'abusez pas de ma gentillesse pour un pauvre hère !
												</p>
											</div>
										</div>
										<center>
											<form action="taverne" method="post">
												<input list="notesListe" name="don"> <input type="submit" name="demander" value="Demander.">
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['don']))
								{
									switch (str_replace($search, $replace, stripslashes($_POST['don'])))
										{
											case "louis" :
												echo'
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/don.png">
														</div>
														<div class="bulleperso">
															<p>
																Louis ? Ah non, j\'ai aucun Louis qui bosse ici.<br>
																<br>
																Vous parlez sans doute plutôt du Louis qui bosse à la bibliothèque ?
															</p>
														</div>
													</div>
													<center>
														<form action="taverne" method="post">
															<input list="notesListe" name="don"> <input type="submit" name="demander" value="Demander.">
														</form>
													</center>
												';
												break;
											case "don" :										
												echo'
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/don.png">
														</div>
														<div class="bulleperso">
															<p>
																C\'est bien moi, oui ! Vous vouliez quelque chose ?
															</p>
														</div>
													</div>
													<center>
														<form action="taverne" method="post">
															<input list="notesListe" name="don"> <input type="submit" name="demander" value="Demander.">
														</form>
													</center>
												';
												break;
											case "vieuxtype":
												echo'
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/don.png">
														</div>
														<div class="bulleperso">
															<p>
																Ah, oui ! C\'est le vieux Paul !<br>
																Pas un mauvais bougre, mais vous ne pourrez rien tirer de lui tant qu\'il n\'a pas eu sa dose de whisky.
																Je l\'aime bien, ce vieux loup de mer.
																Tenez, vous n\'avez qu\'à lui en apporter un peu, c\'est pour moi.
															</p>
														</div>
													</div>
													<p>
														Il vous tend une bouteille avec un <span class="mdp">fond de whisky</span> de piètre qualité, à moitié vide.
													</p>
													<div id="enigme">
														<a href="/escaperpg/images/ambria/fonddewhisky.png" rel="lightbox[invent]"><img src="/escaperpg/images/ambria/fonddewhisky.png"></a>
													</div>
													<center>
														<form action="taverne" method="post">
															<input type="submit" name="add" value="Prendre.">
														</form>
													</center>
												';
												$_SESSION['mdp26'] = true;
												break;
											default:
												echo'
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/don.png">
														</div>
														<div class="bulleperso">
															<p>
																Hum... Je vois pas bien en quoi je peux vous aider à ce propos.<br>
																<br>
																Vous voulez autre chose ?
															</p>
														</div>
													</div>
													<center>
														<form action="taverne" method="post">
															<input list="notesListe" name="don"> <input type="submit" name="demander" value="Demander.">
														</form>
													</center>
												';
										}
								}
							elseif (isset ($_POST['add']))
								{
									echo'
										<p>
											<script src="/escaperpg/scripts/inventaireadd.js"></script>
											Vous prenez la bouteille avec vous.<br>
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/don.png">
											</div>
											<div class="bulleperso">
												<p>
													Je peux faire autre chose pour vous ?
												</p>
											</div>
										</div>
										<center>
											<form action="taverne" method="post">
												<input list="notesListe" name="don"> <input type="submit" name="demander" value="Demander.">
											</form>
										</center>
									';
									$_SESSION['ambriawhisky'] = true;
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/taverne.mp3" autoplay></audio>
										<p>
											En approchant de la taverne, vous entendez les rires et les chants des hommes à l\'intérieur.
											C\'est un lieu particulièrement agité et bruyant, vous aimez cette ambiance.<br>
											<br>
											Le patron du bar se tient derrière le comptoir. C\'est un grand type au ventre rebondi.<br>
											Il vous regarde alors que vous approchez.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/don.png">
											</div>
											<div class="bulleperso">
												<p>
													Je vous souhaite bien le bonjour ! Qu\'est-ce qu\'y vous faut ?
												</p>
											</div>
										</div>
										<center>
											<form action="taverne" method="post">
												<input list="notesListe" name="don"> <input type="submit" name="demander" value="Demander.">
											</form>
										</center>
									';
								}
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>
