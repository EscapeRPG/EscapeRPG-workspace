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
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/navigationile.php"; ?>
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
					elseif (isset ($_POST['terreferme']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/plage.mp3" autoplay></audio>
								<p>
									Après avoir fêté votre arrivée à destination, vous vous hissez sur un tonneau et intimez le silence à vos hommes réunis autour de vous.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Allez, bande de forbans, il est temps d\'aller explorer cette île et trouver ce maudit trésor !<br>
											Par groupes de deux, sillonnez les environs et gueulez dès que vous avez quelque chose !<br>
											<br>
											Au boulot !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Formant rapidement les équipes, les hommes ne tardent pas à s\'éparpiller le long de la plage ou dans la dense jungle qui la borde.<br>
									Accompagné de Logan, vous vous mettez également à fouiller les alentours à la recherche du moindre indice permettant de découvrir le chemin vers la cité d\'Ambria.<br>
									<br>
									Au loin, vous apercevez une immense montagne entourée de jungle.
									Des contreforts semblent également former un rempart immense à ce gigantesque édifice naturel.
									Pour sûr, cela semble être l\'endroit idéal où bâtir une cité mythique. Toutefois, la jungle se révèle trop impénétrable pour espérer vous y rendre par là.<br>
									<br>
									C\'est alors que vous entendez l\'un de vos hommes vous appeler en beuglant, un peu plus loin.
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
									À côté de chacune des entrées, des idoles semblent vouloir garder le passage. Leur hideuse gueule incitant à la prudence.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Parfait, ça doit être le chemin qui mène à la cité ! Bien joué les gars, vous aurez droit à une ration de gnôle supplémentaire quand on reviendra avec le trésor !<br>
											<br>
											Maintenant, il faut savoir quelle ouverture prendre.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
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
									Désignant du doigt, le marin vous montre une inscription gravée dans la roche.<br>
									Toutefois, vous ne savez pas quelle en est la langue.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Faites venir Jake, il s\'y connaît bien. Il devrait pouvoir nous traduire ce charabia.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
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
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Tu peux le traduire ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
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
							if ($_SESSION['pertehomme'] == false)
							{
								echo'<div id="succespopup">';
								$nouveausucces = '<img src="/escaperpg/images/succes/ambria/prudence.png"><span><u><b>La prudence avant tout</b></u><br>En tant que Sullivan, ne perdre aucun membre d\'équipage dans les pièges de l\'île</span>';
								$scenario = 'ambria';
								$description = 'prudence';
								$cache = 'oui';
								$rarete = 'succesgold';
								include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
								echo'</div>';
								
							}
							echo '
								<audio src="/escaperpg/sons/ambria/grottetorcheallume.mp3" autoplay></audio>
								<p>
									Vous avancez prudemment avec le reste de votre équipe jusqu\'à l\'entrée de la grotte.<br>
									Rien ne semblant se passer, vous franchissez le seuil et vous engouffrez dans les ténèbres.
									Rapidement, l\'obscurité régnante vous empêche de voir quoi que ce soit.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Passez-moi une torche.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Les hommes vous en tendent alors une qu\'ils avaient pris la précaution de récupérer au campement, plus tôt.
									L\'allumant à l\'aide de votre briquet à amadou, vous inondez le corridor d\'une vive lumière, vous faisant cligner un instant des yeux.<br>
									<br>
									La troupe avance petit à petit, longeant les couloirs sinueux s\'enfonçant dans la roche, sans toutefois trouver la trace d\'une sortie.<br>
									Au bout d\'un moment, vous arrivez devant une intersection et deux chemins s\'offrent à vous.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Jake, Logan et Lloyd, vous prenez à droite. Les autres, avec moi.<br>
											<br>
											Si vous trouvez quelque chose, envoyez l\'un d\'entre vous me prévenir.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									D\'un hochement de tête, les trois gaillards vont dans la direction que vous leur avez indiquée.<br>
									Vous consultez ceux qui sont restés avec vous et constatez la lueur si particulière qui brille dans leurs yeux, que vous remarquez à chaque fois que vous vous apprêtez à faire main basse sur un trésor.<br>
									<br>
									Menant la marche, vous empruntez dans le couloir de gauche.
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
											Alors que vous approchez de la grotte, l\'un de vos hommes, pressé par l\'appât du gain, vous devance légèrement.<br>
											Lorsqu\'il franchit l\'entrée, vous entendez un claquement sec, typique d\'une corde qui rompt, et n\'avez même pas le temps de hurler au malheureux de revenir en arrière que des piques acérées surgissent des parois,
											le transperçant et le tuant sur le coup.<br>
											<br>
											Manifestement, l\'avertissement au-dessus des cavernes était on ne peut plus réel.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Merde !<br>
													Avancez pas les gars, c\'est un foutu piège.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
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
									$_SESSION['sullivanconfiance'] -= 20;
								}
							elseif (isset($_POST['2grotte']))
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grotteflechettes.mp3" autoplay></audio>
										<p>
											Vous dirigeant vers la seconde entrée, vous vous enfoncez dans le corridor obscur.<br>
											Au bout de quelques pas, suivi par vos hommes, vous entendez derrière vous un léger déclic.<br>
											<br>
											Vous retournant, vous apercevez que l\'un des forbans regarde le sol à ses pieds avec une curieuse expression sur le visage.
											Le temps semblant alors ralentir, vous le voyez relever la tête et croiser votre regard, ses yeux s\'agrandissant de terreur.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													SORTEZ TOUS D\'ICI !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Avant que quiconque n\'ait le temps d\'agir, des dizaines de flèches sont tirées des murs autour de vous.<br>
											Courant en baissant la tête au maximum, vous vous ruez vers l\'extérieur, priant les dieux des océans pour ne pas être touché.<br>
											<br>
											Une fois sorti, vous vous retournez et constatez que tout le monde a réussi à en réchapper... à l\'exception de celui qui a marché sur la dalle piégée, activant le mécanisme mortel.<br>
											<br>
											Jurant entre vos dents, vous allez vous installer sur un rocher non loin pour reprendre votre souffle et constatez qu\'une flèche s\'est plantée dans votre chapeau, manquant votre crâne de quelques centimètres à peine.<br>
											<br>
											Il semblerait que vous n\'ayez pas choisi judicieusement le chemin à emprunter.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="grottesenigme" value="Réessayer.">
											</form>
										</center>
									';
									$_SESSION['sullivanconfiance'] -= 20;
								}
							elseif (isset($_POST['3grotte']))
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grottetrou.mp3" autoplay></audio>
										<p>
											Vous indiquez du doigt le troisième passage et, précédé de quelques-uns de vos hommes, vous y dirigez.<br>
											Alors que vous approchez de l\'entrée, le gaillard qui se trouve à la tête marche sur un épais tapis de feuilles qui lâche soudainement sous son poids, le faisant chuter.
											Le pauvre pousse un cri de surprise qui est coupé net lorsqu\'il atteint le fond et s\'empale sur des branches de bois taillées en pointe au fond, lui transperçant le corps.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													PAS UN PAS DE PLUS ! ON RECULE !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
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
									$_SESSION['sullivanconfiance'] -= 20;
								}
							elseif (isset($_POST['5grotte']))
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grotteeboulis.mp3" autoplay></audio>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													On va essayer par là.
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Désignant du menton la cinquième caverne, vous commencez à vous diriger, deux de vos membres d\'équipage passant les premiers.<br>
											<br>
											Alors que vous franchissez le seuil de la grotte, vous voyez l\'un des types devant vous se figer et baisser la tête pour regarder le sol.<br>
											Suivant son regard, vous avez tout juste le temps de remarquer une fine cordelette sur le sol avant qu\'un terrible grondement ne secoue l\'endroit.<br>
											<br>
											Soudain, d\'énormes morceaux de roche commencent à tomber du plafond.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													DÉGUERPISSEZ DE LÀ !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Réagissant un fragment de seconde trop tard, l\'homme de tête n\'a pas le temps d\'exécuter votre ordre et se retrouve aussitôt enseveli sous un tas de gravats de près de deux fois sa taille.
											Le malheureux n\'a même pas le temps de crier et disparaît sous les décombres.<br>
											<br>
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
									$_SESSION['sullivanconfiance'] -= 20;
								}
							else
								{
									echo '
										<audio src="/escaperpg/sons/ambria/grottevapeur.mp3" autoplay></audio>
										<p>
											Vous vous dirigez vers la dernière entrée, silencieux.<br>
											<br>
											Vos hommes s\'approchent de vous.
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
											Hochant la tête et émettant un grognement, vous confirmez votre décision.<br>
											L\'un des gaillards les plus costauds se frotte alors avidement les mains et commence à s\'engouffrer dans l\'ouverture.
											Vous le suivez prudemment, vos sens aux aguets.<br>
											Au bout de quelques mètres à peine, le type devant vous s\'arrête net et vous entendez alors un déclic suivi d\'un grondement sourd semblant parcourir les murs.
											Un jet de vapeur surgit alors juste devant vous, où se trouve votre homme qui se met soudain à crier puis à tousser.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Merde c\'est un piège ! TOUT L\'MONDE DEHORS !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Vous revenez sur vos pas et réapparaissez dans la clairière, devant les six entrées.<br>
											<br>
											Vous vous retournez pour vérifier que votre homme vous a suivi.<br>
											Titubant, se tenant la gorge et émettant d\'horribles borborygmes, vous le voyez sortir peu à peu des ténèbres et entrer dans la lumière chaude du soleil.
											Vous croisez alors son regard. Les yeux exorbités et rouges, votre infortuné compagnon tente manifestement de prendre sa respiration sans y parvenir.<br>
											Vous constatez alors les cloques qui se forment sur sa peau, sur son visage.
											Il tire une langue bleue et gonflée, semblant chercher désespérément à inspirer, puis s\'effondre sur le sable, face contre terre.
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
									$_SESSION['sullivanconfiance'] -= 20;
								}
							$_SESSION['pertehomme'] = true;
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
							if ($_SESSION['matcasse'] OR $_SESSION['quillecassee'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/plagedebarque.mp3" autoplay></audio>
										<p>
											Laissant les marins ramer pour vous mener à destination, vous vous rendez dans votre cabine.<br>
											Vous profitez des quelques minutes que la manœuvre prendra pour récupérer votre équipement et vous reposer après la terrible épreuve que vous venez de surmonter.<br>
											<br>
											Au bout d\'un moment, vous sentez le navire ralentir puis une petite secousse vous indique que le navire se trouve maintenant sur la berge.<br>
											On frappe alors à votre porte.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/timonier.png">
											</div>
											<div class="bulleperso">
												<p>
													Cap\'taine, on est arrivés.
												</p>
											</div>
										</div>
										<p>
											Vous ressortez sur le pont et vous dirigez vers la petite troupe qui s\'est amassée devant le planchon pour vous permettre de mettre pied à terre.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Bravo les gars ! Je veux que quelques hommes restent là pour effectuer les réparations. Les autres, vous nous suivrez avec Logan pour explorer l\'île.<br>
													Mais d\'abord, ouvrez-moi un de ces tonneaux de rhum, double ration de tafia pour tout le monde !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Sous les hourras de l\'équipage, vous descendez le premier et foulez du pied le sable fin de la plage.<br>
											Le reste de l\'équipage ne tarde pas à vous suivre et installe un petit campement tout en savourant joyeusement leur verre d\'alcool.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="terreferme" value="Suivant.">
											</form>
										</center>
									';
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/plagedebarque.mp3" autoplay></audio>
										<p>
											Laissant la barre au timonier, vous vous rendez dans votre cabine tandis que les matelots s\'activent jovialement à leur tâche, menant habilement le Surgisseur des Tempêtes entre les énormes colonnes de pierre
											gardant la baie.<br>
											Vous profitez des quelques minutes que la manœuvre prendra pour récupérer votre équipement et vous reposer après la terrible épreuve que vous venez de surmonter.<br>
											<br>
											Au bout d\'un moment, vous sentez le navire ralentir puis entendez le son typique de l\'ancre brisant les flots et coulant vers le fond.<br>
											On frappe alors à votre porte.
										</p>
										<div class="dialogue">
											<div class="portrait">
												<img src="/escaperpg/images/ambria/timonier.png">
											</div>
											<div class="bulleperso">
												<p>
													Cap\'taine, on est arrivés. La chaloupe vous attend.
												</p>
											</div>
										</div>
										<p>
											Vous ressortez sur le pont et vous dirigez vers l\'une des barques devant laquelle l\'équipage s\'est amassé.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Vous quatre là et toi Logan, vous montez avec moi. Paul, Jean et Henri, vous restez sur le bateau. Les autres, vous vous répartissez les chaloupes et vous nous suivez.<br>
													Oubliez pas d\'emmener un des tonneaux de rhum, double ration de tafia pour tout le monde une fois là-bas !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<p>
											Sous les hourras de l\'équipage, vous montez à bord de la chaloupe, suivi de Logan et de quatre autres membres d\'équipage.
											L\'embarcation est ensuite mise à l\'eau et les hommes rament avec ardeur vers une plage non loin de là.<br>
											<br>
											Après quelques minutes, la chaloupe arrive enfin sur la berge, où vous foulez du pied le sable fin.
											Le reste de l\'équipage ne tarde pas à vous suivre et installe un petit campement tout en savourant joyeusement leur verre d\'alcool.
										</p>
										<center>
											<form action="plage" method="post">
												<input type="submit" name="terreferme" value="Suivant.">
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
