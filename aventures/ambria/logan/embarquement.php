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
		<title>Embarquement - Le Trésor d'Ambria</title>
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
			</nav>
			<div id="txt">
				<?php
					if (isset ($_POST['suivant']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/combatmarins.mp3" autoplay></audio>
								<p>
									Vous hochez la tête et sortez le couteau que vous avez subtilisé au type qui vous cherchait querelle dans la taverne.
									Ce n\'est pas grand chose, mais il faudra faire avec.<br>
									Devant vous, les hommes ont également commencé à sortir des armes.
									Heureusement, vous constatez qu\'ils ne possèdent que des couteaux et des gourdins, vous pouvez donc avoir l\'avantage.<br>
									<br>
									Le capitaine avance de quelques pas et, avant même que l\'un d\'eux n\'ait le temps d\'esquisser le moindre geste, il sort le pistolet attaché à sa ceinture et tire dans la tête du plus grand des types,
									le tuant sur le coup.
									La détonation claque dans la nuit et l\'écho se répercute dans les rues et ruelles de la ville.<br>
									Il tire ensuite sa lame au clair, prêt à combattre.<br>
									<br>
									Pendant ce temps, vous apercevez du coin de l\'œil des silhouettes s\'agiter sur le pont du Surgisseur des Tempêtes.
								</p>
								<center>
									<form action="embarquement" method="post">
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
									Désirant venir en aide au capitaine, vous commencez à vous jeter en avant mais celui-ci tend son bras et vous bloque la route. 
									Les types devant vous ne semblent pas se méfier et avancent lentement, l\'air sûrs de leur supériorité malgré la mort de leur camarade.<br>
									Quand le premier coup de feu en provenance du Surgisseur des Tempêtes se fait entendre, vos adversaires se retournent subitement.
									Sans perdre de temps, Sullivan se jette alors sur eux, lame brandie, en poussant un cri de rage.
									Vous le suivez aussitôt et, avant même que vous n\'arriviez au contact, un nouveau coup de feu tiré depuis le bateau abat un deuxième adversaire.<br>
									Comprenant qu\'ils sont maintenant en infériorité numérique, les deux derniers tentent de se jeter sur vous en espérant gêner les tirs de vos alliés et augmenter les chances de vous tuer.
									Le capitaine effectue une vrille sur lui-même pour éviter un coup et frappe le type du pied pour le déstabiliser tout en l\'envoyant vers vous.<br>
									Profitant de l\'ouverture, vous lui plantez votre couteau au niveau de la jugulaire.
									Le type s\'effondre sur ses genoux et porte les mains à sa gorge, dans une vaine tentative d\'enrayer l\'hémorragie, avant de rendre son dernier souffle.<br /<
									<br>
									Pendant que vous regardiez, médusé, votre première victime mourir, Sullivan semble s\'être occupé du dernier.<br>
									Vous vous forcez à détacher votre regard du cadavre tout en espérant ne pas avoir à revivre cette expérience et constatez que le capitaine est en train de vous dire quelque chose,
									mais vous ne percevez qu\'une partie de sa phrase.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											... accompagner dans cette aventure ? On risque de pas mal croiser de types de ce genre pendant notre voyage.
										</p>
									</div>
								</div>
								<p>
									Vous comprenez rapidement qu\'il vous demande si vous êtes toujours sûr de vouloir le suivre.<br>
									<br>
									N\'étant pas tout à fait certain de pouvoir répondre oralement sans trahir vos émotions, vous vous contentez de soutenir son regard, déterminé.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											Très bien, suis-moi alors, on monte à bord de mon vaisseau.
										</p>
									</div>
								</div>
								<center>
									<form action="embarquement" method="post">
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
									À votre approche du Surgisseur des Tempêtes, les hommes d\'équipage mettent en place la planche vous permettant de monter à bord.
									Sullivan explique rapidement les raisons de votre présence et demande à ce qu\'on vous explique la vie à bord.<br>
									Quelques marins s\'approchent de vous et vous disent de les suivre.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											Alors gamin, comment t\'en es arrivé à rencontrer l\'cap\'taine ?
										</p>
									</div>
								</div>
							';
								if ($_SESSION['loganconfiance'] == 10)
									{
										echo'
											<p>
												Vous leur narrez les événements qui se sont déroulés dans la taverne, ainsi que la bagarre.
												En voyant votre chemise déchirée, ils s\'esclaffent et vous donnent une grande tape dans le dos.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/barthy.png">
												</div>
												<div class="bulleperso">
													<p>
														Hahaha ! Attends-toi à recevoir d\'autres coups d\'ce genre si tu traînes avec nous !
														On r\'cule jamais d\'vant une bonne bagarre quand y en a l\'occasion !
													</p>
												</div>
											</div>
										';
									}
								elseif ($_SESSION['loganconfiance'] == 20)
									{
										echo'
											<p>
												Vous leur narrez les événements qui se sont déroulés dans la taverne, ainsi que la bagarre.
												En voyant la marque sur votre front suite au coup que vous avez reçu, ils s\'esclaffent et vous donnent une grande tape dans le dos.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/barthy.png">
												</div>
												<div class="bulleperso">
													<p>
														Hahaha ! Attends-toi à recevoir d\'autres coups d\'ce genre si tu traînes avec nous !
														On r\'cule jamais d\'vant une bonne bagarre quand y en a l\'occasion !
													</p>
												</div>
											</div>
										';
									}
								elseif ($_SESSION['loganconfiance'] == 30)
									{
										echo'
											<p>
												Vous leur narrez les événements qui se sont déroulés dans la taverne, ainsi que la bagarre.
												Ils s\'esclaffent bruyamment et vous donnent une grande tape dans le dos.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/barthy.png">
												</div>
												<div class="bulleperso">
													<p>
														Hahaha ! Attends-toi à recevoir d\'autres coups d\'ce genre si tu traînes avec nous !
														On r\'cule jamais d\'vant une bonne bagarre quand y en a l\'occasion !
													</p>
												</div>
											</div>
										';
									}
								else
									{
										echo'
											<p>
												Vous leur narrez les événements qui se sont déroulés dans la taverne, ainsi que la bagarre.
												En voyant votre chemise déchirée et la marque sur votre front, ils s\'esclaffent et vous donnent une grande tape dans le dos.
											</p>
											<div class="dialogue">
												<div class="portrait">
													<img src="/escaperpg/images/ambria/barthy.png">
												</div>
												<div class="bulleperso">
													<p>
														Hahaha ! Attends-toi à recevoir d\'autres coups d\'ce genre si tu traînes avec nous !
														On r\'cule jamais d\'vant une bonne bagarre quand y en a l\'occasion !
													</p>
												</div>
											</div>
										';
									}
							echo'
								<center>
									<form action="embarquement" method="post">
										<input type="submit" name="suivant4" value="Suivant.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant4']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/noeud.mp3" autoplay></audio>
								<p>
									Vous les suivez un peu plus loin sur le pont.
									Alors que le capitaine hurle des ordres et qu\'une partie des matelots s\'active pour apprêter le navire et se préparer au départ, l\'un des marins vous montre une grosse corde.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											Bien p\'tit gars. Si tu veux t\'en sortir ici, va falloir mettre la main à la pâte.
											Tu s\'ras chargé d\'faire les nœuds qu\'on t\'demand\'ra.
											C\'est pas bien difficile mais faut qu\'tu t\'souviennes de tout c\'que j\'vais t\'apprendre.
										</p>
									</div>
								</div>
								<p>
									Il pose la corde sur un tonneau et commence un nœud.
								</p>
								<center>
									<form action="embarquement" method="post">
										<input type="submit" name="suivant5" value="L\'écouter.">
									</form>
								</center>
							';
						}
					elseif (isset ($_POST['suivant5']) OR isset ($_POST['reset']))
						{
							echo'
								<audio src="/escaperpg/sons/ambria/noeud.mp3" autoplay></audio>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/barthy.png">
									</div>
									<div class="bulleperso">
										<p>
											On va commencer par un nœud simple : le nœud plat.<br>
											<br>
											Tu fais passer les cordes l\'une sur l\'aut\' puis tu fais une boucle à chaque extrémité dans lesquelles tu r\'fais passer les bouts.
											Quand t\'as fini, ça d\'vrait r\'ssembler à deux boucles l\'une dans l\'aut\'.<br>
											Ensuite, on a le nœud d\'Carrick. C\'est un peu la même mais tu fais passer les cordages l\'un sur l\'autre avant d\'les faire ressortir.
											Ça fait un peu comme si tu f\'sais une tresse là, tu vois ?<br>
											J\'vais t\'en apprendre un troisième pour l\'moment, et p\'is tu vas essayer : le nœud en huit, un grand classique mais c\'toujours utile !
											Tu prends ta corde et tu fais une boucle. Ensuite, tu r\'fais passer l\'bout par dessous p\'is tu fais une nouvelle boucle qui r\'tourne dans la première.
											Tu peux aussi en faire un double pour avoir une boucle au bout.
											On l\'appelle comme ça parce que la boucle forme un huit, facile à r\'tenir ! Après t\'as plus qu\'à tirer pour serrer l\'tout.<br>
											<br>
											Vas-y, essaye de m\'faire un nœud plat, p\'is un nœud d\'Carrick et enfin un double nœud en huit.
										</p>
									</div>
								</div>
								<div id="noeuds">
									<div class="droppernoeud" id="dropnoeud1"></div>
									<div class="droppernoeud" id="dropnoeud2"></div>
									<div class="droppernoeud" id="dropnoeud3"></div>
								</div>
								<br>
								<center>
									<div class="draggernoeud" id="dragnoeud1">
										<img src="/escaperpg/images/ambria/noeuds/noeud1.png" id="dra1">
									</div>
									<div class="draggernoeud" id="dragnoeud2">
										<img src="/escaperpg/images/ambria/noeuds/noeud2.png" id="dra2">
									</div>
									<div class="draggernoeud" id="dragnoeud3">
										<img src="/escaperpg/images/ambria/noeuds/noeud3.png" id="dra3">
									</div>
									<div class="draggernoeud" id="dragnoeud4">
										<img src="/escaperpg/images/ambria/noeuds/noeud4.png" id="dra4">
									</div>
									<div class="draggernoeud" id="dragnoeud5">
										<img src="/escaperpg/images/ambria/noeuds/noeud5.png" id="dra5">
									</div>
									<div class="draggernoeud" id="dragnoeud6">
										<img src="/escaperpg/images/ambria/noeuds/noeud6.png" id="dra6">
									</div>
									<div class="draggernoeud" id="dragnoeud7">
										<img src="/escaperpg/images/ambria/noeuds/noeud7.png" id="dra7">
									</div>
									<div class="draggernoeud" id="dragnoeud8">
										<img src="/escaperpg/images/ambria/noeuds/noeud8.png" id="dra8">
									</div>
									<br>
									<br>
									<form action="embarquement" method="post">
										<input type="submit" name="reset" value="Réinitialiser.">
									</form>
									<br>
									<button type="submit" name="valider" onclick="check()" class="noway">Valider.</button>
								</center>
								<script src="/escaperpg/aventures/ambria/logan/scripts/dragdropnoeud.js"></script>
							';
						}
					else
						{
							echo'
								<p>
									Vous arrivez finalement sur les docks sans avoir rencontré de menace.<br>
									<br>
									À une centaine de mètres devant vous se dresse fièrement un navire gigantesque vers lequel Sullivan se dirige en pressant le pas.<br>
									Après avoir parcouru une cinquantaine de mètres, vous apercevez les silhouettes de quatre hommes sortant de l\'ombre d\'une ruelle et s\'arrêtant à mi-chemin,
									vous empêchant de rejoindre le Surgisseur des Tempêtes dans l\'immédiat.<br>
									<br>
									Sullivan s\'arrête et pousse un léger soupir avant de se tourner vers vous.
								</p>
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/ambria/sullivanmasonmini.png">
									</div>
									<div class="bulleperso">
										<p>
											J\'espère que tu sais aussi te battre avec autre chose qu\'un type bourré dans une taverne, petit...<br>
											T\'as de quoi te défendre ?
										</p>
									</div>
								</div>
								<center>
									<form action="embarquement" method="post">
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
