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
		<title>La Plage - Le Trésor d'Ambria</title>
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
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/logan/includes/navigationile.php"; ?>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['portescite'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
								<p>
									Vous revenez sur la plage, après avoir traversé les grottes, espérant y trouver quelque chose pour vous aider à passer l\'immense porte de la cité.<br>
									<br>
									Vous vous approchez du campement de marins et prenez un instant pour boire un peu d\'eau et vous rafraîchir un peu.
									Le soleil brille dans le ciel, brûlant.<br>
									<br>
									Un matelot vous apostrophe pour savoir s\'il peut vous aider, mais vous lui dites que tout va bien.<br>
									<br>
									Il ne semble rien y avoir d\'intéressant par ici.
								</p>
							';
						}
					elseif (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
								<p>
									Après avoir fêté votre arrivée à destination, le capitaine se hisse sur une caisse et intime le silence aux hommes réunis en cercle autour de lui.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Allez, bande de forbans, il est temps d\'aller explorer cette île et trouver ce maudit trésor !<br>
											<br>
											Par groupes de deux, sillonnez les environs et gueulez dès que vous avez quelque chose ! Au boulot !
										</p>
									</div>
								</div>
								<p>
									Formant rapidement les équipes, les hommes ne tardent pas à s\'éparpiller le long de la plage ou dans la dense jungle qui la borde.<br>
									Vous suivez le capitaine et fouillez les alentours à la recherche du moindre indice permettant de découvrir le chemin vers la cité d\'Ambria.<br>
									<br>
									Au loin, vous apercevez une immense montagne entourée de jungle. Des contreforts semblent également former un rempart immense à ce gigantesque édifice naturel.<br>
									Pour sûr, cela semble être l\'endroit idéal où bâtir une cité mythique.
									Toutefois, la jungle se révèle trop impénétrable pour espérer vous y rendre par là.<br>
									<br>
									C\'est alors que vous entendez l\'un des hommes appeler en beuglant, un peu plus loin.<br>
									<br>
									Sans attendre, vous rebroussez chemin et vous dirigez en direction des cris.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											Capitaine ! Je crois qu\'on a trouvé quelque chose. V\'nez par ici !
										</p>
									</div>
								</div>
								<p>
									Vous suivez l\'homme au milieu des arbres et débouchez dans une sorte de clairière.
								</p>
								<center>
									<form action="plage" method="post">
										<input type="submit" name="grottes" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['grottes']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
								<p>
									Devant vous se dresse une falaise vertigineuse au pied de laquelle plusieurs cavités semblent mener droit vers le cœur de l\'île.
									À côté de chacune des entrées, des idoles semblent vouloir garder le passage. Leur hideuse gueule incitant à la prudence.<br>
									<br>
									Sullivan semble ravi, pour autant que son air patibulaire puisse le laisser paraître.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Parfait, ça doit être le chemin qui mène à la cité ! Bien joué les gars, vous aurez droit à une ration de gnôle supplémentaire quand on reviendra avec le trésor !<br>
											<br>
											Maintenant, il faut savoir quelle ouverture prendre.
										</p>
									</div>
								</div>
								<p>
									Tout le monde observe pensivement les différentes cavités, quand soudain l\'un des hommes s\'écrie.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/matelots.png">
									</div>
									<div class="bulleperso">
										<p>
											R\'gardez, Cap\'. Y a que\'que chose qu\'est marqué au-d\'ssus.
										</p>
									</div>
								</div>
								<p>
									Désignant du doigt, le marin montre une inscription gravée dans la roche.<br>
									Toutefois, vous ne savez pas quelle en est la langue.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Faites venir Jake, il s\'y connaît bien. Il devrait pouvoir nous traduire ce charabia.
										</p>
									</div>
								</div>
								<p>
									Hochant la tête, l\'un des hommes part en courant en direction de la plage.<br>
									Quelques minutes plus tard, vous le voyez revenir accompagné de Jake, qui s\'empresse de lire ce qui est inscrit.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Hum... Laissez-moi un instant.<br>
											<br>
											Ça semble être un genre de tahitien, ou peut-être du pa\'umotu.
										</p>
									</div>
								</div>
								<p>
									Vous pouvez lire l\'exaspération se dessiner sur le visage du capitaine.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Tu peux le traduire ?
										</p>
									</div>
								</div>
								<p>
									Jake sursaute, comme tiré de ses pensées.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Bien sûr, Capitaine ! J\'ai connu une fille sur les îles qui m\'a appris... Enfin bref. Donnez-moi juste une seconde.
										</p>
									</div>
								</div>
								<p>
									Il se plonge alors dans une réflexion muette.<br>
									<br>
									Au bout d\'un assez long moment, il se retourne vers vous, un sourire fier sur le visage.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/jake.png">
									</div>
									<div class="bulleperso">
										<p>
											Ça y est, je pense avoir bien saisi ce que ça dit.
										</p>
									</div>
								</div>
								<center>
									<form action="plage" method="post">
										<input type="submit" name="grottesenigme" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['4grotte'])) // bonne réponse
						{
							echo '
								<audio src="/escaperpg/sons/ambria/grottetorcheallume.mp3" autoplay></audio>
								<p>
									Vous avancez prudemment avec le reste de l\'équipe jusqu\'à l\'entrée de la grotte.<br>
									Rien ne semblant se passer, vous franchissez le seuil et vous engouffrez dans les ténèbres.
									Rapidement, l\'obscurité régnante vous empêche de voir quoi que ce soit.<br>
									<br>
									Le capitaine se tourne vers le petit groupe rassemblé derrière lui.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Passez-moi une torche.
										</p>
									</div>
								</div>
								<p>
									Les hommes lui en tendent alors une qu\'ils avaient pris la précaution de récupérer au campement, plus tôt.<br>
									<br>
									L\'allumant, le corridor est inondé d\'une vive lumière, vous faisant cligner un instant des yeux.<br>
									La troupe avance petit à petit, longeant les couloirs sinueux s\'enfonçant dans la roche, sans toutefois trouver la trace d\'une sortie.<br>
									<br>
									Au bout d\'un moment, vous arrivez devant une intersection et deux chemins s\'offrent à vous.<br>
									<br>
									Le capitaine se retourne une nouvelle fois vers vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Jake, Logan et Lloyd, vous prenez à droite. Les autres, avec moi.<br>
											<br>
											Si vous trouvez quelque chose, envoyez l\'un d\'entre vous me prévenir.
										</p>
									</div>
								</div>
								<p>
									Tous hochent la tête et vous vous enfoncez dans le couloir de droite tandis que le capitaine et les autres partent vers la gauche.
								</p>
								<center>
									<form action="grottestorchesallumees" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['1grotte']) OR isset($_POST['2grotte']) OR isset($_POST['3grotte']) OR isset($_POST['5grotte']) OR isset($_POST['6grotte'])) // mauvaise réponse, un mec meurt
						{
							if (isset($_POST['1grotte']))
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grottepiques.mp3" autoplay></audio>
										<p>
											Vous vous dirigez vers la première cavité.<br>
											<br>
											Alors que vous approchez de la grotte, l\'un des hommes, pressé par l\'appât du gain, vous devance légèrement.<br>
											Lorsqu\'il franchit l\'entrée, vous entendez un claquement sec, typique d\'une corde qui rompt,
											et n\'avez même pas le temps de hurler au malheureux de revenir en arrière que des piques acérées surgissent des parois, le transperçant et le tuant sur le coup.<br>
											<br>
											Manifestement, l\'avertissement au-dessus des cavernes était on ne peut plus réel.<br>
											Le capitaine ordonne à tout le monde de battre en retraite.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													Merde !<br>
													Avancez pas les gars, c\'est un foutu piège.
												</p>
											</div>
										</div>
										<p>
											Il va falloir mieux étudier le message pour savoir quelle entrée emprunter.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="grottesenigme" value="Réessayer.">
											</form>
										</center>
									';
									$_SESSION['loganconfiance'] -= 20;
								}
							elseif (isset($_POST['2grotte']))
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grotteflechettes.mp3" autoplay></audio>
										<p>
											Vous dirigeant vers la seconde entrée, vous vous enfoncez dans le corridor obscur.<br>
											<br>
											Au bout de quelques pas, vous entendez derrière vous un léger déclic.<br>
											Vous retournant, vous apercevez que l\'un des matelots regarde le sol à ses pieds avec une curieuse expression sur le visage.
											Le temps semblant alors ralentir, vous le voyez relever la tête et croiser votre regard, ses yeux s\'agrandissant de terreur.<br>
											<br>
											Le capitaine hurle soudain
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													SORTEZ TOUS D\'ICI !
												</p>
											</div>
										</div>
										<p>
											Avant que quiconque n\'ait le temps d\'agir, des dizaines de flèches sont tirées des murs autour de vous.<br>
											Courant en baissant la tête au maximum, vous vous ruez vers l\'extérieur, priant pour ne pas être touché.<br>
											<br>
											Une fois sorti, vous vous retournez et constatez que tout le monde a réussi à en réchapper... à l\'exception de celui qui a marché sur la dalle piégée, activant le mécanisme mortel.<br>
											<br>
											Le capitaine jure entre ses dents et part s\'installer sur un rocher non loin pour reprendre son souffle et retirer la flèche qui s\'est plantée dans son chapeau.<br>
											<br>
											Il semblerait que vous n\'ayez pas choisi judicieusement le chemin à emprunter.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="grottesenigme" value="Réessayer.">
											</form>
										</center>
									';
									$_SESSION['loganconfiance'] -= 20;
								}
							elseif (isset($_POST['3grotte']))
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grottetrou.mp3" autoplay></audio>
										<p>
											Sullivan pointe du doigt le troisième passage et, précédé de quelques-uns des hommes, commence à s\'y diriger.<br>
											<br>
											Alors que vous approchez de l\'entrée, le gaillard qui se trouve à la tête marche sur un épais tapis de feuilles qui lâche soudainement sous son poids, le faisant chuter.
											Le pauvre pousse un cri de surprise qui est coupé net lorsqu\'il atteint le fond et s\'empale sur des branches de bois taillées en pointe au fond, lui transperçant le corps.<br>
											<br>
											Le capitaine ouvre grand les bras pour empêcher quiconque de continuer d\'avancer.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													PAS UN PAS DE PLUS ! ON RECULE !
												</p>
											</div>
										</div>
										<p>
											Rebroussant chemin, vous revenez au milieu de la clairière et étudiez de nouveau l\'inscription au-dessus des grottes pour espérer trouver la bonne entrée sans qu\'une autre catastrophe n\'advienne.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="grottesenigme" value="Réessayer.">
											</form>
										</center>
									';
									$_SESSION['loganconfiance'] -= 20;
								}
							elseif (isset($_POST['5grotte']))
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grotteeboulis.mp3" autoplay></audio>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													On va essayer par là.
												</p>
											</div>
										</div>
										<p>
											Désignant du menton la cinquième caverne, Sullivan comme à s\'y diriger, deux des membres d\'équipage passant devant lui.<br>
											<br>
											Vous les suivez et, alors que vous franchissez le seuil de la grotte, vous voyez l\'un des types devant vous se figer et baisser la tête pour regarder le sol.<br>
											Suivant son regard, vous avez tout juste le temps de remarquer une fine cordelette sur le sol avant qu\'un terrible grondement ne secoue l\'endroit.<br>
											<br>
											Soudain, d\'énormes morceaux de roche commencent à tomber du plafond.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													DÉGUERPISSEZ DE LÀ !
												</p>
											</div>
										</div>
										<p>
											Réagissant un fragment de seconde trop tard, l\'homme de tête n\'a pas le temps d\'exécuter l\'ordre du capitaine et se retrouve aussitôt enseveli sous un tas de gravats de près de deux fois sa taille.
											Le malheureux n\'a même pas le temps de crier et disparaît sous les décombres.<br>
											Vous ressortez aussi vite que possible avant que le reste de la caverne ne vous tombe dessus.<br>
											<br>
											Il va falloir être plus prudents si vous ne voulez pas finir votre aventure ici.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="grottesenigme" value="Réessayer.">
											</form>
										</center>
									';
									$_SESSION['loganconfiance'] -= 20;
								}
							else
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grottevapeur.mp3" autoplay></audio>
										<p>
											Sullivan se dirige vers la dernière entrée, silencieux.<br>
											<br>
											Les hommes s\'approchent de lui.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/matelots.png">
											</div>
											<div class="bulleperso">
												<p>
													Vous pensez que c\'est par là, Cap\' ?
												</p>
											</div>
										</div>
										<p>
											Hochant la tête et émettant un grognement, il semble confirmer.<br>
											<br>
											L\'un des gaillards les plus costauds se frotte alors avidement les mains et commence à s\'engouffrer dans l\'ouverture.<br>
											Vous le suivez prudemment, vos sens aux aguets.<br>
											<br>
											Au bout de quelques mètres à peine, le type devant vous s\'arrête net et vous entendez alors un déclic suivi d\'un grondement sourd semblant parcourir les murs.<br>
											Un jet de vapeur surgit alors juste devant vous, où se trouve l\'homme qui se met soudain à crier puis à tousser.<br>
											<br>
											Le capitaine vous pousse alors en arrière.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													Merde c\'est un piège ! TOUT L\'MONDE DEHORS !
												</p>
											</div>
										</div>
										<p>
											Vous revenez sur vos pas et réapparaissez dans la clairière, devant les six entrées.
											Vous vous retournez pour voir si l\'autre marin vous a suivi.<br>
											<br>
											Titubant, se tenant la gorge et émettant d\'horribles borborygmes, vous le voyez sortir peu à peu des ténèbres et entrer dans la lumière chaude du soleil.<br>
											Vous croisez alors son regard. Les yeux exorbités et rouges, votre infortuné compagnon tente manifestement de prendre sa respiration sans y parvenir.
											Vous constatez alors les cloques qui se forment sur sa peau, sur son visage.
											Il tire une langue bleue et gonflée, semblant chercher désespérément à inspirer, puis s\'effondre sur le sable, face contre terre.<br>
											<br>
											Après quelques soubresauts, il se fige à tout jamais.<br>
											<br>
											Votre choix ne semblait pas judicieux, il va falloir revoir votre jugement.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="grottesenigme" value="Réessayer.">
											</form>
										</center>
									';
									$_SESSION['loganconfiance'] -= 20;
								}
						}
					elseif (isset ($_POST['grottesenigme']) OR $_SESSION['grottesenigme'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/grottesentree.png">
									<div id="grotte1">
										<form action="plage" method="post">
											<button type="submit" name="1grotte">
												<img src="/escaperpg/images/ambria/grotte1.png">
											</button>
										</form>
									</div>
									<div id="grotte2">
										<form action="plage" method="post">
											<button type="submit" name="2grotte">
												<img src="/escaperpg/images/ambria/grotte2.png">
											</button>
										</form>
									</div>
									<div id="grotte3">
										<form action="plage" method="post">
											<button type="submit" name="3grotte">
												<img src="/escaperpg/images/ambria/grotte3.png">
											</button>
										</form>
									</div>
									<div id="grotte4">
										<form action="plage" method="post">
											<button type="submit" name="4grotte">
												<img src="/escaperpg/images/ambria/grotte4.png">
											</button>
										</form>
									</div>
									<div id="grotte5">
										<form action="plage" method="post">
											<button type="submit" name="5grotte">
												<img src="/escaperpg/images/ambria/grotte5.png">
											</button>
										</form>
									</div>
									<div id="grotte6">
										<form action="plage" method="post">
											<button type="submit" name="6grotte">
												<img src="/escaperpg/images/ambria/grotte6.png">
											</button>
										</form>
									</div>
								</div>
								<p>
									Jake vous indique la signification de l\'inscription :<br>
									<center>
										- "Devant vous se trouve la piste d\'Ambria, mais un seul de ces chemins vous y conduira.<br>
										- À ses gardiens vous devrez vous fier, pour enfin trouver le bon accès.<br>
										- Suivez le monstre aux yeux de jade et finie sera votre croisade.<br>
										- Si vous êtes guidés par l\'or, vous n\'y trouverez que votre mort.<br>
										- Les portes s\'ouvriront aux méritants, protégés de leur gardien volant."
									</center>
									<br>
									Quelle entrée devez-vous choisir ?
								</p>
							';
							$_SESSION['grottesenigme'] = true;
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Suivez bien les consignes énoncées par Jake et étudiez les statues pour savoir quelle entrée choisir.
										</div>
										<center>
											<form action="plage" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Suivez bien les consignes énoncées par Jake et étudiez les statues pour savoir quelle entrée choisir.<br>
											Procédez par élimination. Essayez de trouver les statues qui indiquent un passage mortel et celles auxquelles vous pouvez vous fier.
										</div>
										<center>
											<form action="plage" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Suivez bien les consignes énoncées par Jake et étudiez les statues pour savoir quelle entrée choisir.<br>
											Procédez par élimination. Essayez de trouver les statues qui indiquent un passage mortel et celles auxquelles vous pouvez vous fier.<br>
											Il vous faut trouver deux statues sûres entourant un passage. Vous pourrez alors y entrer. Plusieurs statues correspondent à cette description mais seul un passage est gardé par deux d\'entre elles.
										</div>
										<center>
											<form action="plage" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div class="reponse">
											Prenez le quatrième passage pour continuer votre chemin.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="plage" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					else
						{
							if ($_SESSION['quillecassee'] OR $_SESSION['matcasse'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/plagedebarque.mp3" autoplay></audio>
										<p>
											Le capitaine retourne à ses quartiers tandis que vous aidez les marins à ramer,
											répondant aux ordres des vigies qui indiquent comment faire pour amener le navire sur la berge où l\'on pourra procéder aux réparations.<br>
											Au terme de nombreux efforts, vous entendez un cri au-dessus de vous indiquant de jeter l\'ancre. Vous êtes arrivés, enfin.<br>
											<br>
											Vous remontez sur le pont en attendant que le capitaine rejoigne l\'équipage, pendant que quelques hommes installent le planchon pour permettre de descendre sur la plage.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													Bravo les gars !
													Je veux que quelques hommes restent là pour effectuer les réparations.<br>
													Les autres, vous nous suivrez avec Logan pour explorer l\'île.<br>
													<br>
													Mais d\'abord, ouvrez-moi un de ces tonneaux de rhum, double ration de tafia pour tout le monde !
												</p>
											</div>
										</div>
										<p>
											Sous les hourras de l\'équipage, Sullivan descend le premier et foule du pied le sable fin de la plage.<br>
											Le reste des hommes et vous ne tardez pas à le suivre avant d\'installer un petit campement.
										</p>
									';
								}
							else
								{
									echo'
										<p>
											Le capitaine retourne à ses quartiers tandis que le timonier amène le Surgisseur des Tempêtes au milieu de la baie.<br>
											L\'opération ne dure que quelques minutes avec l\'équipage qui s\'attèle joyeusement à la tâche, heureux d\'avoir survécu et plus heureux encore d\'avoir trouvé la mythique île.<br>
											<br>
											Au bout d\'un moment, l\'ancre est jetée et Jake va chercher le capitaine.
											Pendant ce temps, vous rejoignez le reste de l\'équipage qui s\'est amassé près des barques, avide de poser le pied sur le sable chaud de la plage.<br>
											<br>
											Le capitaine s\'approche.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
											<div class="bulleperso">
												<p>
													Vous quatre là et toi Logan, vous montez avec moi.<br>
													Paul, Jean et Henri, vous restez sur le bateau.<br>
													Les autres, vous vous répartissez les chaloupes et vous nous suivez.<br>
													<br>
													Oubliez pas d\'emmener un des tonneaux de rhum, double ration de tafia pour tout le monde une fois là-bas !
												</p>
											</div>
										</div>
										<p>
											Sous les hourras de l\'équipage, vous montez à bord de la chaloupe.
											L\'embarcation est ensuite mise à l\'eau et vous ramez avec ardeur vers la plage.<br>
											<br>
											Après quelques minutes, la chaloupe arrive enfin sur la berge, où vous foulez du pied le sable fin. Le reste de l\'équipage ne tarde pas à vous suivre et installe un petit campement.
										</p>
									';
								}
							if ($_SESSION['rhum'])
								{
									echo'
										<p>
											Deux types costauds amènent alors un tonneau que vous reconnaissez aussitôt : il s\'agit de celui que vous avez empêché de passer par-dessus bord lors de la tempête !<br>
											<br>
											Si vous aviez décidé autrement, la fête aurait eu un goût bien différent.
										</p>
									';
									if ($_SESSION['loganaide'])
										{
											echo'
												<p>
													Les deux matelots que vous aviez aidé à briquer le pont viennent alors vers vous en vous tendant deux verres supplémentaires.
												</p>
												<div class="dialogue">
													<div class="portrait">
														<img src="/escaperpg/images/ambria/matelots.png">
													</div>
													<div class="bulleperso">
														<p>
															Chose promise, chose due ! Profite bien mon gars, t\'as bien travaillé !
														</p>
													</div>
												</div>
											';
										}
								}
							elseif ($_SESSION['riz'])
								{
									echo'
										<p>
											Des hommes retournent sur le navire pour chercher le rhum et mettent un peu de temps à revenir.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/matelots.png">
											</div>
											<div class="bulleperso">
												<p>
													Désolé les gars, le gros de la cargaison de rhum est passée par-dessus bord, il nous reste presque p\'us qu\'ça.
												</p>
											</div>
										</div>
										<p>
											Ils désignent un petit tonnelet et tout l\'équipage soupire de désespoir.<br>
											<br>
											Vous comprenez qu\'avoir choisi de sauver le tonneau de riz lors de la tempête n\'était peut-être pas la meilleure idée pour souffler un peu après de tels événements.
										</p>
									';
								}
							echo'
								<center>
									<form action="plage" method="post">
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
