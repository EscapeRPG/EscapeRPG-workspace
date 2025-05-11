<?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/entete.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script type="text/javascript" src="/escaperpg/lightbox/js/prototype.js"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="/escaperpg/lightbox/js/lightbox.js"></script>
    <link rel="stylesheet" href="/escaperpg/lightbox/css/lightbox.css" type="text/css" media="screen">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/styleAventures.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/styleLastParty.php"; ?>
    <meta charset="utf-8">
    <title>Messages - Last Party</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/header.php"; ?>
    <div id="banniere"><img src="/escaperpg/images/lastparty/lpmini.png" alt="last party bannière"></div>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/nav.php"; ?>
        <div id="txt">
            <?php if (isset($_SESSION['faceeebook'])): ?>
                <audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
                <p>Un nouveau message d'Axel sur votre téléphone.</p>
                <div class="discussion">
                    <div class="nomdialogue">Axel</div>
                    <div class="dialogue">
                        <div class="bulle">
                            <p>Alors, t'as vu ?</p>
                        </div>
                    </div>
                    <?php if (isset($_POST['ouais']) || isset($_SESSION['sms2'])): ?>
                        <?php $_SESSION['sms2'] = true; ?>
                        <div class="reponseTelephone">
                            <p>Ouais.</p>
                        </div>
                        <div class="nomdialogue">Axel</div>
                        <div class="dialogue">
                            <div class="bulle">
                                <p>C'est quoi ce délire ? Tu te souviens de quelque chose, toi ?</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_POST['non'])): ?>
                        <?php unset($_SESSION['sms2']); ?>
                        <div class="reponseTelephone">
                            <p>Non.</p>
                        </div>
                        <div class="nomdialogue">Axel</div>
                        <div class="dialogue">
                            <div class="bulle">
                                <p>Moi non plus !</p>
                            </div>
                            <div class="bulle">
                                <p>C'est hyper chelou cette hisoire !</p>
                            </div>
                            <div class="bulle">
                                <p>Mais dis-moi, toi qui aimes prendre des photos tout le temps, tu aurais pas quelque chose sur ton appareil ?</p>
                            </div>
                        </div>
                        <?php $_SESSION['photos'] = true; ?>
                    <?php endif; ?>
                </div>

                <?php if (isset($_POST['non'])): ?>
                    <form action="appartement" method="post">
                        <input type="submit" name="appart" value="Je regarde.">
                    </form>
                <?php else: ?>
                    <form action="telephone" method="post">
                        <input type="submit"
                            name="<?= isset($_POST['ouais']) ? 'non' : 'ouais' ?>"
                            value="<?= isset($_POST['ouais']) ? 'non' : 'ouais' ?>.">
                    </form>
                <?php endif; ?>
            <?php elseif (isset($_POST['sms']) || isset($_SESSION['sms'])): ?>
                <?php $_SESSION['sms'] = true; ?>
                <p>Vous avez 3 nouveaux messages de votre ami Axel.</p>
                <div class="discussion">
                    <div class="nomdialogue">Axel</div>
                    <div class="dialogue">
                        <div class="bulle">
                            <p>Jonathan, t'es réveillé ?</p>
                        </div>
                        <div class="bulle">
                            <p>Ohé ??</p>
                        </div>
                        <div class="bulle">
                            <p>Mec, réponds !!</p>
                        </div>
                    </div>
                    <?php if (isset($_POST['suivant']) || isset($_SESSION['sms2'])): ?>
                        <?php $_SESSION['sms2'] = true; ?>
                        <audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
                        <div class="reponseTelephone">
                            <p>Qu'est-ce qu'il y a ?</p>
                        </div>
                        <div class="nomdialogue">Axel</div>
                        <div class="dialogue">
                            <div class="bulle">
                                <p>Ah, t'es là ! Mec, t'as vu le message de Juliette sur sa page ?</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_POST['suivant2'])): ?>
                        <?php unset($_SESSION['sms2']); ?>
                        <audio src="/escaperpg/sons/lastparty/message.mp3" autoplay></audio>
                        <div class="reponseTelephone">
                            <p>???</p>
                        </div>
                        <div class="nomdialogue">Axel</div>
                        <div class="dialogue">
                            <div class="bulle">
                                <p>Va voir directement sur son profil faceeebook, ce sera plus simple !</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (isset($_POST['suivant2'])): ?>
                    <p>
                        Pour des raisons qui vous échappent, votre téléphone vous a toujours refusé l'accès à Faceeebook.
                        Il va donc falloir trouver un autre moyen de vous y rendre.
                    </p>
                    <form action="appartement" method="post">
                        <input type="submit" name="retour" value="Retour.">
                    </form>
                <?php else: ?>
                    <form action="telephone" method="post">
                        <input type="submit"
                            name="<?= isset($_POST['suivant']) ? 'suivant2' : 'suivant' ?>"
                            value="<?= isset($_POST['suivant']) ? '???' : 'Qu\'est-ce qu\'il y a ?' ?>">
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <div id="enigmelieu">
                    <img src="/escaperpg/images/lastparty/telephone.png" alt="telephone">
                    <form action="telephone" method="post">
                        <button type="submit" name="sms" id="sms"></button>
                    </form>
                </div>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/includes/resetIndices.php"; ?>
            <?php endif; ?>
        </div>
    </main>
    <div id="load">
        <div id="loader"></div>
    </div>
    <script src="/escaperpg/scripts/aventures-chargement.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/escaperpg/aventures/lastparty/includes/footer.php"; ?>
</body>

</html>
