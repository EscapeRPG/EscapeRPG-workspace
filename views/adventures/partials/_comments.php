<?php

$comments = $sceneData['comments'] ?? [];
$commentTotal = (int)($sceneData['commentTotal'] ?? 0);
$pageCount = (int)($sceneData['commentPageCount'] ?? 1);
$currentPage = (int)($sceneData['commentPage'] ?? 1);
$defaultPseudo = (string)(ucwords($sceneData['commentDefaultPseudo'] ?? ''));
$commentScenario = (string)($sceneData['commentScenario'] ?? ($adventure['slug'] ?? ''));
$commentScene = (string)($sceneData['commentScene'] ?? $scene ?? 'fin');
$commentPath = '/aventures/' . $adventure['slug'] . '/' . $commentScene;

if (!function_exists('adventure_comment_hsl')) {
    function adventure_comment_hsl(string $pseudo): array
    {
        $hash = crc32($pseudo);
        $hue = $hash % 360;
        $saturation = 60 + ($hash % 30);
        $lightness = 100;

        return [$hue, $saturation, $lightness];
    }
}
?>

<?php if ($commentTotal === 0): ?>
    <p>Apparemment, personne n'a laissé de commentaire avant vous !</p>
<?php else: ?>
    <?php foreach ($comments as $comment): ?>
        <?php
        $commentDate = $comment['created_at'] != null ? date_create($comment['created_at']) : null;
        $date = $commentDate != null ? date_format($commentDate, 'd/m/Y') : null;
        $memberAvatar = (string)($comment['member_avatar'] ?? '');
        $commentNote = (int)($comment['note'] ?? 0);
        ?>
        <div class="dialogueCommentaire">
            <?php if ($memberAvatar !== ''): ?>
                <div class="portraitCommentaire">
                    <img src="<?= asset('assets/img/uploads/' . $memberAvatar) ?>"
                         alt="<?= e((string)($comment['pseudo'] ?? '')) ?>">
                </div>
            <?php else: ?>
                <div class="portraitCommentaire invite">
                    <?php include('assets/svg/invite.svg') ?>
                </div>
            <?php endif; ?>

            <div class="bulleCommentaire">
                <?php if ($commentNote >= 1 && $commentNote <= 5): ?>
                    <div class="commentaireNote" aria-label="Note : <?= $commentNote ?> sur 5">
                        <?php for ($star = 1; $star <= 5; $star++): ?>
                            <img
                                    src="<?= asset($star <= $commentNote ? 'assets/img/etoile.png' : 'assets/img/etoilevide.png') ?>"
                                    alt=""
                            >
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
                <div class="commentaireInfos">
                    <p class="nomCommentaire"><?= e((string)ucwords(($comment['pseudo'] ?? ''))) ?></p>
                    <?= $date != null ? '<p class="date">Le ' . $date . '</p>' : '' ?>
                </div>
                <p><?= nl2br(e((string)($comment['message'] ?? ''))) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if ($pageCount > 1): ?>
    <?php
    $isFirstPage = $currentPage <= 1;
    $isLastPage = $currentPage >= $pageCount;
    $firstPageUrl = url($commentPath . '?page=1');
    $previousPageUrl = url($commentPath . '?page=' . max(1, $currentPage - 1));
    $nextPageUrl = url($commentPath . '?page=' . min($pageCount, $currentPage + 1));
    $lastPageUrl = url($commentPath . '?page=' . $pageCount);
    ?>

    <nav class="comment-pagination" aria-label="Pagination des commentaires">
        <?php if ($isFirstPage): ?>
            <span class="comment-pagination__disabled" aria-hidden="true">❮❮</span>
            <span class="comment-pagination__disabled" aria-hidden="true">❮</span>
        <?php else: ?>
            <a href="<?= $firstPageUrl ?>" aria-label="Première page">❮❮</a>
            <a href="<?= $previousPageUrl ?>" aria-label="Page précédente">❮</a>
        <?php endif; ?>

        <span class="comment-pagination__current"><?= $currentPage . ' / ' . $pageCount ?></span>

        <?php if ($isLastPage): ?>
            <span class="comment-pagination__disabled" aria-hidden="true">❯</span>
            <span class="comment-pagination__disabled" aria-hidden="true">❯❯</span>
        <?php else: ?>
            <a href="<?= $nextPageUrl ?>" aria-label="Page suivante">❯</a>
            <a href="<?= $lastPageUrl ?>" aria-label="Dernière page">❯❯</a>
        <?php endif; ?>
    </nav>
<?php endif; ?>

<form action="<?= url($commentPath) ?>" method="post" class="formCommentaire">
    <fieldset>
        <legend>Laissez un commentaire !</legend>

        <div class="commentaireRow">
            <label for="nom">Votre nom (20 caractères max) :</label>
            <input type="text" name="nom" id="nom" placeholder="Votre pseudo" value="<?= e($defaultPseudo) ?>"
                   maxlength="20" required>
        </div>

        <div class="commentaireRow">
            <label for="message">Votre message :</label>
            <textarea name="message" id="message" rows="7" cols="50">J'ai terminé ce scénario !</textarea>
        </div>

        <div class="commentaireRow commentaireRatingRow">
            <span>Votre note :</span>
            <div class="commentaireRating" aria-label="Votre note">
                <?php for ($star = 5; $star >= 1; $star--): ?>
                    <input type="radio" name="note" id="comment-note-<?= $star ?>" value="<?= $star ?>" required>
                    <label for="comment-note-<?= $star ?>">
                        <span><?= $star ?> étoile<?= $star > 1 ? 's' : '' ?></span>
                    </label>
                <?php endfor; ?>
            </div>
        </div>

        <button type="submit" class="action" name="action" value="submit_comment">envoyer.</button>
    </fieldset>
</form>

<p>À bientôt pour de nouvelles aventures !</p>

<form action="<?= url('/#bloc2') ?>" method="get">
    <button type="submit" class="action" name="retour" value="1">Retour à l'accueil.</button>
</form>
