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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/ambria/css/style.css">
		<meta charset="utf-8">
		<title>La Tempête - Le Trésor d'Ambria</title>
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
					if (isset ($_POST['cap']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/flots.mp3" autoplay></audio>
								<p>
									Naviguant au gré des vents, le Surgisseur des Tempêtes glisse sur les flots calmes depuis plusieurs jours maintenant.<br>
									<br>
									Logan semble s\'être bien intégré à l\'équipage et se débrouille de mieux en mieux avec les tâches quotidiennes.
									Vous vous êtes même fait la réflexion qu\'il pourrait être un bon marin et continuer de servir sous vos ordres, après cette aventure.<br>
									Parcourant le pont, vous inspectez l\'horizon et froncez les sourcils.<br>
									<br>
									Au loin, dans la direction que vous prenez, de sombres nuages obscurcissent le ciel.<br>
									Le timonier s\'approche de vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Patron, qu\'est-ce qu\'on fait ? \'m\'a tout l\'air d\'être une belle fille de chienne, là-bas.
										</p>
									</div>
								</div>
								<p>
									Quels ordres voulez-vous donner ?
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="submit" name="detour" value="Faire un détour.">
										<input type="submit" name="enavant" value="Continuer.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['detour']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/ordres.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											LA <span class="mdp2">BARRE À TRIBORD</span>, ON CONTOURNE !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Le timonier acquiesce d\'un petit mouvement de tête puis retourne à son poste.
									Le Surgisseur des Tempêtes tourne lentement pour amorcer une manœuvre d\'évitement.<br>
									Cependant, celle-ci demande du temps et la tempête se rapproche à vive allure.
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp21'] = true;
						}
					elseif (isset ($_POST['enavant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/ordres.mp3" autoplay></audio>
								<p>
									Vous le regardez droit dans les yeux.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Foutue pucelle !
											Ta mère t\'a jamais appris comment être un homme ?!<br>
											Dégage de là !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Vous le poussez sans retenue pour prendre sa place à la barre.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											<span class="mdp2">BRANLE-BAS</span>, COMPAGNONS !
											TOUT L\'MONDE À SON POSTE, J\'VEUX PAS EN VOIR UN SEUL D\'ENTRE VOUS TIRER AU FLANC, MORBLEU !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Alors que la cloche retentit pour alerter l\'équipage, vous maintenez le cap droit vers la tempête.<br>
									L\'effervescence bat son plein, certains des hommes ne peuvent s\'empêcher de regarder les nuages avec angoisse.
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="submit" name="suivant" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['sullivanconfiance'] -= 20;
							$_SESSION['mdp22'] = true;
						}
					elseif (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
								<p>
									En moins de temps que vous ne l\'auriez cru, la tempête s\'abat sur vous.<br>
									<br>
									Renversés par les bourrasques, quelques hommes tombent sur le pont tandis que les autres peinent à tenir droit.<br>
									Fouettée par le vent et la pluie, vous voyez la grand-voile se gonfler soudainement, faisant perdre l\'équilibre à un marin qui tentait de la retenir.
									Vous voyez le malheureux tomber comme une pierre au-delà du bastingage, finissant dans les eaux.<br>
									Relevant les yeux, vous apercevez Logan qui, penché sur le garde-corps, a également vu la scène.<br>
									<br>
									Vous hurlez son nom à pleins poumons, mais la pluie qui fait rage empêche le jeune homme de vous entendre.
									Criant de plus belle, vous finissez par capter son attention.<br>
									<br>
									Il va falloir faire quelque chose pour la voile.
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="submit" name="affaler" value="Affale la voile !">
										<input type="submit" name="ferler" value="Ferle la voile !">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['affaler']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempetecracks.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Logan, <span class="mdp2">affale</span> la voile, vite !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Vous voyez le garçon grimper aux haubans puis, se tenant en équilibre sur la vergue, donner du mou à la voile qui se gonfle soudain sous la force du vent.
									Le mât se met à grincer sinistrement.<br>
									<br>
									Surveillant l\'évolution de la tempête, vous voyez du coin de l\'œil que Logan s\'est installé dans la vigie et qu\'il vous crie quelque chose.<br>
									<br>
									Le mât craque de plus en plus.
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="text" name="vigie"><input type="submit" name="vague" value="L\'écouter.">
									</form>
								</center>
							';
							$_SESSION['sullivanconfiance'] -= 40;
							$_SESSION['matcasse'] = true;
							$_SESSION['mdp9'] = true;
						}
					elseif (isset ($_POST['ferler']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempetecracks.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Logan, <span class="mdp2">ferle</span> la voile, vite !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Vous voyez le garçon grimper aux haubans puis, se tenant en équilibre sur la vergue, enrouler la voile aussi rapidement que possible avant de l\'attacher avec les rabans.<br>
									<br>
									Surveillant l\'évolution de la tempête, vous voyez du coin de l\'œil que Logan s\'est installé dans la vigie et qu\'il vous crie quelque chose.
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="text" name="vigie"><input type="submit" name="vague" value="L\'écouter.">
									</form>
								</center>
							';
							$_SESSION['mdp10'] = true;
						}
					elseif (isset ($_POST['vague']))
						{
							switch (str_replace($search, $replace, stripslashes($_POST['vigie'])))
								{
									case "scelerateababord": // mauvais choix de Logan, conséquences sur l'équipage mais le capitaine fait une manœuvre de fifou qui sauve plein de mecs et qui remonte sa réputation
										echo'
											<audio src="/escaperpg/sons/ambria/scelerate.mp3" autoplay></audio>
											<p>
												Entendant les cris du jeune garçon, vous tournez aussitôt la tête vers bâbord et vous vous préparez à faire face, mais le danger ne semble pas venir de cette direction.
												Vous vous souvenez soudain que l\'un de vos hommes vous a averti que Logan, bien qu\'étant un bon élément de l\'équipage, avait tendance à confondre bâbord et tribord !<br>
												Jurant entre vos dents, vous virez la barre aussi vite que possible à tribord et apercevez le monstre qui fonce sur vous.<br>
												<br>
												La vague immense frappe alors le Surgisseur des Tempêtes de plein fouet.<br>
												Grâce aux efforts combinés de l\'équipage et vous, vous absorbez le gros de l\'impact.
												Malgré tout, plusieurs hommes sont projetés violemment contre le garde-corps, manquant de peu de passer par-dessus bord.
												La situation aurait pu être beaucoup plus dramatique si vous n\'aviez pas été un marin aussi expérimenté.<br>
												Des tonneaux se détachent cependant sous les secousses et glissent sur le bastingage, droit vers les flots déchaînés.
												Parmi ceux-ci, vous reconnaissez les réserves de riz et de rhum, mais la vitesse à laquelle ils roulent ne permettra pas aux hommes de les sauver tous.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Rattrapez <span class="mdp2">les tonneaux</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="tempete.php" method="post">
													<input type="submit" name="poursuivre" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['sullivanconfiance'] += 20;
										break;
									case "scelerateatribord": // le bon mdp
										echo'
											<audio src="/escaperpg/sons/ambria/scelerate.mp3" autoplay></audio>
											<p>
												Entendant les cris du jeune garçon, vous tournez aussitôt la tête vers tribord et vous vous préparez à faire face.<br>
												<br>
												La vague immense frappe alors le Surgisseur des Tempêtes de plein fouet.<br>
												Grâce aux efforts combinés de l\'équipage et vous, vous absorbez le gros de l\'impact.
												Malgré tout, plusieurs hommes sont projetés violemment contre le garde-corps, manquant de peu de passer par-dessus bord.
												La situation aurait pu être beaucoup plus dramatique si vous n\'aviez pas été un marin aussi expérimenté.<br>
												Des tonneaux se détachent cependant sous les secousses et glissent sur le bastingage, droit vers les flots déchaînés.
												Parmi ceux-ci, vous reconnaissez les réserves de riz et de rhum, mais la vitesse à laquelle ils roulent ne permettra pas aux hommes de les sauver tous.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Rattrapez <span class="mdp2">les tonneaux</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="tempete.php" method="post">
													<input type="submit" name="poursuivre" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['sullivanconfiance'] += 10;
										break;
									default:
										echo'
											<audio src="/escaperpg/sons/ambria/scelerate.mp3" autoplay></audio>
											<p>
												La tempête qui fait rage vous empêche de comprendre ce que Logan tente de vous dire et vous réagissez trop tard pour éviter l\'immense vague qui vient de tribord.<br>
												<br>
												La scélérate frappe le Surgisseur des Tempêtes de plein fouet.
												Tenant la barre de votre mieux, vous avez juste le temps de placer le bateau de façon à éviter le pire.<br>
												Le navire manque de peu de se retourner, mais les efforts combinés de l\'équipage et vous permettent d\'absorber le gros de l\'impact.
												Malgré tout, plusieurs hommes sont projetés hors du bâtiment ou contre le garde-corps, se brisant les os.
												Des tonneaux se détachent sous les secousses et glissent sur le bastingage, droit vers les flots déchaînés.
												Parmi ceux-ci, vous reconnaissez les réserves de riz et de rhum, mais la vitesse à laquelle ils roulent ne permettra pas aux hommes de les sauver tous.
											</p>
											<div class="dialogue">
												<div class="bulleperso2">
													<p>
														Rattrapez <span class="mdp2">les tonneaux</span> !
													</p>
												</div>
												<div class="portrait2">
													<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
												</div>
											</div>
											<center>
												<form action="tempete.php" method="post">
													<input type="submit" name="poursuivre" value="Suivant.">
												</form>
											</center>
										';
										$_SESSION['sullivanconfiance'] -= 20;
										$_SESSION['mdp11'] = true;
								}
						}
					elseif (isset ($_POST['poursuivre']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
								<p>
									Logan et les hommes se jettent sur les tonneaux pour les empêcher de passer par-dessus bord et parviennent à en rattraper quelques-uns qu\'ils s\'empressent d\'arrimer solidement.
									La pluie battante rendant le plancher du bastingage glissant et le roulement du bateau secoué par la tempête n\'aidant pas, les membres d\'équipage manquent de trébucher à chaque pas.
									Mais ces solides gaillards ont le pied marin et parviennent à tenir bon.<br>
									Sans eux, le Surgisseur des Tempêtes serait par le fond depuis longtemps.<br>
									<br>
									Vous sentez que le gros de la tempête est passé, mais il vous reste encore du chemin à parcourir pour la traverser.<br>
									Scrutant l\'horizon, vous avez l\'impression de distinguer une forme massive un peu plus loin, mais la visibilité est trop mauvaise pour en avoir le cœur net.
									Vous criez alors à Logan de se rendre sur le beaupré pour vous guider.<br>
									Le garçon se rue vers la proue avec agilité malgré les conditions et parvient à destination.
									Vous l\'entendez alors hurler quelque chose, mais les éclairs qui zèbrent le ciel vous empêchent de comprendre ce qu\'il dit.<br>
									Relayé par les différents membres d\'équipage, son message parvient finalement à vous.<br>
									<br>
									Des récifs !
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="submit" name="recifs" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['recifs']) OR $_SESSION['recifs'])
						{
							if (isset ($_POST['1barre']) OR isset($_POST['2barre']) OR isset($_POST['3barre']) OR isset($_POST['4barre']) OR isset($_POST['5barre']))
								{
									if ($_SESSION['recifsetape4'])
										{
											$_SESSION['recifs'] = false;
											$_SESSION['recifsetape2'] = false;
											$_SESSION['recifsetape3'] = false;
											$_SESSION['recifsetape4'] = false;
											$_SESSION['recifsetape5'] = true;
											if (isset ($_POST['4barre']))
												{
													echo'
														<audio src="/escaperpg/sons/ambria/recifevite.mp3" autoplay></audio>
														<p>
															Même si ce dernier récif ne semble pas présenter de menace en soit, vous savez que sous la surface se trouvent de nombreux écueils particulièrement dangereux.<br>
															Tenant fermement la barre, vous scrutez l\'eau pour trouver le passage et parvenez à faire traverser le dernier obstacle sans encombre.
														</p>
														<center>
															<form action="tempete.php" method="post">
																<input type="submit" name="tempetefin" value="Suivant.">
															</form>
														</center>
													';
												}
											else
												{
													echo'
														<audio src="/escaperpg/sons/ambria/reciftouche.mp3" autoplay></audio>
														<p>
															Même si ce dernier récif ne semble pas présenter de menace en soit, vous savez que sous la surface se trouvent de nombreux écueils particulièrement dangereux.<br>
															Tenant fermement la barre, vous scrutez l\'eau pour trouver le passage.<br>
															Malheureusement, vous tardez à le trouver et un choc stoppe soudainement le navire, vous projetant en avant contre la barre tandis que les hommes sur le pont tombent.
															Logan perd son équilibre et parvient de justesse à se rattraper à la figure de proue.
															Vous voyez Jake courir vers lui pour le hisser sur le pont, hors de danger.<br>
															<br>
															Reprenant votre position, vous manœuvrez la barre pour mener le bateau en dehors de la zone de danger.
														</p>
														<center>
															<form action="tempete.php" method="post">
																<input type="submit" name="tempetefin" value="Suivant.">
															</form>
														</center>
													';
													$_SESSION['etatquille'] -= 50;
												}
										}
									elseif ($_SESSION['recifsetape3'])
										{
											if (isset ($_POST['3barre']))
												{
													echo'
														<audio src="/escaperpg/sons/ambria/recifevite.mp3" autoplay></audio>
														<p>
															Une nouvelle fois, vous donnez un grand coup de barre pour franchir l\'étroit passage qui s\'offre à vous.
															Le Surgisseur des Tempêtes frôle le récif malgré tout et l\'une des vergues heurte la roche qui s\'effrite et tombe en pluie fine sur le pont, n\'occasionnant cependant aucun dégât.<br>
															<br>
															Plus qu\'un à passer et vous serez hors de danger.
														</p>
													';
													$_SESSION['recifsetape4'] = true;
												}
											else
												{
													echo'
														<audio src="/escaperpg/sons/ambria/reciftouche.mp3" autoplay></audio>
														<p>
															Le passage se révèle trop étroit pour passer.<br>
															Manœuvrant de votre mieux, vous faites votre possible pour éviter de fracasser la coque contre la roche, mais n\'y parvenez qu\'en partie.
															Un choc violent propulse le Surgisseur des Tempêtes sur le côté.
															L\'une des vergues du grand mât pivote soudainement et un cordages rompt sous la tension, survolant le pont à une vitesse folle.
															Deux hommes se font renverser sous l\'impact et un troisième est percuté par la poulie qui y est attachée.
															Le coup lui brise le crâne, le tuant sur le coup.<br>
															<br>
															Vous n\'avez cependant pas le temps de vous apitoyer sur le sort du pauvre homme, car un nouveau récif menace de couler le navire si vous n\'agissez pas promptement.
														</p>
													';
													$_SESSION['etatquille'] -= 50;
													$_SESSION['recifsetape4'] = true;
												}
										}
									elseif ($_SESSION['recifsetape2'])
										{
											if (isset ($_POST['5barre']))
												{
													echo'
														<audio src="/escaperpg/sons/ambria/recifevite.mp3" autoplay></audio>
														<p>
															Le second récif vous oblige à tourner la barre au maximum pour opérer à un brusque changement de direction, mais vos années d\'expérience vous ont aidées à connaître par cœur votre navire.
															Vous réussissez avec brio à passer le mortel obstacle.<br>
															<br>
															De ce que vous en comprenez, il en reste encore deux.
														</p>
													';
												}
											else
												{
													echo'
														<audio src="/escaperpg/sons/ambria/reciftouche.mp3" autoplay></audio>
														<p>
															Peut-être est-ce Logan qui vous a mal indiqué le danger, ou vous qui n\'avez pas réagi assez rapidement, mais le passage du second obstacle ne se fait pas sans dommage.<br>
															Alors que l\'énorme récif passe lentement sur votre côté, vous sentez la quille racler contre la roche, faisant vibrer tout le navire.<br>
															<br>
															Vous parvenez malgré tout à garder le contrôle.
														</p>
													';
													$_SESSION['etatquille'] -= 50;
												}
											$_SESSION['recifsetape3'] = true;
										}
									elseif ($_SESSION['recifs'])
										{
											if (isset ($_POST['2barre']))
												{
													echo'
														<audio src="/escaperpg/sons/ambria/recifevite.mp3" autoplay></audio>
														<p>
															Manœuvrant au mieux, vous parvenez à passer les premiers récifs sans problème.
														</p>
													';
												}
											else
												{
													echo'
														<audio src="/escaperpg/sons/ambria/reciftouche.mp3" autoplay></audio>
														<p>
															En tentant de passer, vous entendez un choc sourd provenir des entrailles du navire.<br>
															Manifestement, les récifs par ici étaient moins profonds que ce que vous ne le pensiez et la quille en a payé les frais.<br>
															<br>
															Heureusement, celle-ci ne semble pas s\'être brisée et vous avez encore une chance de traverser, mais vous savez qu\'il ne vous faudra pas faire une erreur de plus.
														</p>
													';
													$_SESSION['etatquille'] -= 50;
												}
											$_SESSION['recifsetape2'] = true;
										}
								}
							elseif (isset ($_POST['recifs']))
								{
									echo'
										<audio src="/escaperpg/sons/ambria/tempete.mp3" autoplay></audio>
										<p>
											Les récifs ne pourront pas être évités, mais vos compétences de navigation devraient vous permettre de les négocier sans heurt.<br>
											Malheureusement, le gouvernail se trouve sur la dunette, à la poupe du vaisseau.
											Les voiles et leurs cordages, ainsi que les hommes sur le pont ne vous permettent pas de voir précisément la menace, sans parler de la visibilité quasi-nulle avec l\'obscurité.<br>
											<br>
											Vous espérez que Logan saura vous avertir au mieux des dangers à venir.
										</p>
									';
								}
							if ($_SESSION['recifsetape5'] == false)
								{
									echo'
										<div id="enigmelieu">
											<img src="/escaperpg/images/ambria/barrebateau.png">
											<div id="barre1">
												<form action="tempete.php" method="post">
													<button type="submit" name="1barre">
														<img src="/escaperpg/images/ambria/barre1.png" onmouseover="this.src=\'/escaperpg/images/ambria/barre1hover.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/barre1.png\'">
													</button>
												</form>
											</div>
											<div id="barre2">
												<form action="tempete.php" method="post">
													<button type="submit" name="2barre">
														<img src="/escaperpg/images/ambria/barre2.png" onmouseover="this.src=\'/escaperpg/images/ambria/barre2hover.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/barre2.png\'">
													</button>
												</form>
											</div>
											<div id="barre3">
												<form action="tempete.php" method="post">
													<button type="submit" name="3barre">
														<img src="/escaperpg/images/ambria/barre3.png" onmouseover="this.src=\'/escaperpg/images/ambria/barre3hover.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/barre3.png\'">
													</button>
												</form>
											</div>
											<div id="barre4">
												<form action="tempete.php" method="post">
													<button type="submit" name="4barre">
														<img src="/escaperpg/images/ambria/barre4.png" onmouseover="this.src=\'/escaperpg/images/ambria/barre4hover.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/barre4.png\'">
													</button>
												</form>
											</div>
											<div id="barre5">
												<form action="tempete.php" method="post">
													<button type="submit" name="5barre">
														<img src="/escaperpg/images/ambria/barre5.png" onmouseover="this.src=\'/escaperpg/images/ambria/barre5hover.png\'" onmouseout="this.src=\'/escaperpg/images/ambria/barre5.png\'">
													</button>
												</form>
											</div>
										</div>
									';
									$_SESSION['recifs'] = true;
									if (isset ($_POST['indice']))
										{
											echo'
												<div id="indice">
													Le journal de bord que vous avez récupéré dans votre cabine vous sera très utile.
													Vous devriez regarder dans votre inventaire.
												</div>
												<center>
													<form action="tempete.php" method="post">
														<button type="submit" name="indice2" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['indice2']))
										{
											echo'
												<div id="indice">
													Le journal de bord que vous avez récupéré dans votre cabine vous sera très utile.
													Vous devriez regarder dans votre inventaire.<br>
													Logan doit vous dire ce qu\'il voit.
													Demandez-lui de bien décrire la forme et la position des récifs pour vous permettre de savoir quel chemin emprunter.
													Essayez tous les deux de vous représenter la scène en 5 cases, correspondant à chacune des poignées de la barre.
												</div>
												<center>
													<form action="tempete.php" method="post">
														<button type="submit" name="indice3" class="boutonindice"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['indice3']))
										{
											echo'
												<div id="indice">
													Le journal de bord que vous avez récupéré dans votre cabine vous sera très utile.
													Vous devriez regarder dans votre inventaire.<br>
													Logan doit vous dire ce qu\'il voit.
													Demandez-lui de bien décrire la forme et la position des récifs pour vous permettre de savoir quel chemin emprunter.
													Essayez tous les deux de vous représenter la scène en 5 cases, correspondant à chacune des poignées de la barre.<br>
													Les deux premiers récifs correspondent à la figure 1, vous devez passer le plus près possible.<br>
													Le troisième récif correspond à la figure 4, passez une nouvelle fois au plus près.<br>
													Le dernier récif correspond à la figure 2, il faut donc passer deux cases plus loin.
												</div>
												<center>
													<form action="tempete.php" method="post">
														<button type="submit" name="reponse" class="boutonreponse"></button>
													</form>
												</center>
											';
										}
									elseif (isset ($_POST['reponse']))
										{
											echo'
												<div id="reponse">
													Pour le premier récif, cliquez sur la 2e poignée.<br>
													Pour le second récif, cliquez sur la 5e poignée.<br>
													Pour le troisième récif, cliquez sur la 3e poignée.<br>
													Pour le dernier récif, cliquez sur la 4e poignée.
												</div>
											';
										}
									else
										{
											echo'
												<center>
													<form action="tempete.php" method="post">
														<button type="submit" name="indice" class="boutonindice"></button>
													</form>
												</center>
											';
										}
								}
						}						
					elseif (isset ($_POST['tempetefin']))
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tempete.png"><span><u><b>Un mauvais temps qui s\'annonce</b></u><br>Affronter la tempête</span>';
							$scenario = 'ambria';
							$description = 'tempête';
							$cache = 'oui';
							$rarete = 'succesargent';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							if ($_SESSION['matcasse'] AND $_SESSION['quillecassee'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/tempetefinmatcasse.mp3" autoplay></audio>
										<p>
											Alors que le danger des récifs semble être écarté, une nouvelle rafale vient ébranler le navire.<br>
											Après un énorme craquement sinistre, vous voyez le mât principal commencer à s\'écrouler.
											Quelques hommes tentent de tirer sur les cordages pour le retenir mais rien n\'y fait et l\'ensemble s\'écroule dans un fracas immense.<br>
											<br>
											La tempête semble soudain perdre de sa rage, mais la perte du mât vous a déporté vers une gigantesque colonne de pierre sortant des eaux sombres, que vous n\'aviez pas pu repérer à cause de l\'obscurité.<br>
											Vous faites votre possible pour manœuvrer afin de l\'éviter mais ne pouvez empêcher totalement le choc, qui se propage dans tout le bâtiment et manque de vous faire tomber.<br>
											Un nouveau crac, venu des profondeurs, se fait alors entendre et, tandis que vous tentez de rétablir le cap, vous comprenez avec horreur que la quille s\'est brisée et que le Surgisseur des Tempêtes
											n\'est maintenant plus grand chose d\'autre qu\'une immense brique de bois flottant sur l\'eau.<br>
											<br>
											À quelques milles de là, vous remarquez alors une immense bande de terre.<br>
											Ses hautes côtes lui donnent un air menaçant et imprenable.
											De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
											<br>
											Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Allez les gars, <span class="mdp2">sortez les rames</span> et menez-nous là-bas !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="../ile/plage.php" method="post">
												<input type="submit" name="accoster" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp13'] = true;
								}
							elseif ($_SESSION['matcasse'] AND $_SESSION['quillecassee'] == false)
								{
									echo'
										<audio src="/escaperpg/sons/ambria/tempetefinmatcasse.mp3" autoplay></audio>
										<p>
											Alors que le danger des récifs semble être écarté, une nouvelle rafale vient ébranler le navire.<br>
											Après un énorme craquement sinistre, vous voyez le mât principal commencer à s\'écrouler.
											Quelques hommes tentent de tirer sur les cordages pour le retenir mais rien n\'y fait et l\'ensemble s\'écroule dans un fracas immense.<br>
											<br>
											La tempête semble soudain perdre de sa rage, mais la perte du mât vous a déporté vers une gigantesque colonne de pierre sortant des eaux sombres, que vous n\'aviez pas pu repérer à cause de l\'obscurité.<br>
											Vous faites votre possible pour manœuvrer et parvenez de justesse à éviter l\'écueil, qui aurait certainement eu raison de la quille, voire de tout le bâtiment.<br>
											<br>
											Avec le ciel qui se dégage, vous constatez qu\'une immense île s\'étend à quelques milles de là.<br>
											Ses hautes côtes lui donnent un air menaçant et imprenable.
											De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
											<br>
											Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Allez les gars, on sort les <span class="mdp2">rames</span> et on amène le bateau dans cette baie !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="../ile/plage.php" method="post">
												<input type="submit" name="accoster" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp14'] = true;
								}
							elseif ($_SESSION['matcasse'] == false AND $_SESSION['quillecassee'])
								{
									echo'
										<audio src="/escaperpg/sons/ambria/tempetefin.mp3" autoplay></audio>
										<p>
											Alors que le danger des récifs semble être écarté, une nouvelle rafale vient ébranler le navire, qui se déporte violemment sur le côté.<br>
											Vous tentez de redresser la barre mais comprenez que la quille a été trop abîmée lors du passage des récifs et que vous ne pouvez plus manœuvrer correctement !<br>
											<br>
											La tempête semble soudain perdre de sa rage et vous prenez une seconde pour souffler et redresser votre chapeau, que le vent a manqué de peu d\'emporter.<br>
											<br>
											Avec le ciel qui se dégage, vous constatez qu\'une immense île s\'étend à quelques milles de là.<br>
											Ses hautes côtes lui donnent un air menaçant et imprenable.
											De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
											<br>
											Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Allez les gars, sortez les rames et menez-nous jusqu\'à cette baie !
													Une fois sur place, trouvez-moi un endroit où <span class="mdp2">accoster</span> !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="../ile/plage.php" method="post">
												<input type="submit" name="accoster" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp15'] = true;
								}
							else
								{
									echo'<div id="succespopup">';
									$nouveausucces = '<img src="/escaperpg/images/succes/ambria/tempeteparfaite.png"><span><u><b>Duo de choc !</b></u><br>Se sortir de la tempête sans subir de dégât !</span>';
									$scenario = 'ambria';
									$description = 'tempêteparfaite';
									$cache = 'oui';
									$rarete = 'succesgold';
									include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
									echo'</div>';
									
									echo'
										<audio src="/escaperpg/sons/ambria/tempetefin.mp3" autoplay></audio>
										<p>
											La tempête semble soudain perdre de sa rage et vous prenez une seconde pour souffler et redresser votre chapeau, que le vent a manqué de peu d\'emporter.<br>
											<br>
											Avec le ciel qui se dégage, vous pouvez de nouveau voir ce qui se trouve alentour et manquez de peu un hoquet de surprise lorsque vous constatez qu\'une immense île s\'étend à quelques milles de là.<br>
											Ses hautes côtes lui donnent un air menaçant et imprenable.
											De nombreuses formations rocheuses semblables à des tours cyclopéennes se dressent çà et là, surgissant des abysses tels les tentacules du légendaire kraken.<br>
											<br>
											Vous en êtes sûr et certain, devant vous se trouve la mythique Ambria !
										</p>
										<div class="dialogue">
											<div class="bulleperso2">
												<p>
													Allez les gars, on va dans cette baie !
													Une fois sur place, jetez l\'ancre et sortez la <span class="mdp2">chaloupe</span> !
												</p>
											</div>
											<div class="portrait2">
												<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
											</div>
										</div>
										<center>
											<form action="../ile/plage.php" method="post">
												<input type="submit" name="accoster" value="Suivant.">
											</form>
										</center>
									';
									$_SESSION['mdp12'] = true;
								}
						}
					else
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/ambria/cap.png"><span><u><b>Droit vers l\'horizon !</b></u><br>Trouver un cap pour le Surgisseur des Tempêtes</span>';
							$scenario = 'ambria';
							$description = 'cap';
							$cache = 'non';
							$rarete = 'succesbronze';
							include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							echo'
								<audio src="/escaperpg/sons/ambria/cap.mp3" autoplay></audio>
								<p>
									Enfin, après toutes ces années, vous savez comment vous rendre sur l\'île d\'Ambria.<br>
									<br>
									Vous relevez la tête vers Logan.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Merci gamin. Je sais où nous nous rendons à présent.<br>
											Viens avec moi sur le pont, j\'ai des ordres à donner !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
							';
							if ($_SESSION['ambriajournalsullivan'] == false)
								{
									echo'
										<p>
											Vous attrapez votre journal de bord qui était posé sur le bureau, à côté de la carte, et le rangez dans votre veste.
										</p>
									';
									$_SESSION['ambriajournalsullivan'] = true;
								}
							echo'
								<p>
									Vous vous levez de votre fauteuil puis vous dirigez vers la sortie de votre cabine, Logan sur les talons.<br>
									Le timonier vous salue lorsque vous arrivez devant lui.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Cap\'taine. Vous savez où on doit aller ?												
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Bien sûr. Mettez le cap sur 32 degrés Nord-Est, maintenez l\'allure !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Le timonier semble blêmir légèrement.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/timonier.png">
									</div>
									<div class="bulleperso">
										<p>
											Vous... vous êtes bien sûr ? C\'est qu\'les eaux par là-bas sont d\'sacrées garces !												
										</p>
									</div>
								</div>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Nous sommes sur le Surgisseur des Tempêtes, rien ne nous arrêtera.<br>
											<br>
											<span class="mdp2">TOUT LE MONDE À SON POSTE</span> !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Faisant retentir la cloche de la dunette, vous alertez l\'équipage qui se précipite pour répondre à vos ordres.<br>
									<br>
									Le Surgisseur des Tempêtes prend le large, filant sur une mer bleu azur sereine. Aucun nuage ne semble percer l\'horizon.<br>
									<br>
									L\'aventure reprend, enfin.
								</p>
								<center>
									<form action="tempete.php" method="post">
										<input type="submit" name="cap" value="Suivant.">
									</form>
								</center>
							';
							$_SESSION['mdp25'] = true;
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>