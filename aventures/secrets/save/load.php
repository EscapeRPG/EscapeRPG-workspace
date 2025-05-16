<?php session_start(); ini_set ("safe_mode" , "off"); ?>
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
		<title>Charger - Secrets Familiaux</title>
	</head>
	
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/secrets/secretsfamiliaux.png"></div>
		<main>
			<nav><a href="/escaperpg/images/secrets/inspecteurdeckard.png" rel="lightbox[bastian]" title="inspecteurdeckard"><img src="/escaperpg/images/secrets/inspecteurdeckardmini.png"></a></nav>
			<div id="txt">
				<?php
					if ($_SESSION['loggedin']) {
						echo'<div id="succespopup">';
						$nouveausucces = '<img src="/escaperpg/images/succes/general/charger.png"><span><u><b>On reprend ?</b></u><br>Reprendre sa progression dans une aventure</span>';
						$scenario = 'general';
						$description = 'charger';
						$cache = 'non';
						$rarete = 'succesnormal';
						include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
						echo'<script src="/scripts/succescount.js"></script></div>';
						isset($_COOKIE['LOGGED_USER']) ? $nom = $_COOKIE['LOGGED_USER'] : $nom = htmlspecialchars($_SESSION['idcompte']);
						$query = $conn->prepare("SELECT * FROM secretsfamiliaux WHERE id=? ORDER BY id DESC LIMIT 1");
						$query->execute([$nom]);
						$result = $query->fetch();
						if ($result) {
							$sess = $result['sess'];
							$savepage = $result['savepage'];
							$session = session_decode($sess);
							echo'<p>La partie a été chargée avec succès ! Rendez-vous sur <a href='.$savepage.'>cette page</a> pour la reprendre !</p>';
						}
						else { echo'<p>Il y a eu une erreur quelque part, veuillez contacter le support à <a href="mailto:escaperpg@escaperpg.com">escaperpg [ at ] escaperpg.com</a> pour retrouver votre sauvegarde.</p>'; }
					}
					elseif (isset($_POST['continuer'])) {
						echo'<div id="succespopup">';
						$nouveausucces = '<img src="/escaperpg/images/succes/general/charger.png"><span><u><b>On reprend ?</b></u><br>Reprendre sa progression dans une aventure</span>';
						$scenario = 'general';
						$description = 'charger';
						$cache = 'non';
						include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
						echo'</div>';
						$nom = $_POST['nom'];
						$code = $_POST['code'];
						$query = $conn->prepare("SELECT * FROM secretsfamiliaux WHERE id=? AND code=?");
						$query->execute([$nom, $code]);
						$result = $query->fetch();
						if ($result) {
							$sess = $result['sess'];
							$savepage = $result['savepage'];
							$session = session_decode($sess);
							echo'<p>La partie a été chargée avec succès ! Rendez-vous sur <a href='.$savepage.'>cette page</a> pour la reprendre !</p>';
						}
						else {
							echo'
								<p>Il y a eu une erreur quelque part, veuillez réessayer.</p>
								<center>
									<form action="load" method="post">
										<input type="text" name="nom" id="nom" placeholder="Nom" required>
										<input type="text" name="code" id="code" placeholder="Code" required>
										<input type="submit" name="continuer" value="Charger.">
									</form>
								</center>
							';
						}
					}
					else {			
						echo '
							<p>Veuillez entrer le nom et le code utilisés lors de votre dernière sauvegarde.</p>
							<center>
								<form action="load" method="post">
									<input type="text" name="nom" id="nom" placeholder="Nom" required>
									<input type="text" name="code" id="code" placeholder="Code" required>
									<input type="submit" name="continuer" value="Charger.">
								</form>
							</center>
						';
					}
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/secrets/includes/footer.php"; ?>
	</body>
</html>
