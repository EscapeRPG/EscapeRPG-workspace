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
		<title>Embarquement - Le Trésor d'Ambria</title>
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
					if (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/combatmarins.mp3" autoplay></audio>
								<p>
									Il vous fait un petit signe de tête avant de sortir un couteau.<br>
									Ce n\'est pas grand chose, mais il faudra faire avec.<br>
									<br>
									Devant vous, les hommes ont également commencé à sortir des armes.
									Heureusement, vous constatez qu\'ils ne possèdent que des couteaux et des gourdins, vous pouvez donc avoir l\'avantage.
									Vous avancez de quelques pas, et avant même que l\'un d\'eux n\'ait le temps d\'esquisser le moindre geste, vous sortez le pistolet attaché à votre ceinture et tirez dans la tête du plus grand et menaçant.
									La détonation claque dans la nuit et l\'écho se répercute dans les rues et ruelles de la ville.<br>
									Vous sortez alors votre sabre, prêt à combattre.<br>
									<br>
									Alors que vous vous apprêtiez à vous lancer sur eux, vous apercevez des silhouettes s\'agiter sur le pont de votre navire.
								</p>
								<center>
									<form action="embarquement.php" method="post">
										<input type="submit" name="suivant2" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant2']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/combatmarins2.mp3" autoplay></audio>
								<p>
									Vous tendez votre bras pour interrompre la course de Logan.
									Les types devant vous ne semblent pas se méfier et avancent lentement, l\'air sûrs de leur supériorité malgré la mort de leur camarade.<br>
									<br>
									Quand le premier coup de feu en provenance du Surgisseur des Tempêtes se fait entendre, vos adversaires se retournent subitement.
									C\'est ce moment que vous choisissez pour vous lancer sur eux, lame brandie, en poussant un cri de rage.
									Vous atteignez votre premier ennemi alors qu\'un deuxième type se fait descendre par un coup de fusil tiré depuis le navire. L\'œuvre de l\'un de vos moucheurs.<br>
									Comprenant qu\'ils sont maintenant en infériorité numérique, les deux derniers tentent de se jeter sur vous en espérant gêner les tirs de vos alliés et augmenter les chances de vous tuer.<br>
									<br>
									Vous parez un premier coup de couteau avec votre lame et effectuez une vrille sur le côté pour le dépasser tout en donnant un coup de pied pour le déstabiliser.
									Dans le coin de votre vision, vous apercevez Logan en profiter pour lui planter son couteau au niveau du cou, juste avant de faire face au dernier des marins, armé d\'un simple gourdin.
									Il tente de vous asséner un coup magistral sur la tête mais vous vous baissez à temps pour l\'éviter.<br>
									Lançant votre bras armé en avant, vous enfoncez la lame de votre sabre jusqu\'à la garde.
									Le type pousse un hoquet de surprise, puis lâche une sorte de rot humide alors que vous retirez votre arme et que du sang s\'écoule de sa bouche.<br>
									<br>
									Il s\'effondre lourdement au sol. Le combat n\'a duré que quelques secondes.<br>
									Vous vous retournez vers Logan.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Tu es toujours sûr de vouloir nous accompagner dans cette aventure ? On risque de pas mal croiser de types de ce genre pendant notre voyage.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									À peine livide, le jeune homme vous regarde droit dans les yeux sans répondre, mais la détermination que vous lisez dans son regard suffit à vous faire comprendre qu\'il est prêt à aller jusqu\'au bout.<br>
									Décidément, vous vous dites que ce petit à de l\'avenir.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Très bien, suis-moi alors, on monte à bord de mon vaisseau.
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<center>
									<form action="embarquement.php" method="post">
										<input type="submit" name="suivant3" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant3']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/embarquement.mp3" autoplay></audio>
								<p>
									À votre approche du Surgisseur des Tempêtes, vos hommes d\'équipage mettent en place la planche vous permettant de monter à bord.<br>
									Vous expliquez rapidement que le petit qui vous accompagne va maintenant faire partie du voyage et que vous comptez sur eux pour lui expliquer la vie à bord.
									Vos hommes lui disent de le suivre et qu\'ils vont lui montrer ce qu\'il doit savoir.
								</p>
							';
							if ($_SESSION['sullivanconfiance'] == 90)
								{
									echo'
										<p>
											Vous vous dirigez vers la dunette, d\'où vos hommes pourront bien vous entendre crier les ordres.
											Ayant encore mal à la hanche, vous boitez un peu, ce qui ne manque pas d\'échapper à leur regard.
										</p>
									';
								}
							elseif ($_SESSION['sullivanconfiance'] == 80)
								{
									echo'
										<p>
											Willy, qui fait office de médecin de bord, s\'approche de vous, manifestement inquiet par le sang qui macule votre visage.
											Vous le repoussez sans ménagement en lui assurant que ce n\'est rien, puis vous vous hissez sur la dunette, d\'où vos hommes pourront bien vous entendre crier les ordres.
										</p>
									';
								}
							elseif ($_SESSION['sullivanconfiance'] == 70)
								{
									echo'
										<p>
											Willy, qui fait office de médecin de bord, s\'approche de vous, manifestement inquiet par le sang qui macule votre visage.
											Vous le repoussez sans ménagement en lui assurant que ce n\'est rien, puis vous vous hissez sur la dunette, d\'où vos hommes pourront bien vous entendre crier les ordres.
											Ayant encore mal à la hanche, vous boitez un peu, ce qui ne manque pas d\'échapper à leur regard.
										</p>
									';
								}
							echo'
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											ALLEZ TAS D\'CHIENS GALEUX !
											LARGUEZ LES AMARRES ET HISSEZ HAUT, NOUS AVONS UN TRÉSOR À CONQUÉRIR !
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Répondant à vos ordres, l\'équipage se met en mouvement et s\'apprête à appareiller.<br>
									<br>
									Laissant les choses se faire, vous vous dirigez vers votre cabine.
								</p>
								<center>
									<form action="embarquement.php" method="post">
										<input type="submit" name="suivant4" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant4']) OR $_SESSION['ambriacabine'])
						{
							echo'
								<p>
									Vous êtes dans votre cabine et pouvez vous mettre à votre aise.
									Vous posez votre manteau sur le fauteuil et retirez votre baudrier et votre pistolet avant de défaire la taïole qui ceint votre taille.<br>
									<br>
									En arrivant devant votre étagère, vous constatez que vous n\'avez pas la place de tout ranger correctement.
									Si vous deviez être pris dans une tempête lors de votre voyage, il pourrait être dangereux que vos vivres et équipements chutent et soient propulsés dans la pièce.
									Vous envisagez donc de remettre un peu d\'ordre ici.
								</p>
								<div id="etagerecapitaine">
									<div class="dropperetagere" id="dropetagere1"></div>
									<div class="dropperetagere" id="dropetagere2"></div>
									<div class="dropperetagere" id="dropetagere3"></div>
									<div class="dropperetagere" id="dropetagere4"></div>
									<div class="dropperetagere" id="dropetagere5"></div>
									<div class="dropperetagere" id="dropetagere6"></div>
									<div class="dropperetagere" id="dropetagere7"></div>
									<div class="dropperetagere" id="dropetagere8"></div>
									<div class="dropperetagere" id="dropetagere9"></div>
									<div class="dropperetagere" id="dropetagere10"></div>
								</div>
								<br>
								<center>
									<div class="draggeretagere" id="dragetagere1">
										<img src="/escaperpg/images/ambria/etagere/longuevue.png" id="dra1">
									</div>
									<div class="draggeretagere" id="dragetagere2">
										<img src="/escaperpg/images/ambria/etagere/caisse.png" id="dra2">
									</div>
									<div class="draggeretagere" id="dragetagere3">
										<img src="/escaperpg/images/ambria/etagere/rhum.png" id="dra3">
									</div>
									<div class="draggeretagere" id="dragetagere4">
										<img src="/escaperpg/images/ambria/etagere/pistolet.png" id="dra4">
									</div>
									<div class="draggeretagere" id="dragetagere5">
										<img src="/escaperpg/images/ambria/etagere/compas.png" id="dra5">
									</div>
									<div class="draggeretagere" id="dragetagere6">
										<img src="/escaperpg/images/ambria/etagere/lampe.png" id="dra6">
									</div>
								</center>
								<p>
									Après une courte réflexion, vous en venez à cette conclusion :<br>
									<center>
										- La caisse est trop lourde pour risquer de la mettre en hauteur.<br>
										- Vous aimez avoir votre longue-vue à portée de votre pistolet.<br>
										- Le rhum se conserve mieux s\'il n\'est pas posé près d\'une source de lumière ou de chaleur et devrait donc être posé le plus loin possible de l\'une d\'elles.<br>
										- En cas de précipitation, il serait préférable que votre pistolet se trouve bien au centre de l\'étagère, pour pouvoir le récupérer plus rapidement.<br>
										- Pour éviter que le matériel ne gîte, les rangées doivent être soit remplies, soit vides.
									</center>
								</p>
								<script src="/escaperpg/aventures/ambria/sullivan/scripts/dragdropetagere.js"></script>
								<center>
									<form action="embarquement.php" method="post">
										<input type="submit" name="reset" value="Réinitialiser.">
									</form>
								</center>
							';
							$_SESSION['ambriacabine'] = true;
							if (isset ($_POST['indice']))
								{
									echo'
										<div id="indice">
											Vu le nombre d\'objets à ranger, l\'une des étagères se trouvera complètement vide.
										</div>
										<center>
											<form action="embarquement.php" method="post">
												<button type="submit" name="indice2" class="boutonindice"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['indice2']))
								{
									echo'
										<div id="indice">
											Vu le nombre d\'objets à ranger, l\'une des étagères se trouvera complètement vide.<br>
											Faites bien attention de placer la bouteille de rhum le plus loin possible des bougies et de la lampe, tout en respectant les autres conditions.
										</div>
										<center>
											<form action="embarquement.php" method="post">
												<button type="submit" name="reponse" class="boutonreponse"></button>
											</form>
										</center>
									';
								}
							elseif (isset ($_POST['reponse']))
								{
									echo'
										<div id="reponse">
											La caisse étant trop lourde, placez-la dans l\'emplacement tout en bas.<br>
											Comme le pistolet doit être vers le centre et que l\'une des étagères sera vide au final, il faut le placer juste à côté des livres sur la deuxième étagère en partant du haut.<br>
											La longue-vue va donc être dans la case juste à droite du pistolet.<br>
											Pour éviter que le rhum ne soit près d\'une source de lumière ou de chaleur, placez-le sur la première case de la seconde étagère.<br>
											Toujours pour éviter de mettre une source de lumière ou de chaleur trop près du rhum, la lampe sera placée dans la deuxième case de la première étagère.<br>
											Enfin, le compas sera placé dans la première case de cette même étagère pour qu\'elle soit remplie.
										</div>
									';
								}
							else
								{
									echo'
										<center>
											<form action="embarquement.php" method="post">
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
									Vous arrivez finalement sur les docks sans avoir rencontré de menace.<br>
									À une centaine de mètres devant vous se dresse fièrement votre navire.
									Vous savez que l\'équipage est resté à bord pour s\'apprêter à lever l\'ancre à tout moment.<br>
									Vous pressez le pas et enjoignez Logan à faire de même.<br>
									<br>
									Après avoir parcouru une cinquantaine de mètres, vous apercevez les silhouettes de 4 hommes sortant de l\'ombre d\'une ruelle et s\'arrêtant à mi-chemin, vous empêchant de rejoindre le Surgisseur des Tempêtes dans l\'immédiat.<br>
									Vous reconnaissez les 4 types qui vous ont permis de trouver qui possédait la carte.<br>
									<br>
									Vous poussez un léger soupir, en vous disant que les choses ne peuvent jamais se passer simplement.
									Vous vous tournez vers Logan.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											J\'espère que tu sais aussi te battre avec autre chose qu\'un type bourré dans une taverne, petit...
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<p>
									Celui-ci a également remarqué ce qui se passait.
								</p>
								<div class="dialogue">
									<div class="bulleperso2">
										<p>
											Tu as de quoi te défendre ?
										</p>
									</div>
									<div class="portrait2">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
								</div>
								<center>
									<form action="embarquement.php" method="post">
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
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
	</body>
</html>