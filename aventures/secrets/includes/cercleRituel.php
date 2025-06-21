<div id="cerclerituel">
</div>
<br>
<div id="draggablesContainer">
</div>
<br>
<form action="shoggoth" method="post">
    <input type="submit" name="reset" value="Réinitialiser.">
</form>
<?php
$reponse = "<img src='/escaperpg/images/secrets/cerclerituelreponse.png' alt='réponse'>";
$indice1 = "Les trois symboles les plus excentrés doivent être complétés avec les astres (Soleil, Jupiter et Pluton).<br>
    Le plus grand cercle doit recevoir l'intention (Éveil Psychique, planète Terre, Protection et Bannir).<br>
    Les 4 symboles à l'intérieur du cercle interne sont ceux représentant les éléments Air, Eau, Feu et Terre (N-A signifie \"Nord-Air\", etc).<br>
    Tout au centre se trouveront les 3 symboles indiquant l'effet que vous voulez (Voyage, Lien, Éther).";
$indice2 = "Attention de bien suivre les indications pour placer les symboles dans le sens des aiguilles d'une montre ou inversement.";
$indice3 = "Le Lien est représenté par une Corde.";
include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/indices.php";
