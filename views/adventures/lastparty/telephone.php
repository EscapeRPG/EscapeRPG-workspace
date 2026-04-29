<?php

$content = $sceneData['content'] ?? [];
$hintData = $sceneData['hintData'] ?? null;
$step = (int) ($sceneData['step'] ?? 0);
$faceeebookSeen = (bool) ($sceneData['faceeebookSeen'] ?? false);
$threads = $content['threads'] ?? [];
?>

<?php if (!empty($content['audio'])): ?>
    <audio src="<?= asset($content['audio']) ?>" autoplay></audio>
<?php endif; ?>

<?php if (!$faceeebookSeen && $step < 1): ?>
    <div class="enigmelieu">
        <img src="<?= asset('assets/img/lastparty/telephone.png') ?>" alt="téléphone">
        <form action="<?= url('/aventures/lastparty/telephone') ?>" method="post">
            <button type="submit" name="action" value="open_sms" id="sms"></button>
        </form>
    </div>
<?php else: ?>
    <?php if (!$faceeebookSeen && $step >= 2): ?>
        <audio src="<?= asset('assets/sounds/lastparty/message.mp3') ?>" autoplay></audio>
    <?php endif; ?>

    <?php if (!empty($content['intro'])): ?>
        <p><?= $content['intro'] ?></p>
    <?php endif; ?>

    <div class="discussion">
        <?php foreach ($threads as $thread): ?>
            <?php if ($step < (int) ($thread['min_step'] ?? 0)) {
                continue;
            } ?>

            <?php if (($thread['type'] ?? '') === 'reply'): ?>
                <div class="reponseTelephone">
                    <?php foreach (($thread['messages'] ?? []) as $message): ?>
                        <p><?= $message ?></p>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="nomdialogue"><?= e((string) ($thread['speaker'] ?? '')) ?></div>
                <div class="dialogue-sms">
                    <?php foreach (($thread['messages'] ?? []) as $message): ?>
                        <div class="bulle">
                            <p><?= $message ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <?php $conclusion = $content['conclusion'] ?? null; ?>
    <?php if (is_array($conclusion) && $step >= (int) ($conclusion['min_step'] ?? 0)): ?>
        <?php foreach (($conclusion['paragraphs'] ?? []) as $paragraph): ?>
            <p><?= $paragraph ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="<?= url('/aventures/lastparty/telephone') ?>" method="post">
        <?php if ($faceeebookSeen): ?>
            <?php if ($step < 4): ?>
                <button type="submit" class="action" name="action" value="answer_faceeebook_sms">Ouais.</button>
            <?php elseif ($step < 5): ?>
                <button type="submit" class="action" name="action" value="unlock_photos">Non.</button>
            <?php else: ?>
                <button type="submit" class="action" name="action" value="back_to_room">Je regarde.</button>
            <?php endif; ?>
        <?php elseif ($step < 2): ?>
            <button type="submit" class="action" name="action" value="reply_first">Qu'est-ce qu'il y a ?</button>
        <?php elseif ($step < 3): ?>
            <button type="submit" class="action" name="action" value="reply_second">???</button>
        <?php else: ?>
            <button type="submit" class="action" name="action" value="back_to_room">Retour.</button>
        <?php endif; ?>
    </form>
<?php endif; ?>

<?php require __DIR__ . '/../partials/_scene_hint.php'; ?>
