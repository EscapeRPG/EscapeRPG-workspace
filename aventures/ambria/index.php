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
		<title>Introduction - Le Trésor d'Ambria</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/ambria/tresorambria.png"></div>
		<main>
			<nav><img src="/escaperpg/images/ambria/ambriamedaillon.png"></nav>
			<div id="txt">
				<?php
					if (isset($_POST['new']))
						{
							include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/sessioninc.php";
							echo '
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/narrateur.png" alt="narrateur">
									</div>
									<div class="bulleperso">
										<p>
											Le Trésor d\'Ambria est un scénario pour deux joueurs.<br>
											L\'un de vous va incarner Sullivan Mason et l\'autre sera Logan Barthélémy.<br>
											<br>
											Chacun de son côté, vous allez vivre l\'aventure du point de vue de votre personnage et vous serez parfois amenés à coopérer pour avancer.
											Il sera donc important d\'être en communication pour pouvoir échanger vos informations à tout moment,
											car certains mots de passe ou éléments visuels que vous verrez serviront à l\'autre joueur !
											Les mots de passe qui ne vous concernent pas directement seront indiqués en bleu.<br>
											<br>
											Faites également attention : il est possible d\'échouer certaines des énigmes de ce scénario.<br>
											Dans ce cas, l\'histoire continuera mais des conséquences seront peut-être à prévoir...
										</p>
									</div>
								</div>
								<center>
									Vous pouvez choisir votre personnage ci-dessous.
								</center>
								<center>
									<div class="card">
										<div class="cardfond">
											<h3>
												Sullivan Mason
											</h3>
											<div class="cardimage">
												<a href="/escaperpg/aventures/ambria/sullivan/depart.php"><img src="/escaperpg/images/ambria/sullivancard.png"></a>
											</div>
											<p>
												Le capitaine du Surgisseur des Tempêtes.<br>
												Réputé sombre et cruel, c\'est un pirate redouté par tous.<br>
												<br>
												Sullivan est depuis longtemps à la recherche d\'une trésor mythique, se trouvant sur une île mystérieuse...
											</p>
										</div>
									</div>
									<div class="card">
										<div class="cardfond">
											<h3>
												Logan Barthélémy
											</h3>
											<div class="cardimage">
												<a href="/escaperpg/aventures/ambria/logan/depart.php"><img src="/escaperpg/images/ambria/logancard.png"></a>
											</div>
											<p>
												Un jeune habitant de l\'Île de la Tortue, candide, sincère et rêvant d\'aventure.<br>
												<br>
												Logan est désespérément à la recherche d\'un moyen d\'échapper à sa vie de misère...
											</p>
										</div>
									</div>
								</center>
							';
						}
					else
						{
							echo'
								<div class="dialogue">
									<div class="portrait">
										<img src="/escaperpg/images/narrateur.png" alt="narrateur">
									</div>
									<div class="bulleperso">
										<p>
											Vous désirez jouer à ce scénario avec une musique appropriée ?<br>
											Je vous conseille de vous rendre sur <a href="https://www.youtube.com/watch?v=ZWxlwLYCBsE&list=PLggiqSd087TTdgGLjiM-8IaYENm_lghaD" target="_blank" rel="noreferrer">ce lien</a> pour plus d\'immersion !<br>
											<br>
											Bonne aventure à vous !
										</p>
									</div>
								</div>
								<center>
									<form action="index" method="post">
										<input type="submit" name="new" value="NOUVELLE PARTIE.">
									</form>
									<br>
									<form action="save/load" method="post">
										<input type="submit" name="load" value="CHARGER UNE PARTIE.">
									</form>
								</center>
							';
						}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
	</body>
</html>
