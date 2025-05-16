<?php session_start();
ini_set("safe_mode", "off");
$random = rand(100000, 999999); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
	<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
	<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
	<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
	<meta charset="utf-8">
	<title>Sauvegarder - Station GAEA-1</title>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
	<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>
	<main>
		<nav>
			<?php if (isset($_SESSION['pjnom'])): ?>
				<div id="namenav">
					<?= $_SESSION['genre'] ? ($_SESSION['feminin'] ? 'Commandante' : 'Commandant') : null . ' ' . htmlspecialchars(ucfirst($_SESSION['pjprenom']) . ' ' . (strtoupper($_SESSION['pjnom']))) ?>
				</div>
				<div id="avatarnav-wrap">
					<img src="/escaperpg/images/gaea1/avatar/fond.png">
					<div id="avatarnav">
						<?= $_SESSION['avatar'] ?>

						<?php if ($_SESSION['combinaison']): ?>
							<img src="/escaperpg/images/gaea1/avatar/<?= $_SESSION['feminin'] ? 'combinaisonfemme' : 'combinaisonhomme' ?>.png">
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($_SESSION['combinaison']): ?>
				<div id="namenav">
					<h1>État de la combinaison :</h1>
					- Intégrité : <span class="systemes">100%</span>.<br>
					- Oxygène : <span class="<?= $_SESSION['oxygene'] > 50 ? 'systemes' : ($_SESSION['oxygene'] > 20 ? 'systemesdemi' : 'important') ?>"><?= $_SESSION['oxygene'] ?>%</span>.<br>
					- Sous-systèmes : <span class="systemes">OK</span>.
				</div>
			<?php endif; ?>
		</nav>
		<div id="txt">
			<?php if ($_SESSION['loggedin']): ?>
				<div id="succespopup">
					<?php
					$nouveausucces = '<img src="/escaperpg/images/succes/general/sauvegarder.png"><span><u><b>Prendre une pause</b></u><br>Sauvegarder sa progression au cours d\'une aventure</span>';
					$scenario = 'general';
					$description = 'sauvegarder';
					$cache = 'non';
					$rarete = 'succesnormal';
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					?>
				</div>
				<?php
				isset($_COOKIE['LOGGED_USER']) ? $nom = $_COOKIE['LOGGED_USER'] : $nom = htmlspecialchars($_SESSION['idcompte']);
				$code = $random;
				$session = session_encode();
				$page = $_SESSION['page'];
				$verifsave = $conn->prepare("SELECT * FROM gaea1 WHERE id = ?");
				$verifsave->execute([$nom]);
				$saveexiste = $verifsave->rowCount();
				if ($saveexiste == 0) {
					$stmt = $conn->prepare("INSERT INTO gaea1 (id, code, sess, savepage) VALUES (?, ?, ?, ?)");
					$stmt->execute([$nom, $code, $session, $page]);
				} else {
					$stmt = $conn->prepare("UPDATE gaea1 SET code=?, sess=?, savepage=? WHERE id=?");
					$stmt->execute([$code, $session, $page, $nom]);
				}
				?>
				<p>
					La partie a bien été sauvegardée.<br>
					<br>
					Merci pour votre visite, nous espérons vous revoir bientôt sur EscapeRPG !
				</p>
			<?php elseif (isset($_POST['continuer'])): ?>
				<div id="succespopup">
					<?php
					$nouveausucces = '<img src="/escaperpg/images/succes/general/sauvegarder.png"><span><u><b>Prendre une pause</b></u><br>Sauvegarder sa progression au cours d\'une aventure</span>';
					$scenario = 'general';
					$description = 'sauvegarder';
					$cache = 'non';
					include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/succesadd.php";
					?>
				</div>
				<?php
				$nom = $_POST['nom'];
				$code = $_POST['code'];
				$session = session_encode();
				$page = $_SESSION['page'];
				$verifsave = $conn->prepare("SELECT * FROM gaea1 WHERE id = ?");
				$verifsave->execute([$nom]);
				$saveexiste = $verifsave->rowCount();
				if ($saveexiste == 0) {
					$stmt = $conn->prepare("INSERT INTO gaea1 (id, code, sess, savepage) VALUES (?, ?, ?, ?)");
					$stmt->execute([$nom, $code, $session, $page]);
				} else {
					$stmt = $conn->prepare("UPDATE gaea1 SET code=?, sess=?, savepage=? WHERE id=?");
					$stmt->execute([$code, $session, $page, $nom]);
				}
				?>
				<p>
					La partie a bien été sauvegardée.<br>
					<br>
					Merci pour votre visite, nous espérons vous revoir bientôt sur EscapeRPG !
				</p>
			<?php else: ?>
				<p>
					Veuillez choisir un nom à donner à votre partie.<br>
					<br>
					<span class="important">
						20 caractères maximum, sans accents ni caractères spéciaux.<br>
						Gardez bien le code à retaper en mémoire, il vous sera demandé pour charger votre partie !
					</span>
				</p>
				<form action="save" method="post">
					<input type="text" name="nom" id="nom" placeholder="Nom" maxlength="20" required><br>
					<br>
					<b><?= $random ?></b>
					<br>
					<input type="text" name="code" id="code" placeholder="Retapez le code ci-dessus" pattern="[0-9]{6}" title="Veuillez entrer le code à 6 chiffres ci-dessus" required><br>
					<br>
					<input type="submit" name="continuer" value="Sauvegarder.">
				</form>
			<?php endif; ?>
			<input type="submit" onclick="window.close()" value="RETOUR">
		</div>
	</main>
	<div id="load">
		<div id="loader"></div>
	</div>
	<script src="/escaperpg/scripts/aventures-chargement.js"></script>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/footer.php"; ?>
</body>

</html>
