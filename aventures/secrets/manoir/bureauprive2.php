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
		<title>Bureau privé - Secrets Familiaux</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliauxmini.png" alt="secrets familiaux bannière"></div>
		<main>
			<nav>
				<a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png" alt="inspecteur deckard"></a>
				<div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
				<div id="motsdepasse"><input type="submit" value="NOTES"></div>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/navigationmanoir.php"; ?>
				<a href="/escaperpg/aventures/secrets/save/save.php" target="_blank" rel="noreferrer"><input type="submit" name="save" value="SAUVEGARDER"></a>
			</nav>
			<div id="txt">
				<?php
					if ($_SESSION['trappeopen']) // Le joueur a ouvert la trappe et...
						{
							if (isset($_POST['trappeopened'])) // a cliqué sur la trappe
								{
									echo'
										<p>
											Êtes-vous prêt à descendre l\'échelle, à présent ?
										</p>
										<center>
											<form action="cavesecrete" method="post">
												<input type="submit" name="descendre" value="Descendre.">
											</form>
											<br>
											<form action="bureauprive2" method="post">
												<input type="submit" name="retour" value="Pas maintenant.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['masseactive']) // a activé la cuve et laissé le shoggoth toucher l'arc et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													<br>
													L\'échelle qui descend dans le profondeurs serait-elle le passage secret mentionné dans le journal de votre oncle ?
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Où peut donc mener cette échelle ? Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
												</p>
											';
										}
								}
							elseif ($_SESSION['cuves']) // a activé la cuve mais n'a pas laissé le shoggoth toucher l'arc et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Vous préférez ne pas retenter l\'expérience.<br>
													<br>
													L\'échelle qui descend dans le profondeurs serait-elle le passage secret mentionné dans le journal de votre oncle ?
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Vous préférez ne pas retenter l\'expérience.<br>
													<br>
													Où peut donc mener cette échelle ?
													Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau</span> privé ?
												</p>
											';
										}
								}
							elseif (isset($_POST['non'])) // a choisi de ne pas activer la cuve et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.<br>
													<br>
													L\'échelle qui descend dans le profondeurs serait-elle le passage secret mentionné dans le journal de votre oncle ?
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.<br>
													<br>
													Où peut donc mener cette échelle ? Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau</span> privé ?
												</p>
											';
										}
									$_SESSION['refus']=true;
								}
							elseif ($_SESSION['refus'])
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													L\'échelle qui descend dans le profondeurs serait-elle le passage secret mentionné dans le journal de votre oncle ?
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Où peut donc mener cette échelle ? Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau</span> privé ?
												</p>
											';
										}
								}
							else // n'a pas encore choisi d'activer ou non la cuve et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Où peut donc mener cette échelle ?
													Est-ce le passage secret mentionné dans le journal de votre oncle ?<br>
													<br>
													Longeant l\'arrière de la bibliothèque, vous voyez une succession de cuves contenant une sorte de masse noire gélatineuse.
													Des leviers se trouvent à côté de chacune d\'elles.<br>
													<br>
													Essayez-vous d\'en tirer un ?
												</p>
												<center>
													<form action="courtcircuit" method="post">
														<input type="submit" name="tirer" value="Tirer sur le levier.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="non" value="Ne pas y toucher.">
													</form>
												</center>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeopened">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappeopened">
																	<img src="/escaperpg/images/secrets/buttontrappeopened.png">
																</button>
															</form>
														</div>
													</div>
													Où peut donc mener cette échelle ?
													Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
													<br>
													Longeant l\'arrière de la bibliothèque, vous voyez une succession de cuves contenant une sorte de masse noire gélatineuse.
													Des leviers se trouvent à côté de chacune d\'elles.<br>
													<br>
													Essayez-vous d\'en tirer un ?
												</p>
												<center>
													<form action="courtcircuit" method="post">
														<input type="submit" name="tirer" value="Tirer sur le levier.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="non" value="Ne pas y toucher.">
													</form>
												</center>
											';
										}
								}
						}
					elseif ($_SESSION['trappe'] OR isset($_POST['trappehidden'])) // Le joueur a découvret la trappe secrète sans l'ouvrir, ou vient de la découvrir, et...
						{
							echo'<div id="succespopup">';
							$nouveausucces = '<img src="/escaperpg/images/succes/secrets/passage.png"><span><u><b>Enquêteur</b></u><br>Découvrir un passage secret dans le bureau privé de l\'oncle William !</span>';
							$scenario = 'secrets';
							$description = 'passage';
							$cache = 'oui';
							$rarete = 'succesnormal';
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
							echo'</div>';
							
							if (isset($_POST['trappe'])) // a cliqué sur la trappe
								{
									echo'
										<p>
											La trappe en bois est fermée par un vieux cadenas.
										</p>
										<center>
											<form action="bureauprive2" method="post">
												<input type="text" name="cadenas"><input type="submit" name="utiliser" value="Utiliser la clé.">
											</form>
											<br>
											<form action="bureauprive2" method="post">
												<input type="submit" name="retour" value="Retour.">
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['cadenas']) AND str_replace($search, $replace, stripslashes($_POST['cadenas'])) == "vieillecle") // a utilisé la bonne clé
								{
									echo'
										<audio src="/escaperpg/sons/secrets/ouverturemanoir.mp3" autoplay></audio>
										<p>
											La trappe s\'ouvre, révélant une échelle menant aux ténèbres.
											L\'odeur persistante qui règne dans le manoir depuis votre arrivée devient soudainement beaucoup plus forte et vous prend à la gorge.
											Vous faites votre possible pour ne pas rendre votre dernier repas.<br>
											Quoi que ça puisse être, ce qui se trouve en bas est à l\'origine de cette émanation putride…
											Vous redoutez ce que vous allez y trouver, mais il est trop tard pour faire marche arrière maintenant.<br>
											<br>
											Prenant votre courage à deux mains, vous saisissez l\'une des lampes se trouvant sur l\'étagère à côté de vous et vous apprêtez à descendre, à moins qu\'il ne vous reste quelque chose à faire avant ?
										</p>
										<center>
											<form action="cavesecrete" method="post">
												<input type="submit" name="descendre" value="Descendre.">
											</form>
											<br/>
											<form action="bureauprive2" method="post">
												<input type="submit" name="retour" value="Pas maintenant.">
											</form>
										</center>
									';
									$_SESSION['trappe'] = false;
									$_SESSION['trappeopen'] = true;
									$_SESSION['oldcle'] = false;
								}
							elseif (isset($_POST['cadenas'])) // n'a pas utilisé la bonne clé
								{
									echo'
										<p>
											Ça ne semble pas être la bonne.
										</p>
										<center>
											<form action="bureauprive2" method="post">
												<input type="text" name="cadenas"><input type="submit" name="utiliser" value="Utiliser la clé.">
											</form>
											<br>
											<form action="bureauprive2" method="post">
												<input type="submit" name="retour" value="Retour.">
											</form>
										</center>
									';
								}
							elseif ($_SESSION['masseactive']) // a activé la cuve et laissé le shoggoth toucher l'arc et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Vous continuez de fouiller la partie arrière du bureau privé de votre oncle.<br>
													La masse gélatineuse continue de se contorsionner lentement dans la cuve.
													Votre anxiété à ce propos devient de plus en plus insupportable, mais vous vous rassurez en vous disant qu\'elle n\'essaye plus de briser la vitre pour s\'échapper.
													<br>
													Comment pourriez-vous faire pour ouvrir cette trappe ? Mène-t-elle au passage secret mentionné dans le journal de votre oncle ?
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Vous continuez de fouiller la partie arrière du bureau privé de votre oncle.<br>
													La masse gélatineuse continue de se contorsionner lentement dans la cuve.
													Votre anxiété à ce propos devient de plus en plus insupportable, mais vous vous rassurez en vous disant qu\'elle n\'essaye plus de briser la vitre pour s\'échapper.
													<br>
													Que renferme cette trappe ?
													Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
												</p>
											';
										}
								}
							elseif ($_SESSION['cuves']) // a activé la cuve mais n'a pas laissé le shoggoth toucher l'arc et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											if ($_SESSION['refus'])
												{
													echo '
														<p>
															<div id="enigmelieu">
																<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
																<div id="trappeclosed">
																	<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
																	</form>
																</div>
															</div>
															Il vous faut cependant toujours trouver le passage secret mentionné dans le journal.
															Pourrait-il se trouver sous cette trappe ? Encore faudrait-il réussir à l\'ouvrir...
														</p>
													';
												}
											else
												{
													echo '
														<p>
															<div id="enigmelieu">
																<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
																<div id="trappeclosed">
																	<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
																	</form>
																</div>
															</div>
															Vous préférez ne pas retenter l\'expérience.<br>
															<br>
															Il vous faut cependant toujours trouver le passage secret mentionné dans le journal.
															Pourrait-il se trouver sous cette trappe ? Encore faudrait-il réussir à l\'ouvrir...
														</p>
													';
												}
										}
									else // ne sait pas pour le passage secret
										{
											if ($_SESSION['refus'])
												{
													echo '
														<p>
															<div id="enigmelieu">
																<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
																<div id="trappeclosed">
																	<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
																	</form>
																</div>
															</div>
															Que renferme cette trappe ?
															Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
														</p>
													';
												}
											else
												{
													echo '
														<p>
															<div id="enigmelieu">
																<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
																<div id="trappeclosed">
																	<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
																	</form>
																</div>
															</div>
															Vous préférez ne pas retenter l\'expérience.<br>
															<br>
															Que renferme cette trappe ?
															Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
														</p>
													';
												}
										}
								}
							elseif (isset($_POST['non'])) // a choisi de ne pas activer la cuve et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.<br>
													<br>
													Il vous faut cependant toujours trouver le passage secret mentionné dans le journal.
													Pourrait-il se trouver sous cette trappe ? Encore faudrait-il réussir à l\'ouvrir...
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.<br>
													<br>
													Que renferme cette trappe ?
													Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
												</p>
											';
										}
									$_SESSION['refus']=true;
								}
							elseif ($_SESSION['refus'])
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Il vous faut toujours trouver le passage secret mentionné dans le journal.
													Pourrait-il se trouver sous cette trappe ? Encore faudrait-il réussir à l\'ouvrir...
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Que renferme cette trappe ?
													Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?
												</p>
											';
										}
								}
							else // n'a pas encore choisi d'activer ou non la cuve et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Le passage secret mentionné dans le journal de votre oncle se trouve-t-il sous cette trappe ?
													Encore faudrait-il réussir à l\'ouvrir...<br>
													<br>
													Longeant l\'arrière de la bibliothèque, vous voyez une succession de cuves contenant une sorte de masse noire gélatineuse.
													Des leviers se trouvent à côté de chacune d\'elles.<br>
													Essayez-vous d\'en tirer un ?
												</p>
												<center>
													<form action="courtcircuit" method="post">
														<input type="submit" name="tirer" value="Tirer sur le levier.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="non" value="Ne pas y toucher.">
													</form>
												</center>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappeclosed">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappe">
																	<img src="/escaperpg/images/secrets/buttontrappe.png">
																</button>
															</form>
														</div>
													</div>
													Que renferme cette trappe ?
													Peut-être pouvez-vous trouver des informations à ce propos quelque part dans le <span class="lieu">bureau privé</span> ?<br>
													<br>
													Longeant l\'arrière de la bibliothèque, vous voyez une succession de cuves contenant une sorte de masse noire gélatineuse.
													Des leviers se trouvent à côté de chacune d\'elles.<br>
													Essayez-vous d\'en tirer un ?
												</p>
												<center>
													<form action="courtcircuit" method="post">
														<input type="submit" name="tirer" value="Tirer sur le levier.">
													</form>
													<br>
													<form action="bureauprive2" method="post">
														<input type="submit" name="non" value="Ne pas y toucher.">
													</form>
												</center>
											';
										}
								}
							$_SESSION['trappe'] = true;
						}
					else // Le joueur n'a pas cherché la trappe secrète et...
						{
							if ($_SESSION['masseactive']) // a activé la cuve et laissé le shoggoth toucher l'arc et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappehidden">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappehidden">
																	<img src="/escaperpg/images/secrets/buttontapis.png">
																</button>
															</form>
														</div>
													</div>
													Vous continuez de fouiller la partie arrière du bureau privé de votre oncle.<br>
													La masse gélatineuse continue de se contorsionner lentement dans la cuve.
													Votre anxiété à ce propos devient de plus en plus insupportable, mais vous vous rassurez en vous disant qu\'elle n\'essaye plus de briser la vitre pour s\'échapper.
													<br>
													Il vous faut cependant toujours trouver le passage secret mentionné dans le journal.
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappehidden">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappehidden">
																	<img src="/escaperpg/images/secrets/buttontapis.png">
																</button>
															</form>
														</div>
													</div>
													Vous continuez de fouiller la partie arrière du bureau privé de votre oncle.<br>
													La masse gélatineuse continue de se contorsionner lentement dans la cuve.
													Votre anxiété à ce propos devient de plus en plus insupportable, mais vous vous rassurez en vous disant qu\'elle n\'essaye plus de briser la vitre pour s\'échapper.
													<br>
													Reste-t-il quelque chose à trouver ici ?
												</p>
											';
										}
								}
							elseif ($_SESSION['cuves']) // a réparé l'électricité sans activer la cuve ou l'a activée sans laisser le shoggoth toucher l'arc et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappehidden">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappehidden">
																	<img src="/escaperpg/images/secrets/buttontapis.png">
																</button>
															</form>
														</div>
													</div>
													Vous préférez ne pas retenter l\'expérience.<br>
													<br>
													Il vous faut cependant toujours trouver le passage secret mentionné dans le journal.
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo '
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2cuves.png">
														<div id="trappehidden">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappehidden">
																	<img src="/escaperpg/images/secrets/buttontapis.png">
																</button>
															</form>
														</div>
													</div>
													Vous préférez ne pas retenter l\'expérience.<br>
													<br>
													Y aurait-il quelque chose d\'autre par ici ?
												</p>
											';
										}
								}
							elseif (isset($_POST['non']) OR $_SESSION['refus']) // a choisi de ne pas activer la cuve et...
								{
									if ($_SESSION['tiroiropened']) // sait pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappehidden">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappehidden">
																	<img src="/escaperpg/images/secrets/buttontapis.png">
																</button>
															</form>
														</div>
													</div>
													Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.<br>
													<br>
													Il vous faut toujours trouver le passage secret mentionné dans le journal.
												</p>
											';
										}
									else // ne sait pas pour le passage secret
										{
											echo'
												<p>
													<div id="enigmelieu">
														<img src="/escaperpg/images/secrets/bureausecret2.png">
														<div id="trappehidden">
															<form action="bureauprive2" method="post">
																<button type="submit" name="trappehidden">
																	<img src="/escaperpg/images/secrets/buttontapis.png">
																</button>
															</form>
														</div>
													</div>
													Vous décidez de ne pas toucher aux leviers, de peur de ce que cela pourrait produire.<br>
													<br>
													Y aurait-il quelque chose d\'autre par ici ?
												</p>
											';
										}
									$_SESSION['refus']=true;
								}
							else // n'a rien fait d'autre, message de base en arrivant ici
								{
									echo'
										<p>
											<div id="enigmelieu">
												<img src="/escaperpg/images/secrets/bureausecret2.png">
												<div id="trappehidden">
													<form action="bureauprive2" method="post">
														<button type="submit" name="trappehidden">
															<img src="/escaperpg/images/secrets/buttontapis.png">
														</button>
													</form>
												</div>
											</div>
											En arrivant dans la seconde partie du bureau, vous retenez un cri d\'horreur en découvrant ce qui semble être un petit laboratoire.<br>
											Longeant l\'arrière de la bibliothèque, vous voyez une succession de cuves contenant une sorte de masse noire gélatineuse.
											Des leviers se trouvent à côté de chacune d\'elles.<br>
											Essayez-vous d\'en tirer un ?
										</p>
										<center>
											<form action="courtcircuit" method="post">
												<input type="submit" name="tirer" value="Tirer sur le levier.">
											</form>
											<br>
											<form action="bureauprive2" method="post">
												<input type="submit" name="non" value="Ne pas y toucher.">
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
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
