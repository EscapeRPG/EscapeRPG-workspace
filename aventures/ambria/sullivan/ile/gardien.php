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
		<title>Le Gardien - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<div id="bloc_page">
			<nav>
				<a href="/escaperpg/images/ambria/sullivanmasonmini.png" rel="lightbox[sullivan]" title="Sullivan Mason"><img src="/escaperpg/images/ambria/sullivanmasonmini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['logan']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['attention'])))
								{
									case "ilabouge":
										echo'
											<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Comment ça, "il a bougé" ?
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<p>
												Avant que Logan n\'ait le temps de répondre, une nouvelle secousse se fait ressentir.<br>
												C\'est alors que vous le voyez, vous aussi.<br>
												<br>
												Levant d\'abord un bras, le colosse se meut lentement.
												Vous attrapez Logan par l\'épaule et le poussez sur le côté alors que la statue lève une jambe, puis l\'autre, pour se redresser et sortir de son emplacement.<br>
												Vous reculez prestement pour vous mettre hors de danger et hurlez à vos hommes de se préparer à l\'affrontement.<br>
												Le golem d\'or tourne sa tête pour observer autour de lui, comme pour évaluer la situation.
												Avisant Logan, qui s\'est retrouvé séparé du groupe, il commence à lever son énorme bras et s\'apprête manifestement à le frapper.<br>
												<br>
												Vous devez agir. Et vite.
											</p>
											<center>
												<form action="gardien.php" method="post">
													<input type="submit" name="combat" value="Combattre.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Êtes-vous sûr d\'avoir bien compris la réponse de votre compagnon ?
											</p>
											<center>
												<form action="gardien.php" method="post">
													<input type="text" name="attention"><input type="submit" name="logan" value="Prêter attention.">
												</form>
											</center>
										';
								}
						}
					elseif (isset($_POST['souffler']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
								<p>
									Hagards, vos hommes et vous contemplez la scène quelques instants, reprenant votre souffle.<br>
									Le combat que vous venez de mener n\'a sans doute pas duré plus de quelques minutes, pourtant vous n\'avez que rarement vécu de moment aussi intense.<br>
									<br>
									Certains de vos équipiers se laissent choir sur le sol, comme sonnés par ce qui vient de se passer.
									De votre côté, vous prenez un peu de recul pour tenter d\'apercevoir Logan, toujours juché sur la terrasse.<br>
									Le garçon semble choqué lui aussi, mais pas blessé. Un bon point.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Rel\'vez-vous les gars, faut qu\'on aide le p\'tit à descendre.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Quelques hommes s\'éloignent vers les restes d\'étals sur la place où ils ont déposé leur matériel un peu plus tôt, puis reviennent avec une corde qu\'ils lancent à Logan.
									Le nouveau marin s\'empresse d\'utiliser les créneaux de la terrasse comme point d\'accroche pour y faire un nœud et descendre en rappel.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Parfait !<br>
											<br>
											On devrait plus avoir trop d\'problème maintenant. Mais faites quand même gaffe quand on sera à l\'intérieur, qui sait si ceux qu\'étaient là avant ont pas laissé un piège ou deux...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Sans plus attendre, votre équipe s\'engage dans l\'entrée de la pyramide.
								</p>
								<center>
									<form action="pyramide.php" method="post">
										<input type="submit" name="suite" value="Entrer.">
									</form>
								</center>
							';
						}
					elseif (isset($_POST['souffler2']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/cite.mp3" autoplay></audio>
								<p>
									Le garçon secoue la tête négativement, encore trop essoufflé et choqué pour parler.
									Au moins n\'est-il pas blessé. Un bon point.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Parfait !<br>
											<br>
											On devrait plus avoir trop d\'problème maintenant. Mais faites quand même gaffe quand on sera à l\'intérieur, qui sait si ceux qu\'étaient là avant ont pas laissé un piège ou deux...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Sans plus attendre, votre équipe s\'engage dans l\'entrée de la pyramide.
								</p>
								<center>
									<form action="pyramide.php" method="post">
										<input type="submit" name="suite" value="Entrer.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['1golem3']) OR isset ($_POST['2golem3']) OR isset ($_POST['3golem3']) OR isset ($_POST['4golem3']) OR isset ($_POST['5golem3']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/gardien.png"><span><u><b>Défense obsolète !</b></u><br>Vaincre le terrible gardien de la cité</span>';
							$scenario = 'ambria';
							$description = 'gardien';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							if (isset ($_POST['4golem3']))
								{
									echo'
										<audio src="/escaperpg/sons/ambria/golemfinreussi.mp3" autoplay></audio>
										<p>
											Concentré au maximum, vous appuyez sur la détente et avez le temps de voir la suite des événements comme si tout se déroulait au ralenti.<br>
											Le chien qui pivote, venant percuter la lamelle de fer. L\'étincelle qui se crée et vient embraser la poudre. La détonation. La flamme et la fumée.
											La balle qui est éjectée, décrivant une trajectoire en ligne droite vers sa cible.<br>
											Puis le moment où elle la touche, faisant exploser la pierre en une myriade de fragments colorés.<br>
											<br>
											Vous entendez comme une sorte d\'explosion étouffée tandis que le colosse se raidit.
											Une ou deux secondes passent, semblant durer une éternité dans cet instant coupé du monde.<br>
											Et puis il s\'écroule au sol, soulevant un épais tapis de poussière vous obligeant à vous protéger les yeux de votre bras.
											Lorsque le nuage s\'évapore, vous constatez que la statue est redevenue inerte et que ce gardien de la cité est maintenant vaincu.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													<span class="mdp2">Tout va bien</span> les gars ?
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="gardien.php" method="post">
												<input type="submit" name="souffler" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp19'] = true;
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/golemfinrate.mp3" autoplay></audio>
										<p>
											Concentré au maximum, vous appuyez sur la détente et avez le temps de voir la suite des événements comme si tout se déroulait au ralenti.<br>
											Le chien qui pivote, venant percuter la lamelle de fer. L\'étincelle qui se crée et vient embraser la poudre. La détonation. La flamme et la fumée.
											La balle qui est éjectée, décrivant une trajectoire en ligne droite vers sa cible.<br>
											Puis le moment où elle la touche, faisant exploser la pierre en une myriade de fragments colorés.<br>
											<br>
											Et puis rien.<br>
											Le colosse achève de se relever et frappe du poing la terrasse où se trouve Logan, la faisant s\'écrouler.
											Celui-ci retombe avec et roule sur le sol, avant de se relever, quelque peu sonné mais en vie.
											Le golem se penche alors vers lui et tend la main pour le saisir. C\'est alors que le reste de l\'équipage encore présent lui envoie une volée de balles, tous ayant sorti leur pistolet.<br>
											L\'un des gars fait mouche et vous entendez comme une sorte d\'explosion étouffée tandis que le colosse se raidit.
											Une ou deux secondes passent, semblant durer une éternité.<br>
											Et puis il s\'écroule au sol, soulevant un épais tapis de poussière vous obligeant à vous protéger les yeux de votre bras.
											Lorsque le nuage s\'évapore, vous constatez que la statue est redevenue inerte et que ce gardien de la cité est maintenant vaincu.<br>
											<br>
											Vous approchez de Logan.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Ça va mon gars, <span class="mdp2">rien de cassé</span> ?
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="gardien.php" method="post">
												<input type="submit" name="souffler2" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['sullivanconfiance'] -= 20;
									$_SESSION['mdp20'] = true;
								}
						}
					elseif (isset ($_POST['combat3']) OR $_SESSION['combat3'])
					{
						echo'
							<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
							<div id="enigmelieu">
								<img src="/escaperpg/images/ambria/golem3sullivan.png">
								<div id="golem3gemme1">
									<form action="gardien.php" method="post">
										<button type="submit" name="1golem3">
											<img src="/escaperpg/images/ambria/golem3gemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golem3gemme.png\'">
										</button>
									</form>
								</div>
								<div id="golem3gemme2">
									<form action="gardien.php" method="post">
										<button type="submit" name="2golem3">
											<img src="/escaperpg/images/ambria/golem3gemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golem3gemme.png\'">
										</button>
									</form>
								</div>
								<div id="golem3gemme3">
									<form action="gardien.php" method="post">
										<button type="submit" name="3golem3">
											<img src="/escaperpg/images/ambria/golem3gemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golem3gemme.png\'">
										</button>
									</form>
								</div>
								<div id="golem3gemme4">
									<form action="gardien.php" method="post">
										<button type="submit" name="4golem3">
											<img src="/escaperpg/images/ambria/golem3gemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golem3gemme.png\'">
										</button>
									</form>
								</div>
								<div id="golem3gemme5">
									<form action="gardien.php" method="post">
										<button type="submit" name="5golem3">
											<img src="/escaperpg/images/ambria/golem3gemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golem3gemme.png\'">
										</button>
									</form>
								</div>
							</div>
							<p>
								Le golem redresse peu à peu sa tête et vous apercevez des gemmes encastrées dans son front, brillant d\'un vif éclat surnaturel.<br>
								<br>
								Peut-être que tirer dedans permettra de briser l\'enchantement permettant à la créature de se mouvoir ?
								Malheureusement, celle-ci étant en train de se redresser, la fenêtre de tir dont vous disposez est très courte et vous n\'aurez sans doute droit qu\'à un seul essai.<br>
								Vous brandissez votre pistolet et expirer lentement pour réduire au maximum les tremblements de votre main, prêt à faire feu.
							</p>
						';
						if (isset ($_POST['indice']))
							{
								echo'
									<div id="indice">
										Il vous faut tirer sur l\'une de ces gemmes, mais comment savoir laquelle ?
									</div>
									<center>
										<form action="gardien.php" method="post">
											<button type="submit" name="indice2" class="boutonindice"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['indice2']))
							{
								echo'
									<div id="indice">
										Il vous faut tirer sur l\'une de ces gemmes, mais comment savoir laquelle ?<br>
										Logan doit pouvoir vous aider.
									</div>
									<center>
										<form action="gardien.php" method="post">
											<button type="submit" name="reponse" class="boutonindice"></button>
										</form>
									</center>
								';
							}
						elseif (isset ($_POST['reponse']))
							{
								echo'
									<div id="reponse">
										Tirer sur la quatrième pierre précieuse.
									</div>
								';
							}
						else
							{
								echo'
									<center>
										<form action="gardien.php" method="post">
											<button type="submit" name="indice" class="boutonindice"></button>
										</form>
									</center>
								';
							}
						$_SESSION['combat3'] = true;
					}
					elseif (isset ($_POST['surveiller']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['ecouter'])))
								{
									case "maintenant":
										echo'
											<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
											<p>
												Souple et agile, Logan gravit peu à peu le dos de votre adversaire et parvient jusqu\'à son épaule, où une plaque semble être légèrement délogée.<br>
												Assurant ses appuis, il sort son sabre et l\'engouffre dans l\'orifice, forçant pour faire levier.
												La plaque ne tarde pas à céder et tombe lourdement au sol.<br>
												Toujours affairé à garder vos distances, vous voyez votre compagnon armer son bras et frapper de toutes ses forces dans l\'ouverture ainsi créée.<br>
												<br>
												Le golem se cabre soudainement et commence à s\'agiter en tous sens pour se débarrasser de l\'importun.
												Frappant dans son dos avec ses énormes mains comme pour chasser un vulgaire moustique, vous voyez le moment où Logan va se faire aplatir comme un insecte.<br>
												Au lieu de cela, le jeune homme est propulsé en arrière par l\'un des soubresauts et atterrit sur la terrasse surplombant l\'entrée.
												Vous espérez qu\'il a survécu au choc.<br>
												<br>
												Toujours saisie de tremblements d\'une violence rare, la statue animée finit par flancher et tombe à moitié, son immense tête frappant le sol à quelques mètres de vous.
												Cependant, votre adversaire ne semble pas vouloir s\'avouer vaincu et commence à prendre appui pour se redresser.<br>
												<br>
												C\'est alors que la voix de Logan retentit, juste au-dessus de vous.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
												</div>
												<div class="bulleperso">
													<p>
														Capitaine !<br>
														C\'est le moment de l\'achever, MAINTENANT !
													</p>
												</div>
											</div>
											<center>
												<form action="gardien.php" method="post">
													<input type="submit" name="combat3" value="Achever la créature.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Êtes-vous sûr d\'avoir bien entendu ce que votre compagnon vous a dit ou de lui avoir fourni la bonne information ?
											</p>
											<center>
												<form action="gardien.php" method="post">
													<input type="text" name="ecouter"><input type="submit" name="surveiller" value="Suivant.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['combat2']) OR $_SESSION['combat2'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/golem2sullivan.png">
								</div>
								<p>
									Les autres gars arrivent pour vous prêter main forte et, tandis que Logan s\'approche discrètement,
									vous beuglez et faites de grands mouvements pour attirer l\'attention du golem tout en prenant soin de rester à distance.<br>
									Le jeune homme finit par l\'atteindre et commence l\'ascension.
								</p>
								<center>
									<form action="gardien.php" method="post">
										<input type="text" name="ecouter"><input type="submit" name="surveiller" value="Suivant.">
									</form>
								</center>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Peut-être pouvez-vous trouver quelque chose autour de vous pour aider Logan à escalader le géant ?
										</div>
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Peut-être pouvez-vous trouver quelque chose autour de vous pour aider Logan à escalader le géant ?<br>
											Quelles sont les particularités que Logan voit de son côté qui pourraient correspondre aux informations dont vous disposez ?
										</div>
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Peut-être pouvez-vous trouver quelque chose autour de vous pour aider Logan à escalader le géant ?<br>
											Quelles sont les particularités que Logan voit de son côté qui pourraient correspondre aux informations dont vous disposez ?<br>
											Avez-vous remarqué la frise sur les colonnes ?
										</div>
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="indice4" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice4']))
								{
									echo'
										<div id="indice">
											Peut-être pouvez-vous trouver quelque chose autour de vous pour aider Logan à escalader le géant ?<br>
											Quelles sont les particularités que Logan voit de son côté qui pourraient correspondre aux informations dont vous disposez ?<br>
											Avez-vous remarqué la frise sur les colonnes ?<br>
											Logan est en train de grimper, du bas vers le haut.
										</div>
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="reponse" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="reponse">
											La bonne séquence de couleurs est rouge bleu jaune rouge jaune vert bleu vert.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['combat2'] = true;
						}
					elseif (isset ($_POST['1golem']) OR isset ($_POST['2golem']) OR isset ($_POST['3golem']))
						{
							if (isset ($_POST['1golem']))
								{
									echo'
										<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
										<p>
											Vous pensez avoir repéré un point faible mais celui-ci se trouve trop en hauteur et vous comprenez qu\'il va vous falloir escalader le corps de cette chose.<br>
											<br>
											Vous vous lancez dans sa direction, avec la ferme intention de vous agripper aux reliefs de la statue mouvante pour vous hisser.
											Malheureusement, cette dernière vous repère et balance son bras dans votre direction pour vous balayer.
											En catastrophe, vous vous stoppez net dans votre élan et effectuez un roulé-boulé pour esquiver de justesse l\'attaque meurtrière.<br>
											<br>
											Vous relevant prestement, vous constatez que votre adversaire vous fait maintenant face.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Merde !<br>
													Logan, essaye de grimper sur son dos, il a un point faible sur l\'<span class="mdp2">épaule</span> !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="gardien.php" method="post">
												<input type="submit" name="combat2" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp18'] = true;
								}
							else
								{
									echo'
										<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
										<p>
											Vous pensez avoir repéré un point faible mais celui-ci se trouve trop en hauteur et vous comprenez qu\'il va vous falloir escalader le corps de cette chose.<br>
											<br>
											Vous vous lancez dans sa direction, avec la ferme intention de vous agripper aux reliefs de la statue mouvante pour vous hisser.
											Malheureusement, cette dernière vous repère et balance son bras dans votre direction pour vous balayer.
											En catastrophe, vous tentez de vous stopper et de sauter sur le côté pour esquiver, mais trop emporté dans votre élan, vous réagissez un instant trop tard.
											Vous parvenez à échapper au gros de l\'attaque mais le golem parvient malgré tout à vous frapper au niveau de la hanche, vous envoyant bouler un peu plus loin avec une douleur fulgurante.<br>
											<br>
											Vous relevant péniblement, vous constatez du coin de l\'œil qu\'une plaque au niveau de son épaule semble légèrement défaite, révélant les mécanismes internes.
											Vous comprenez aussitôt que c\'est plutôt ici qu\'il va falloir attaquer, mais le golem se tourne pour vous faire face, à présent.
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Merde !<br>
													Logan, essaye de grimper sur son dos, il a un point faible sur l\'<span class="mdp2">épaule</span> !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="gardien.php" method="post">
												<input type="submit" name="combat2" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp18'] = true;
									$_SESSION['sullivanconfiance'] -= 10;
								}
						}
					elseif (isset ($_POST['combat']) OR $_SESSION['combat'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/golem1sullivan.png">
									<div id="golem1gemme1">
										<form action="gardien.php" method="post">
											<button type="submit" name="1golem">
												<img src="/escaperpg/images/ambria/golemgemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golemgemme.png\'">
											</button>
										</form>
									</div>
									<div id="golem1gemme2">
										<form action="gardien.php" method="post">
											<button type="submit" name="2golem">
												<img src="/escaperpg/images/ambria/golemgemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golemgemme.png\'">
											</button>
										</form>
									</div>
									<div id="golem1gemme3">
										<form action="gardien.php" method="post">
											<button type="submit" name="3golem">
												<img src="/escaperpg/images/ambria/golemgemme.png" onmouseover="this.src=\'/escaperpg/images/ambria/mire.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/golemgemme.png\'">
											</button>
										</form>
									</div>
								</div>
								<p>
									Le golem vous tournant le dos, vous vous dites que vous avez une chance de le frapper. Mais comment trouver son point faible ?
								</p>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Avez-vous remarqué les motifs sur le corps du golem ?
										</div>
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Avez-vous remarqué les motifs sur le corps du golem ?<br>
											Essayez de suivre le chemin partant du motif en forme de triangle, il vous mènera jusqu\'au point faible du monstre.
										</div>
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Avez-vous remarqué les motifs sur le corps du golem ?<br>
											Essayez de suivre le chemin partant du motif en forme de triangle, il vous mènera jusqu\'au point faible du monstre.<br>
											Logan voit l\'autre côté du colosse et vous aidera à suivre le chemin.
										</div>
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="reponse" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="reponse">
											Cliquez sur la gemme bleue.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="gardien.php" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['combat'] = true;
						}
					else
						{
							echo'
								<audio src="/escaperpg/sons/ambria/gardieneveil.mp3" autoplay></audio>
								<p>
									Vous devançant, les hommes se ruent jusqu\'au bas des marches et courent vers l\'entrée.
									Se déployant, ils foncent vers les débris des statues d\'or et commencent à récupérer les blocs les moins imposants pour les rassembler en tas, afin de les ramener lorsque vous rentrerez.<br>
									De son côté, Logan se dirige vers le colosse encore intact et l\'observe avec attention.<br>
									De votre côté, vous restez quelques instants en retrait, savourant votre triomphe tout en observant vos hommes.<br>
									<br>
									Au bout de quelques secondes, vous les rejoignez et les aidez à rassembler les blocs.
									Une fois un joli pactole fait, vous vous redressez, transpirant.
									Une légère secousse dans le sol attire soudain votre attention.
									Vous regardez autour de vous mais ne voyez aucun danger. Malgré le tremblement, le palais semble être suffisamment en bon état pour ne pas risquer de s\'écrouler.<br>
									<br>
									Vous remarquez alors que Logan semble blême, figé devant sa statue.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Logan ? Y a que\'que chose qui va pas ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<center>
									<form action="gardien.php" method="post">
										<input type="text" name="attention"><input type="submit" name="logan" value="Prêter attention.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>