<aside>
    <img src="<?= asset('assets/img/lastparty/jonathan.png') ?>" alt="jonathan">
    <div id="inventairefooter"><input type="submit" value="INVENTAIRE"></div>
    <div id="motsdepasse"><input type="submit" value="NOTES"></div>
    <form action="<?= url('/aventures/' . ($adventure['slug'] ?? '') . '/' . $scene) ?>" method="post">
        <input type="hidden" name="action" value="save_game">
        <input type="submit" name="save" value="SAUVEGARDER">
    </form>
</aside>
