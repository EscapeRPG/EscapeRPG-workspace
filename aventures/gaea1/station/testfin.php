<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; $_SESSION['fuir'] = true; $_SESSION['visitestation'] = false;?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
		<link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="/escaperpg/aventures/gaea1/css/style.css">
		<meta charset="utf-8">
		<title>Fuir ou Mourir - Station GAEA-1</title>
	</head>

	<body onload="chargement()">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>

		<div id="banniere"><img src="/escaperpg/images/gaea1/gaea1mini.png" alt="gaea 1 bannière"></div>

		<main>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/nav.php"; ?>

			<div id="txt">
				<div id="canvas-wrap">
					<img src="/escaperpg/images/gaea1/taquin/fond.png">
					<div id="planevac">
						<div id="hsallefond" onclick="hsalle()"><img src="/escaperpg/images/gaea1/taquin/hclosed.png" id="hsalletop" class="hidden"></div>
						<div id="nsallefond" onclick="nsalle()"><img src="/escaperpg/images/gaea1/taquin/nclosed.png" id="nsalletop" class="hidden"></div>
						<div id="asallefond" onclick="asalle()"><img src="/escaperpg/images/gaea1/taquin/aclosed.png" id="asalletop"></div>
						<div id="bsallefond" onclick="bsalle()"><img src="/escaperpg/images/gaea1/taquin/bclosed.png" id="bsalletop" class="hidden"></div>
						<div id="csallefond" onclick="csalle()"><img src="/escaperpg/images/gaea1/taquin/cclosed.png" id="csalletop"></div>
						<div id="dsallefond" onclick="dsalle()"><img src="/escaperpg/images/gaea1/taquin/dclosed.png" id="dsalletop" class="hidden"></div>
						<div id="esallefond" onclick="esalle()"><img src="/escaperpg/images/gaea1/taquin/eclosed.png" id="esalletop" class="hidden"></div>
						<div id="fsallefond" onclick="fsalle()"><img src="/escaperpg/images/gaea1/taquin/fclosed.png" id="fsalletop"></div>
						<div id="gsallefond" onclick="gsalle()"><img src="/escaperpg/images/gaea1/taquin/gclosed.png" id="gsalletop" class="hidden"></div>
						<div id="isallefond" onclick="isalle()"><img src="/escaperpg/images/gaea1/taquin/iclosed.png" id="isalletop"></div>
						<div id="jsallefond" onclick="jsalle()"><img src="/escaperpg/images/gaea1/taquin/jclosed.png" id="jsalletop"></div>
						<div id="ksallefond" onclick="ksalle()"><img src="/escaperpg/images/gaea1/taquin/kclosed.png" id="ksalletop" class="hidden"></div>
						<div id="lsallefond" onclick="lsalle()"><img src="/escaperpg/images/gaea1/taquin/lclosed.png" id="lsalletop" class="hidden"></div>
						<div id="msallefond" onclick="msalle()"><img src="/escaperpg/images/gaea1/taquin/mclosed.png" id="msalletop" class="hidden"></div>
						<div id="osallefond" onclick="osalle()"><img src="/escaperpg/images/gaea1/taquin/oclosed.png" id="osalletop"></div>
						<div id="psallefond" onclick="psalle()"><img src="/escaperpg/images/gaea1/taquin/pclosed.png" id="psalletop"></div>
						<div id="qsallefond" onclick="qsalle()"><img src="/escaperpg/images/gaea1/taquin/qclosed.png" id="qsalletop"></div>
						<div id="rsallefond" onclick="rsalle()"><img src="/escaperpg/images/gaea1/taquin/rclosed.png" id="rsalletop" class="hidden"></div>
						<div id="ssallefond" onclick="ssalle()"><img src="/escaperpg/images/gaea1/taquin/sclosed.png" id="ssalletop"></div>
						<div id="tsallefond" onclick="tsalle()"><img src="/escaperpg/images/gaea1/taquin/tclosed.png" id="tsalletop"></div>
					</div>

					<div id="planevacoverlay">
						<div id="esallefond"><div id="tokenpj"><img src="/escaperpg/images/gaea1/avatar/fond.png"><?php echo $_SESSION['avatar']; ?></div></div>
						<div id="qsallefond"><div id="tokenobjectif"></div></div>
					</div>
				</div>

				<div id="timer"></div>
			</div>

			<script src="/escaperpg/aventures/gaea1/scripts/verrouillage.js"></script>
		</div>

		<div id="load"><div id="loader"></div></div>

		<script src="/escaperpg/scripts/aventures-chargement.js"></script>
		
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/gaea1/includes/footer.php"; ?>
	</body>
</html>
