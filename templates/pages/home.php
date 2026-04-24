<?php

declare(strict_types=1);

use EscapeRPG\Framework\Domain\Game\GameState;

/** @var string $appName */
/** @var string $environment */
/** @var GameState $gameState */

ob_start();
?>
<section class="hero">
    <span class="pill">Base prête pour migration progressive</span>
    <h1><?= htmlspecialchars($appName, ENT_QUOTES, 'UTF-8') ?></h1>
    <p>
        Ce socle est isolé du projet historique et servira de point de départ pour migrer
        les scènes, l'état de jeu et les interactions une par une.
    </p>
</section>

<section class="grid">
    <article class="card">
        <h2>Structure</h2>
        <p class="muted">Le framework est organisé en couches simples pour rester lisible pendant la transition.</p>
        <ul>
            <li><strong>Controller</strong> : reçoit la requête et renvoie une réponse</li>
            <li><strong>Domain</strong> : porte l'état de jeu et les futures scènes</li>
            <li><strong>Infrastructure</strong> : session et rendu des vues</li>
            <li><strong>Templates</strong> : vues passives</li>
        </ul>
    </article>

    <article class="card">
        <h2>Etat de jeu</h2>
        <p class="muted">Le nouvel état est déjà structuré et prêt à remplacer les accès directs à <code>$_SESSION</code>.</p>
        <span class="code"><?= htmlspecialchars(json_encode($gameState->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8') ?></span>
    </article>

    <article class="card">
        <h2>Routes disponibles</h2>
        <ul>
            <li><code>/</code> : page d'accueil du nouveau socle</li>
            <li><code>/health</code> : contrôle rapide du framework</li>
        </ul>
    </article>

    <article class="card">
        <h2>Prochaine étape</h2>
        <p>
            On pourra maintenant ajouter un module <code>Scene</code>, un contrôleur dédié,
            puis migrer une première salle comme <code>cimetiere</code> ou <code>chambre</code>.
        </p>
        <p class="muted">Environnement courant : <?= htmlspecialchars($environment, ENT_QUOTES, 'UTF-8') ?></p>
    </article>
</section>
<?php
$content = (string) ob_get_clean();

require __DIR__ . '/../layouts/app.php';
