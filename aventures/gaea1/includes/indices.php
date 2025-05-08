<?php
	if (isset ($_POST['indice'])) {
		$_SESSION['indicesutilises']++;
		$_SESSION['indice2'] ? $_SESSION['indice3'] = true : null;
		$_SESSION['indice1'] ? $_SESSION['indice2'] = true : null;
		$_SESSION['indice1'] = true;
	}
?>

<?php if (isset ($_POST['reponse'])): ?>
	<?php
		$_SESSION['reponsesutilisees']++;
		$_SESSION['indice1'] = false;
		$_SESSION['indice2'] = false;
		$_SESSION['indice3'] = false;
	?>

	<div id="reponse"><?= $reponse ?></div>

<?php else: ?>
	<div id="indice">
		<?php if ($_SESSION['indice1']): ?><?= $indice1 ?><?php endif; ?>

		<?php if ($_SESSION['indice2']): ?><br><br><?= $indice2 ?><?php endif; ?>

		<?php if ($_SESSION['indice3']): ?><br><br><?= $indice3 ?><?php endif; ?>
	</div>

	<form method="post">
		<button type="submit" name="<?= $_SESSION['indice3'] ? 'reponse' : 'indice' ?>" class="<?= $_SESSION['indice3'] ? 'boutonreponse' : 'boutonindice' ?>"></button>
	</form>
<?php endif; ?>