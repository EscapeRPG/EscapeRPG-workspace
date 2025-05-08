<?php session_start(); ini_set ("safe_mode" , "off"); $random = rand(100000, 999999); ?>
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
	   
		<link rel="stylesheet" href="/escaperpg/aventures/avent/styleavent.css">
		<meta charset="utf-8">
		<title>Sauvegarder - Le Grenier d'Arthur</title>
	</head>
	
	<body onload="chargement()">
		<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
		<div id="banniere"><img src="/escaperpg/images/avent/aventmini.png"></div>
		<div id="bloc_page">
			<nav><img src="/escaperpg/images/avent/sarah.png"></nav>
			<div id="txt">
				<?php
					if ($_SESSION['loggedin']) {
						echo'<div id="succespopup">';
						$nouveausucces = '<img src="/escaperpg/images/succes/general/sauvegarder.png"><span><u><b>Prendre une pause</b></u><br>Sauvegarder sa progression au cours d\'une aventure</span>';
						$scenario = 'general';
						$description = 'sauvegarder';
						$cache = 'non';
						$rarete = 'succesnormal';
						include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
						echo'<script src="/scripts/succescount.js"></script></div>';
						isset($_COOKIE['LOGGED_USER']) ? $nom = $_COOKIE['LOGGED_USER'] : $nom = htmlspecialchars($_SESSION['idcompte']);
						$code = $random;
						$session = session_encode();
						$page = $_SESSION['page'];
						$verifsave = $conn->prepare("SELECT * FROM avent WHERE id = ?");
						$verifsave->execute([$nom]);
						$saveexiste = $verifsave->rowCount();
						if ($saveexiste == 0) { $stmt = $conn->prepare("INSERT INTO avent (id, code, sess, savepage) VALUES (?, ?, ?, ?)"); $stmt->execute([$nom, $code, $session, $page]); }
						else { $stmt = $conn->prepare("UPDATE avent SET code=?, sess=?, savepage=? WHERE id=?"); $stmt->execute([$code, $session, $page, $nom]); }
						echo'<p>La partie a bien été sauvegardée.<br><br>Merci pour votre visite, nous espérons vous revoir bientôt sur EscapeRPG !</p>';
					}
					elseif (isset($_POST['continuer'])) {
						echo'<div id="succespopup">';
						$nouveausucces = '<img src="/escaperpg/images/succes/general/sauvegarder.png"><span><u><b>Prendre une pause</b></u><br>Sauvegarder sa progression au cours d\'une aventure</span>';
						$scenario = 'general';
						$description = 'sauvegarder';
						$cache = 'non';
						include_once $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
						echo'</div>';
						$nom = $_POST['nom'];
						$code = $_POST['code'];
						$session = session_encode();
						$page = $_SESSION['page'];
						$verifsave = $conn->prepare("SELECT * FROM avent WHERE id = ?");
						$verifsave->execute([$nom]);
						$saveexiste = $verifsave->rowCount();
						if ($saveexiste == 0) { $stmt = $conn->prepare("INSERT INTO avent (id, code, sess, savepage) VALUES (?, ?, ?, ?)"); $stmt->execute([$nom, $code, $session, $page]); }
						else { $stmt = $conn->prepare("UPDATE avent SET code=?, sess=?, savepage=? WHERE id=?"); $stmt->execute([$code, $session, $page, $nom]); }
						echo'<p>La partie a bien été sauvegardée.<br><br>Merci pour votre visite, nous espérons vous revoir bientôt sur EscapeRPG !</p>';
					}
					else {
						echo '
							<center>
								<p>
									Veuillez choisir un nom à donner à votre partie.<br>
									<br>
									<span class="important">20 caractères maximum, sans accents ni caractères spéciaux !<br>
									Gardez bien le code à retaper en mémoire, il vous sera demandé pour charger votre partie !</span>
								</p>
								<form action="save.php" method ="post">
									<input type="text" name="nom" id="nom" placeholder="Nom" required>
									<br>
									<br>
									<b>'.$random.'</b> 
									<br>
									<input type="text" name="code" id="code" placeholder="Retapez le code ci-dessus" pattern="[0-9]{6}" title="Veuillez entrer le code à 6 chiffres ci-dessus" required>
									<br>
									<br>
									<input type="submit" name="continuer" value="Sauvegarder.">
								</form>
							</center>
						';
					}
					echo'<center><input type="submit" onclick="window.close()" value="RETOUR"></center>';
				?>
			</div>
		</div>
		<div id="load"><div id="loader"></div></div>
		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
	</body>
</html>