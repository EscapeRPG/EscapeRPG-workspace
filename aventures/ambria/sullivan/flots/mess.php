<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/stylesAmbria.php"; ?>
    <meta charset="utf-8">
    <title>Mess - Le Trésor d'Ambria</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/ambria/tresorambriamini.png" alt="le trésor d'ambria"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/includes/nav-sullivan.php"; ?>
        <div id="txt">
            <?php if (isset($_POST['demander'])): ?>
                <?php switch (handleSpecialChars($_POST['ask'])):
                    case "logan": ?>
                        <p>
                            Haussant le ton, vous demandez à vos hommes s'ils savent où se trouve le jeune mousse, mais vous obtenez des résultats peu satisfaisants.<br>
                            Certains pensent l'avoir vu se diriger vers la <span class="lieu">cale</span>,
                            tandis que d'autres affirment qu'ils l'ont vu s'arrêter au <span class="lieu">quartier des équipages</span>.
                        </p>
                        <form action="mess" method="post">
                            <input list="notesListe" name="ask">
                            <input type="submit" name="demander" value="Demander.">
                        </form>
                    <?php break;
                    case "jake": ?>
                        <p>
                            Hurlant presque pour vous faire entendre, vous essayez de savoir si quelqu'un a vu Jake récemment,
                            mais personne ne semble pouvoir vous répondre clairement.<br>
                            De ce que vous réussissez à en tirer, Jake serait passé ici un peu plus tôt dans la journée mais,
                            à part le coq, personne ne s'y trouvait à ce moment et ce dernier était en train de préparer un ragoût pour le repas de ce soir
                            et n'a pas vu où il est parti.
                        </p>
                        <form action="mess" method="post">
                            <input list="notesListe" name="ask">
                            <input type="submit" name="demander" value="Demander.">
                        </form>
                    <?php break;
                    default: ?>
                        <p>
                            Les hommes d'équipage présents ici ne semblent pas comprendre où vous voulez en venir.
                        </p>
                        <form action="mess" method="post">
                            <input list="notesListe" name="ask">
                            <input type="submit" name="demander" value="Demander.">
                        </form>
                <?php endswitch; ?>
            <?php else: ?>
                <audio src="/escaperpg/sons/ambria/mess.mp3" autoplay></audio>
                <p>
                    Le mess est l'endroit où la plupart des hommes viennent lorsqu'ils ont un peu de temps libre pour manger, boire ou discuter.<br>
                    En approchant, vous entendez les clameurs à travers la porte. Vous ne savez pas ce qu'il se passe à l'intérieur exactement,
                    mais il semblerait que des hommes se soient engagés dans une sorte de lutte.
                    C'est une chose assez habituelle sur le navire pour calmer les tensions et permettre aux hommes de se défouler un peu.
                    Il arrive rarement qu'un homme soit grièvement blessé lors d'une de ces rixes.<br>
                    Vous poussez la porte pour entrer.<br>
                    <br>
                    Une demi-douzaine des membres de l'équipage se tient là autour d'une table.
                    Deux d'entre eux sont engagés dans un bras de fer, les autres s'étant placés de part et d'autre pour encourager leur champion.<br>
                    <br>
                    Vous vous raclez la gorge pour leur faire remarquer votre présence. Ils s'arrêtent instantanément, attendant de savoir ce que vous avez à leur dire.
                </p>
                <form action="mess" method="post">
                    <input list="notesListe" name="ask"><input type="submit" name="demander" value="Demander.">
                </form>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/ambria/sullivan/includes/footer.php"; ?>
</body>

</html>
