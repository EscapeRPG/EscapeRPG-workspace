<?php if (!empty($hintData)): ?>
    <?php if (!empty($hintData['answer_revealed'])): ?>
        <div class="reponse">
            <?php foreach (($hintData['answer']['paragraphs'] ?? []) as $paragraph): ?>
                <p><?= $paragraph ?></p>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="indice">
            <?php foreach (($hintData['levels'] ?? []) as $index => $level): ?>
                <?php if ($index > 0): ?>
                    <br><br>
                <?php endif; ?>

                <?php foreach (($level['paragraphs'] ?? []) as $paragraphIndex => $paragraph): ?>
                    <?php if ($paragraphIndex > 0): ?>
                        <br><br>
                    <?php endif; ?>
                    <?= $paragraph ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>

        <form action="<?= url('/aventures/' . ($adventure['slug'] ?? '') . '/' . $scene) ?>" method="post">
            <?php if (!empty($hintData['can_reveal_answer'])): ?>
                <button type="submit" name="action" value="show_answer" class="boutonreponse"></button>
            <?php elseif (!empty($hintData['has_next_hint'])): ?>
                <button type="submit" name="action" value="request_hint" class="boutonindice"></button>
            <?php endif; ?>
        </form>
    <?php endif; ?>
<?php endif; ?>
