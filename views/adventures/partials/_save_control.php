<?php

$saveActionUrl = (string)($saveActionUrl ?? '');
?>

<form action="<?= e($saveActionUrl) ?>" method="post">
    <input type="hidden" name="action" value="save_game">
    <input type="submit" name="save" value="SAUVEGARDER">
</form>
