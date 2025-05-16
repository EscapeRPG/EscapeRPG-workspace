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
		<title>Le Gardien - Le Trésor d'Ambria</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/ambria/loganbarthelemymini.png" rel="lightbox[logan]" title="Logan Barthélémy"><img src="/escaperpg/images/ambria/loganbarthelemymini.png"></a>
				<div id="inventairefooter"><input type="submit" onclick="inventaireshow()" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" onclick="mdpshow()" value="NOTES"></div>
				<a href="/escaperpg/aventures/ambria/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['repondre']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Il... <span class="mdp2">Il a bougé</span> !
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
											Comment ça, "il a bougé" ?
										</p>
									</div>
								</div>
								<p>
									Avant que vous n\'ayez le temps de lui répondre, une nouvelle secousse se fait ressentir.
									C\'est alors que la statue se met à se relever.<br>
									<br>
									Levant d\'abord un bras, le colosse se meut lentement.<br>
									Le capitaine vous attrape par l\'épaule et vous pousse sur le côté alors que la statue lève une jambe, puis l\'autre, pour se redresser et sortir de son emplacement.<br>
									Sullivan s\'écarte prestement pour se mettre hors de danger et hurle à ses hommes de se préparer à l\'affrontement.<br>
									<br>
									Le golem d\'or tourne sa tête pour observer autour de lui, comme pour évaluer la situation.<br>
									Il braque alors son visage dans votre direction.
									En vous poussant, le capitaine vous a involontairement séparé du reste du groupe. La créature commence à lever son énorme bras et s\'apprête manifestement à frapper.<br>
									<br>
									Vous devez agir. Et vite.
								</p>
								<center>
									<form action="gardien" method="post">
										<input type="submit" name="combattre" value="Combattre.">
									</form>
								</center>
							';
							$_SESSION['mdp9'] = true;
						}
					elseif (isset ($_POST['combatfin']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/gardien.png"><span><u><b>Défense obsolète !</b></u><br>Vaincre le terrible gardien de la cité</span>';
							$scenario = 'ambria';
							$description = 'gardien';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							switch (str_replace($search, $replace, stripslashes($_POST['combatfini'])))
								{
									case "toutvabien":
										if ($_SESSION['loganblesse'])
											{
												echo'
													<audio src="/escaperpg/sons/ambria/golemfinreussi.mp3" autoplay></audio>
													<p>
														La détonation claque dans l\'air et vous apercevez à peine les petits éclats en provenance du monstre, où la balle a touché.
														Une explosion sourde retentit alors et il s\'écroule au sol, soulevant un épais nuage de poussière.<br>
														<br>
														Tout le monde prend quelques secondes pour réaliser ce qui vient de se passer et reprendre son souffle.<br>
														Vous entendez alors le capitaine demander aux hommes de vous venir en aide.<br>
														<br>
														Rapidement, ils reviennent de l\'ancienne place du marché avec une épaisse corde qu\'ils vous envoient.<br>
														Profitant des créneaux ceignant la terrasse, vous faites un solide nœud dont Barthy serait certainement fier et descendez en rappel.<br>
														<br>
														Le capitaine s\'approche de vous pour vous demander si ça va.
													</p>
													<div class="dialogue">
														<div class="bulleperso2">
															<p>
																Je me suis fait un peu mal en retombant, mais je suis toujours debout, c\'est le principal.
															</p>
														</div>
														<div class="portrait2">
															<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
														</div>
													</div>
													<p>
														Sullivan émet un petit rire.
													</p>
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
														</div>
														<div class="bulleperso">
															<p>
																Parfait ! On devrait plus avoir trop d\'problème maintenant.<br>
																<br>
																Mais faites quand même gaffe quand on sera à l\'intérieur, qui sait si ceux qu\'étaient là avant ont pas laissé un piège ou deux...
															</p>
														</div>
													</div>
													<p>
														Sans plus attendre, vous entrez à l\'intérieur.
													</p>
													<center>
														<form action="pyramide" method="post">
															<input type="submit" name="entrer" value="Entrer.">
														</form>
													</center>
												';
											}
										else
											{
												echo'
													<audio src="/escaperpg/sons/ambria/golemfinreussi.mp3" autoplay></audio>
													<p>
														La détonation claque dans l\'air et vous apercevez à peine les petits éclats en provenance du monstre, où la balle a touché.
														Une explosion sourde retentit alors et il s\'écroule au sol, soulevant un épais nuage de poussière.<br>
														<br>
														Tout le monde prend quelques secondes pour réaliser ce qui vient de se passer et reprendre son souffle.<br>
														Vous entendez alors le capitaine demander aux hommes de vous venir en aide.<br>
														<br>
														Rapidement, ils reviennent de l\'ancienne place du marché avec une épaisse corde qu\'ils vous envoient.<br>
														Profitant des créneaux ceignant la terrasse, vous faites un solide nœud dont Barthy serait certainement fier et descendez en rappel.<br>
														<br>
														Le capitaine s\'approche de vous pour vous demander si ça va.
													</p>
													<div class="dialogue">
														<div class="bulleperso2">
															<p>
																Plus de peur que de mal, capitaine, mais je vous avoue espérer ne plus jamais revivre ce genre d\'aventure !
															</p>
														</div>
														<div class="portrait2">
															<img src="/escaperpg/images/ambria/loganbarthelemymini.png">
														</div>
													</div>
													<p>
														Sullivan émet un petit rire.
													</p>
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
														</div>
														<div class="bulleperso">
															<p>
																Parfait ! On devrait plus avoir trop d\'problème maintenant.<br>
																<br>
																Mais faites quand même gaffe quand on sera à l\'intérieur, qui sait si ceux qu\'étaient là avant ont pas laissé un piège ou deux...
															</p>
														</div>
													</div>
													<p>
														Sans plus attendre, vous entrez à l\'intérieur.
													</p>
													<center>
														<form action="pyramide" method="post">
															<input type="submit" name="entrer" value="Entrer.">
														</form>
													</center>
												';
											}
										break;
									case "riendecasse":
										if ($_SESSION['loganblesse'])
											{
												echo'
													<audio src="/escaperpg/sons/ambria/golemfinrate.mp3" autoplay></audio>
													<p>
														La détonation claque dans l\'air et vous apercevez à peine les petits éclats en provenance du monstre, où la balle a touché.<br>
														Puis… rien.<br>
														<br>
														Le colosse achève de se relever et frappe du poing la terrasse où vous vous trouviez, la faisant s\'écrouler.<br>
														Vous retombez lourdement au sol au milieu des décombres et vous vous relevez aussitôt, miraculeusement indemne.<br>
														<br>
														Relevant la tête, vous voyez que le golem est en train de tendre son énorme main vers vous, comme pour vous saisir.
														Vous vous raidissez sur place, ne sachant que faire, quand soudain le reste de l\'équipage lui envoie une volée de balles, tous ayant sorti leur pistolet.<br>
														L\'un des gars fait mouche et vous entendez comme une sorte d\'explosion étouffée tandis que le colosse se stoppe.<br>
														<br>
														Une ou deux secondes passent, semblant durer une éternité. Et puis il s\'écroule au sol, soulevant un épais tapis de poussière vous obligeant à vous protéger les yeux de votre bras.<br>
														<br>
														Lorsque le nuage s\'évapore, vous constatez que la statue est redevenue inerte et que ce gardien de la cité est maintenant vaincu.<br /<
														<br>
														Sullivan s\'approche de vous pour savoir si vous vous êtes fait mal.<br>
														Encore choqué, vous vous contentez de secouer la tête en signe de dénégation.
													</p>
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
														</div>
														<div class="bulleperso">
															<p>
																Parfait ! On devrait plus avoir trop d\'problème maintenant.<br>
																<br>
																Mais faites quand même gaffe quand on sera à l\'intérieur, qui sait si ceux qu\'étaient là avant ont pas laissé un piège ou deux...
															</p>
														</div>
													</div>
													<p>
														Sans plus attendre, vous entrez à l\'intérieur.
													</p>
													<center>
														<form action="pyramide" method="post">
															<input type="submit" name="entrer" value="Entrer.">
														</form>
													</center>
												';
											}
										else
											{
												echo'
													<audio src="/escaperpg/sons/ambria/golemfinrate.mp3" autoplay></audio>
													<p>
														La détonation claque dans l\'air et vous apercevez à peine les petits éclats en provenance du monstre, où la balle a touché.<br>
														Puis… rien.<br>
														<br>
														Le colosse achève de se relever et frappe du poing la terrasse où vous vous trouviez, la faisant s\'écrouler.<br>
														Vous retombez lourdement au sol au milieu des décombres et vous vous relevez aussitôt, miraculeusement indemne.<br>
														<br>
														Relevant la tête, vous voyez que le golem est en train de tendre son énorme main vers vous, comme pour vous saisir.
														Vous vous raidissez sur place, ne sachant que faire, quand soudain le reste de l\'équipage lui envoie une volée de balles, tous ayant sorti leur pistolet.<br>
														L\'un des gars fait mouche et vous entendez comme une sorte d\'explosion étouffée tandis que le colosse se stoppe.<br>
														<br>
														Une ou deux secondes passent, semblant durer une éternité. Et puis il s\'écroule au sol, soulevant un épais tapis de poussière vous obligeant à vous protéger les yeux de votre bras.<br>
														<br>
														Lorsque le nuage s\'évapore, vous constatez que la statue est redevenue inerte et que ce gardien de la cité est maintenant vaincu.<br /<
														<br>
														Sullivan s\'approche de vous pour savoir si vous vous êtes fait mal.<br>
														Encore choqué, vous vous contentez de secouer la tête en signe de dénégation, même si vous n\'êtes pas tout à fait sûr de ne pas vous être cassé quelque chose...
													</p>
													<div class="dialogue">
														<div class="portrait">
															<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
														</div>
														<div class="bulleperso">
															<p>
																Parfait ! On devrait plus avoir trop d\'problème maintenant.<br>
																<br>
																Mais faites quand même gaffe quand on sera à l\'intérieur, qui sait si ceux qu\'étaient là avant ont pas laissé un piège ou deux...
															</p>
														</div>
													</div>
													<p>
														Sans plus attendre, vous entrez à l\'intérieur.
													</p>
													<center>
														<form action="pyramide" method="post">
															<input type="submit" name="entrer" value="Entrer.">
														</form>
													</center>
												';
											}
										break;
									default:
										echo'
											<p>
												Avez-vous bien entendu ce que le capitaine vous a dit ?
											</p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/ambria/golem3logan.png">
											</div>
											<p>
												Alors que le golem commence à se redresser, vous voyez le capitaine tendre son bras armé d\'un pistolet en direction de sa tête. Que pouvez-vous faire pour vous assurer de détruire la créature ?
											</p>
											<center>
												<form action="gardien" method="post">
													<input type="text" name="combatfini"><input type="submit" name="combatfin" value="Suivant.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['golem2']) OR $_SESSION['combat3'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/golem3logan.png">
								</div>
								<p>
									Alors que le golem commence à se redresser, vous voyez le capitaine tendre son bras armé d\'un pistolet en direction de sa tête. Que pouvez-vous faire pour vous assurer de détruire la créature ?
								</p>
								<center>
									<form action="gardien" method="post">
										<input type="text" name="combatfini"><input type="submit" name="combatfin" value="Suivant.">
									</form>
								</center>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Le capitaine n\'aura qu\'une seule chance de mettre fin à ce combat. Avez-vous moyen de l\'aider ?
										</div>
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Le capitaine n\'aura qu\'une seule chance de mettre fin à ce combat. Avez-vous moyen de l\'aider ?<br>
											Observez bien ce que vous voyez. Y a-t-il quelque chose qui semble intéressant ?
										</div>
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Le capitaine n\'aura qu\'une seule chance de mettre fin à ce combat. Avez-vous moyen de l\'aider ?<br>
											Observez bien ce que vous voyez. Y a-t-il quelque chose qui semble intéressant ?<br>
											Essayez de voir avec le capitaine si vous avez des éléments qui se ressemblent.
										</div>
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="indice4" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice4']))
								{
									echo'
										<div id="indice">
											Le capitaine n\'aura qu\'une seule chance de mettre fin à ce combat. Avez-vous moyen de l\'aider ?<br>
											Observez bien ce que vous voyez. Y a-t-il quelque chose qui semble intéressant ?<br>
											Essayez de voir avec le capitaine si vous avez des éléments qui se ressemblent.<br>
											L\'une des tours au loin a quelque chose de différent.
										</div>
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div class="reponse">
											Dites au capitaine de tirer sur la quatrième gemme du front.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
						}
					elseif (isset ($_POST['grimper']) OR $_SESSION['combat2'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
								<div id="golem2logan">
									<img src="/escaperpg/images/ambria/golem2logan.png">
								</div>
								<p>
									Le colosse bouge énormément, ce qui rend l\'ascension difficile.<br /<
									<br>
									Quel chemin prendre pour arriver à son point faible ?
								</p>
								<center>
									<button id="bouton1" class="rondbleu" onclick="digicode1()"></button>
									<button id="bouton2" class="carrebleu" onclick="digicode2()"></button>
									<button id="bouton3" class="trianglebleu" onclick="digicode3()"></button>
									<button id="bouton4" class="rondrouge" onclick="digicode4()"></button>
									<button id="bouton5" class="carrerouge" onclick="digicode5()"></button>
									<button id="bouton6" class="trianglerouge" onclick="digicode6()"></button>
									<button id="bouton7" class="rondvert" onclick="digicode7()"></button>
									<button id="bouton8" class="carrevert" onclick="digicode8()"></button>
									<button id="bouton9" class="trianglevert" onclick="digicode9()"></button>
									<button id="bouton10" class="rondjaune" onclick="digicode10()"></button>
									<button id="bouton11" class="carrejaune" onclick="digicode11()"></button>
									<button id="bouton12" class="trianglejaune" onclick="digicode12()"></button>
								</center>
								<div id="panneau">
									<span class="hidden">.</span>
								</div>
								<div id="panneaucache" class="hidden">
								</div>
								<br>
								<center>
									<button type="submit" name="reset" onclick="reset()" class="noway">Réinitialiser.</button>
									<br>
									<br>
									<button type="submit" name="valider" onclick="check()" class="noway">Valider.</button>
								</center>
								<script src="/escaperpg/aventures/ambria/logan/scripts/digicode.js"></script>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Vous cherchez à grimper le plus haut et le plus vite possible. Par quelle séquence de gemmes passez-vous ?
										</div>
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Vous cherchez à grimper le plus haut et le plus vite possible. Par quelle séquence de gemmes passez-vous ?<br>
											Sullivan doit sans doute pouvoir vous aider à savoir quel chemin emprunter.
										</div>
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="indice3" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice3']))
								{
									echo'
										<div id="indice">
											Vous cherchez à grimper le plus haut et le plus vite possible. Par quelle séquence de gemmes passez-vous ?<br>
											Sullivan doit sans doute pouvoir vous aider à savoir quel chemin emprunter.<br>
											Sullivan doit pouvoir vous indiquer une succession de couleur. Regardez à chaque étage quelle forme correspond à cette couleur et retapez la séquence avant de valider.
										</div>
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div class="reponse">
											La bonne séquence est : triangle rouge - carré bleu - carré jaune - rond rouge - carré jaune - rond vert - rond bleu - triangle vert.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="gardien" method="post">
												<button type="submit" name="indice" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							$_SESSION['combat2'] = true;
						}
					elseif (isset ($_POST['surveiller']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['ecouter'])))
								{
									case "epaule":
										echo'
											<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
											<p>
												Alors que votre compagnon s\'élance pour attaquer, le monstre semble pressentir le danger et se retourne.
												Armant son bras, il balaie la zone où se trouvait le capitaine qui fait un roulé-boulé pour esquiver.<br>
												<br>
												Vous ne savez pas s\'il a réussi à s\'en sortir mais ne prenez pas le temps d\'en avoir le cœur net.<br>
												Bondissant en avant, vous vous agrippez à la cheville de la statue et commencez à escalader son corps.<br>
												<br/>
												Heureusement pour vous, de nombreuses aspérités et pierres précieuses saillantes vous offrent de parfaites prises.
											</p>
											<center>
												<form action="gardien" method="post">
													<input type="submit" name="grimper" value="Escalader.">
												</form>
											</center>
										';
										break;
									default:
										echo'
											<p>
												Avez-vous bien entendu ce que le capitaine vous a dit ?
											</p>
											<center>
												<form action="gardien" method="post">
													<input type="text" name="ecouter"><input type="submit" name="surveiller" value="Agir.">
												</form>
											</center>
										';
								}
						}
					elseif (isset ($_POST['combattre']) OR $_SESSION['combat'])
						{
							echo'
								<audio src="/escaperpg/sons/ambria/gardien.mp3" autoplay></audio>
								<div id="enigmelieu">
									<img src="/escaperpg/images/ambria/golem1logan.png">
								</div>
								<p>
									Le golem s\'apprête à vous frapper. Derrière lui, vous voyez le capitaine s\'apprêter à attaquer. Vous espérez pouvoir l\'aider, mais comment trouver son point faible ?
								</p>
								<center>
									<form action="gardien" method="post">
										<input type="text" name="ecouter"><input type="submit" name="surveiller" value="Agir.">
									</form>
								</center>
							';
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Avez-vous remarqué les motifs sur le corps du golem ?
										</div>
										<center>
											<form action="gardien" method="post">
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
											Sullivan voit l\'autre côté du colosse et vous aidera à suivre le chemin.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="gardien" method="post">
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
									<br>
									Quant à vous, vous approchez l\'immense statue qui semble intacte.<br>
									Composée d\'or pur et sertie de magnifiques pierres précieuses, elle semble confirmer la puissance et la richesse de la civilisation qui vivait ici...
									Du moins, avant son mystérieux déclin.<br>
									<br>
									Vous vous perdez quelques instants dans vos pensées, la main posée contre la statue quand soudain, vous sentez une vibration sous votre peau.<br>
									Vous faites instinctivement quelques pas en arrière, blêmissant.<br>
									<br>
									Que vient-il de se passer ?<br>
									<br>
									Le capitaine semble avoir remarqué quelque chose.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Logan ? Y a que\'que chose qui va pas ?
										</p>
									</div>
								</div>
								<center>
									<form action="gardien" method="post">
										<input type="submit" name="repondre" value="Lui répondre.">
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
