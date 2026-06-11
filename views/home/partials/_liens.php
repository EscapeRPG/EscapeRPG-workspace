<section id="bloc4" class="home-section">
    <div class="lienspage">
        <div class="liste">
            <?php foreach (($liens['tabs'] ?? []) as $tab): ?>
                <button type="button" class="dropbtn" data-category-target="<?= htmlspecialchars($tab['id'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($tab['label'], ENT_QUOTES, 'UTF-8') ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="dropdown links-display" data-category-panel="liens">
            <?php foreach (($liens['links'] ?? []) as $item): ?>
                <div class="links-display__item">
                    <a href="<?= htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noreferrer">
                        <img src="<?= asset($item['image'] ?? '') ?>" alt="<?= htmlspecialchars($item['alt'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    </a>
                    <p><?= htmlspecialchars($item['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="dropdown" data-category-panel="faq">
            <?php foreach (($liens['faq'] ?? []) as $index => $item): ?>
                <?php $questionNumber = $index + 1; ?>
                <button type="button" class="dropquestion" data-answer-target="faq<?= $questionNumber ?>">
                    <?= htmlspecialchars($item['question'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </button>
                <div class="dropanswer" data-answer-panel="faq<?= $questionNumber ?>">
                    <?php foreach (($item['paragraphs'] ?? []) as $paragraph): ?>
                        <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endforeach; ?>
                    <?php foreach (($item['html_paragraphs'] ?? []) as $paragraph): ?>
                        <p><?= $paragraph ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="dropdown" data-category-panel="membres">
            <?php if (!empty($members)): ?>
                <div class="containeramis">
                    <?php foreach ($members as $member): ?>
                        <a href="<?= url('/membres/' . rawurlencode($member['pseudo'] ?? '')) ?>">
                            <img
                                src="<?= asset('assets/img/uploads/' . ($member['avatar'] ?? '')) ?>"
                                alt="<?= htmlspecialchars($member['display_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                title="<?= htmlspecialchars($member['display_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            >
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <?php foreach (($liens['members']['paragraphs'] ?? []) as $paragraph): ?>
                    <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="dropdown" data-category-panel="tipeurs">
            <p>
                Ici seront affichés les noms des personnes ayant fait un don pour soutenir EscapeRPG.
            </p>
            <p>
                Vous souhaitez nous aider également ? Alors rendez-vous sur notre page
                <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">Tipeee</a> !
            </p>
            <?php if (!empty($supporters)): ?>
                <p><strong>UN GRAND MERCI AUX TIPEURS :</strong></p>
                <p><?= htmlspecialchars(implode(' ', $supporters), ENT_QUOTES, 'UTF-8') ?></p>
            <?php else: ?>
                <p>
                    Apparemment, personne n'a encore participé au tipeee.
                </p>
                <p>
                    Soyez le premier en vous rendant
                    <a href="https://fr.tipeee.com/escaperpg" target="_blank" rel="noreferrer">ici</a> !
                </p>
            <?php endif; ?>
        </div>

        <div class="dropdown" data-category-panel="legal">
            <?php $legalIndex = 0; ?>
            <?php foreach (($liens['legal'] ?? []) as $item): ?>
                <?php
                $legalIndex++;
                $answerId = 'legal' . $legalIndex;
                ?>
                <button type="button" class="dropquestion" data-answer-target="<?= $answerId ?>">
                    <?= htmlspecialchars($item['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </button>
                <div class="dropanswer legal-answer" data-answer-panel="<?= $answerId ?>">
                    <?php foreach (($item['intro'] ?? []) as $paragraph): ?>
                        <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endforeach; ?>

                    <?php foreach (($item['sections'] ?? []) as $section): ?>
                        <section class="legal-answer__section">
                            <h3><?= htmlspecialchars($section['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h3>

                            <?php foreach (($section['paragraphs'] ?? []) as $paragraph): ?>
                                <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                            <?php endforeach; ?>

                            <?php foreach (($section['html_paragraphs'] ?? []) as $paragraph): ?>
                                <p><?= $paragraph ?></p>
                            <?php endforeach; ?>

                            <?php if (!empty($section['items'])): ?>
                                <ul>
                                    <?php foreach ($section['items'] as $entry): ?>
                                        <li><?= $entry ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </section>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
