<div id="bloc4">
    <div id="lienspage">
        <div id="liste">
            <?php foreach (($liens['tabs'] ?? []) as $tab): ?>
                <div id="liste<?= htmlspecialchars($tab['id'], ENT_QUOTES, 'UTF-8') ?>" class="dropbtn">
                    <?= htmlspecialchars($tab['label'], ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="liensaffichage" class="dropdown">
            <?php foreach (($liens['links'] ?? []) as $item): ?>
                <div>
                    <a href="<?= htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noreferrer">
                        <img src="<?= asset($item['image'] ?? '') ?>" alt="<?= htmlspecialchars($item['alt'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    </a>
                    <p><?= htmlspecialchars($item['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="faqaffichage" class="dropdown">
            <?php foreach (($liens['faq'] ?? []) as $index => $item): ?>
                <?php $questionNumber = $index + 1; ?>
                <div id="quest<?= $questionNumber ?>" class="dropquestion">
                    <?= htmlspecialchars($item['question'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </div>
                <div id="reponse<?= $questionNumber ?>" class="reponse">
                    <?php foreach (($item['paragraphs'] ?? []) as $paragraph): ?>
                        <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endforeach; ?>
                    <?php foreach (($item['html_paragraphs'] ?? []) as $paragraph): ?>
                        <p><?= $paragraph ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="membresaffichage" class="dropdown">
            <?php if (!empty($members)): ?>
                <div id="containeramis">
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

        <div id="tipeursaffichage" class="dropdown">
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
    </div>
</div>
