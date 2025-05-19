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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/avent/css/style.css">
		<meta charset="utf-8">
		<title>Cartes - Le Grenier d'Arthur</title>
	</head>
	
	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png"></div>
		<main>
			<nav><img src="/escaperpg/images/avent/sarah.png"></nav>
			<div id="txt">
				<div id="cartes">
					<p>
						Tout au long de votre aventure, il vous sera demandé de tirer des cartes.<br>
						Celles-ci correspondent à votre inventaire et vous seront d'une grande utilité pour terminer votre aventure.<br>
						<br>
						Pour les retourner, il suffit de cliquer dessus. Une fois qu'une carte est révélée, vous pouvez à nouveau cliquer dessus pour l'ouvrir en grand et mieux l'observer.<br>
						Évitez de toutes les retourner dès le début du jeu, cela ne vous avancerait à rien et rendrait votre progression plus pénible.<br>
						<br>
						Si vous le préférez, vous pouvez obtenir une version imprimable des cartes <a href="/escaperpg/images/avent/cartes/versionimprimable.pdf" target="_blank" rel="noreferrer">ici</a> pour avoir le jeu de cartes entre les mains.
						Veillez alors à imprimer les pages 1 et 2 en recto-verso, de même pour les pages 3 et 4.
					</p>
					<?php
						if (isset ($_POST['1carte']) OR $_SESSION['carte1'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/1recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/1recto.png"></a>
									</div>
								';
								$_SESSION['carte1'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="1carte">
												<img src="/escaperpg/images/avent/cartes/1verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['2carte']) OR $_SESSION['carte2'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/2recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/2recto.png"></a>
									</div>
								';
								$_SESSION['carte2'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="2carte">
												<img src="/escaperpg/images/avent/cartes/2verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['3carte']) OR $_SESSION['carte3'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/3recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/3recto.png"></a>
									</div>
								';
								$_SESSION['carte3'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="3carte">
												<img src="/escaperpg/images/avent/cartes/3verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['4carte']) OR $_SESSION['carte4'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/4recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/4recto.png"></a>
									</div>
								';
								$_SESSION['carte4'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="4carte">
												<img src="/escaperpg/images/avent/cartes/4verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['5carte']) OR $_SESSION['carte5'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/5recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/5recto.png"></a>
									</div>
								';
								$_SESSION['carte5'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="5carte">
												<img src="/escaperpg/images/avent/cartes/5verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['6carte']) OR $_SESSION['carte6'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/6recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/6recto.png"></a>
									</div>
								';
								$_SESSION['carte6'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="6carte">
												<img src="/escaperpg/images/avent/cartes/6verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['7carte']) OR $_SESSION['carte7'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/7recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/7recto.png"></a>
									</div>
								';
								$_SESSION['carte7'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="7carte">
												<img src="/escaperpg/images/avent/cartes/7verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['8carte']) OR $_SESSION['carte8'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/8recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/8recto.png"></a>
									</div>
								';
								$_SESSION['carte8'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="8carte">
												<img src="/escaperpg/images/avent/cartes/8verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['9carte']) OR $_SESSION['carte9'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/9recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/9recto.png"></a>
									</div>
								';
								$_SESSION['carte9'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="9carte">
												<img src="/escaperpg/images/avent/cartes/9verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['10carte']) OR $_SESSION['carte10'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/10recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/10recto.png"></a>
									</div>
								';
								$_SESSION['carte10'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="10carte">
												<img src="/escaperpg/images/avent/cartes/10verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['11carte']) OR $_SESSION['carte11'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/11recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/11recto.png"></a>
									</div>
								';
								$_SESSION['carte11'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="11carte">
												<img src="/escaperpg/images/avent/cartes/11verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['12carte']) OR $_SESSION['carte12'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/12recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/12recto.png"></a>
									</div>
								';
								$_SESSION['carte12'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="12carte">
												<img src="/escaperpg/images/avent/cartes/12verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['13carte']) OR $_SESSION['carte13'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/13recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/13recto.png"></a>
									</div>
								';
								$_SESSION['carte13'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="13carte">
												<img src="/escaperpg/images/avent/cartes/13verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['14carte']) OR $_SESSION['carte14'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/14recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/14recto.png"></a>
									</div>
								';
								$_SESSION['carte14'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="14carte">
												<img src="/escaperpg/images/avent/cartes/14verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['15carte']) OR $_SESSION['carte15'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/15recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/15recto.png"></a>
									</div>
								';
								$_SESSION['carte15'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="15carte">
												<img src="/escaperpg/images/avent/cartes/15verso.png">
											</button>
										</form>
									</div>
								';
							}
						if (isset ($_POST['16carte']) OR $_SESSION['carte16'])
							{
								echo '
									<div id="inventaire">
										<a href="/escaperpg/images/avent/cartes/16recto.png" rel="lightbox[invent]"><img src="/escaperpg/images/avent/cartes/16recto.png"></a>
									</div>
								';
								$_SESSION['carte16'] = true;
							}
						else
							{
								echo '
									<div id="inventaire">
										<form action="cartes" method="post">
											<button type="submit" name="16carte">
												<img src="/escaperpg/images/avent/cartes/16verso.png">
											</button>
										</form>
									</div>
								';
							}
					?>
				</div>
				<br>
				<br>
				<center>
					<form action="cartes" method="post">
						<input type="submit" name="close" value="Fermer." onclick="window.close()"/>
					</form>
				</center>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
	</body>
</html>
