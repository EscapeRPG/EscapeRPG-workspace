(() => {
    const wrapper = document.getElementById('manuel-wrap');
    const manuel = document.getElementById('manuel');
    const pageContainer = document.getElementById('page');
    const source = document.getElementById('manuel-source');

    if (!wrapper || !manuel || !pageContainer || !source) {
        return;
    }

    const imagePath = (wrapper.dataset.manuelImagePath || '/assets/img/gaea1/manuel/').replace(/\/?$/, '/');
    const clickSound = new Audio(wrapper.dataset.manuelSound || '/assets/sounds/gaea1/interfaceclic.mp3');
    const prevButton = wrapper.querySelector('[data-manuel-prev-button]');
    const nextButton = wrapper.querySelector('[data-manuel-next-button]');
    const prevImage = document.getElementById('btnPrev');
    const nextImage = document.getElementById('btnNext');
    const closeButton = document.querySelector('[data-manuel-close]');

    let pages = [];
    let currentPage = 0;
    let isAnimating = false;
    let resizeTimer = 0;
    let buildId = 0;

    function escapeHtml(value) {
        return value
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function inlineMarkdown(value) {
        let html = escapeHtml(value);
        html = html.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/\*(.+?)\*/g, '<i>$1</i>');
        html = html.replace(/_(.+?)_/g, '<i>$1</i>');
        html = html.replace(/\[([^\]]+)]\(([^)\s]+)\)/g, (_match, label, href) => {
            const safeHref = escapeHtml(href);
            return `<a href="${safeHref}" target="_blank" rel="noreferrer">${label}</a>`;
        });

        return html;
    }

    function playClick() {
        clickSound.currentTime = 0;
        const promise = clickSound.play();

        if (promise && typeof promise.catch === 'function') {
            promise.catch(() => {});
        }
    }

    function slug(value) {
        return value
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-|-$/g, '');
    }

    function createChunk(chunks) {
        const chunk = [];
        chunks.push(chunk);

        return chunk;
    }

    function parseManual(markdown) {
        const lines = markdown.replace(/\r\n?/g, '\n').split('\n');
        const chunks = [];
        let currentChunk = createChunk(chunks);
        let paragraph = [];
        let tocSeen = false;

        const flushParagraph = () => {
            if (paragraph.length === 0) {
                return;
            }

            currentChunk.push({
                type: 'paragraph',
                text: paragraph.join(' '),
            });
            paragraph = [];
        };

        lines.forEach((line) => {
            const trimmed = line.trim();

            if (trimmed === '[PAGEBREAK]') {
                flushParagraph();
                currentChunk = createChunk(chunks);
                return;
            }

            if (trimmed === '') {
                flushParagraph();
                return;
            }

            if (trimmed === '[TOC]') {
                flushParagraph();
                currentChunk.push({ type: 'toc' });
                tocSeen = true;
                return;
            }

            const legacySection = trimmed.match(/^\[SECTION:\s*(.+?)]$/);
            if (legacySection) {
                flushParagraph();
                currentChunk.push({
                    type: 'heading',
                    level: 2,
                    text: legacySection[1],
                    sectionTitle: tocSeen ? legacySection[1] : null,
                });
                return;
            }

            const image = trimmed.match(/^!\[([^\]]*)]\(([^)]+)\)$/);
            if (image) {
                flushParagraph();
                currentChunk.push({
                    type: 'image',
                    alt: image[1],
                    src: image[2],
                });
                return;
            }

            if (trimmed.startsWith('>')) {
                flushParagraph();
                currentChunk.push({
                    type: 'quote',
                    text: trimmed.replace(/^>\s?/, ''),
                });
                return;
            }

            const heading = trimmed.match(/^(#{1,6})\s+(.+)$/);
            if (heading) {
                const level = heading[1].length;
                const text = heading[2].trim();
                flushParagraph();
                currentChunk.push({
                    type: 'heading',
                    level,
                    text,
                    sectionTitle: tocSeen && level === 2 ? text : null,
                });
                return;
            }

            if (trimmed.startsWith('<') && trimmed.endsWith('>')) {
                flushParagraph();
                currentChunk.push({
                    type: 'html',
                    html: trimmed,
                });
                return;
            }

            paragraph.push(trimmed);
        });

        flushParagraph();

        return chunks.filter((chunk) => chunk.length > 0);
    }

    function imageUrl(src) {
        if (/^(?:https?:)?\/\//i.test(src) || src.startsWith('/')) {
            return src;
        }

        return `${imagePath}${src}`;
    }

    function renderBlock(block, tocEntries = []) {
        if (block.type === 'heading') {
            const level = Math.min(Math.max(block.level, 1), 4);
            return `<h${level}>${inlineMarkdown(block.text)}</h${level}>`;
        }

        if (block.type === 'paragraph') {
            return `<p>${inlineMarkdown(block.text)}</p>`;
        }

        if (block.type === 'image') {
            return `<img src="${escapeHtml(imageUrl(block.src))}" alt="${escapeHtml(block.alt)}">`;
        }

        if (block.type === 'quote') {
            return `<div class="citation">${inlineMarkdown(block.text)}</div>`;
        }

        if (block.type === 'html') {
            return block.html;
        }

        if (block.type === 'toc') {
            const items = tocEntries
                .map((entry) => `<li><button type="button" data-manuel-page="${entry.page}">${inlineMarkdown(entry.title)}</button></li>`)
                .join('');

            return `<nav class="manual-toc" aria-label="Table des matières"><ul class="manual-toc-list">${items}</ul></nav>`;
        }

        return '';
    }

    function renderBlocks(blocks, tocEntries = []) {
        return blocks.map((block) => renderBlock(block, tocEntries)).join('');
    }

    function backToTocHtml() {
        return '<div class="back-to-toc"><button type="button" data-manuel-page="0">← Retour au sommaire</button></div>';
    }

    function pageHtml(blocks, tocEntries = [], withBackButton = false) {
        return `${withBackButton ? backToTocHtml() : ''}${renderBlocks(blocks, tocEntries)}`;
    }

    function availableHeight() {
        const styles = window.getComputedStyle(manuel);
        const paddingTop = Number.parseFloat(styles.paddingTop) || 0;
        const paddingBottom = Number.parseFloat(styles.paddingBottom) || 0;

        return Math.max(120, manuel.clientHeight - paddingTop - paddingBottom);
    }

    function measure(blocks, withBackButton = true) {
        const measuringPage = document.createElement('div');
        measuringPage.className = 'page-content manual-measure';
        measuringPage.innerHTML = pageHtml(blocks, [], withBackButton);
        pageContainer.appendChild(measuringPage);
        const height = measuringPage.scrollHeight;
        measuringPage.remove();

        return height;
    }

    function fits(blocks, withBackButton = true) {
        return measure(blocks, withBackButton) <= availableHeight() + 1;
    }

    function splitParagraph(block, addPage) {
        const words = block.text.split(/\s+/).filter(Boolean);
        let currentText = '';

        words.forEach((word) => {
            const nextText = currentText === '' ? word : `${currentText} ${word}`;
            const nextBlock = { ...block, text: nextText };

            if (currentText !== '' && !fits([nextBlock])) {
                addPage([{ ...block, text: currentText }]);
                currentText = word;
                return;
            }

            currentText = nextText;
        });

        if (currentText !== '') {
            addPage([{ ...block, text: currentText }]);
        }
    }

    function paginateContentChunks(chunks) {
        const contentPages = [];
        const tocEntries = [];
        let currentBlocks = [];

        const addPage = (blocks) => {
            if (blocks.length === 0) {
                return;
            }

            contentPages.push({ blocks });
        };

        const closeCurrentPage = () => {
            addPage(currentBlocks);
            currentBlocks = [];
        };

        const registerSection = (block) => {
            if (!block.sectionTitle) {
                return;
            }

            tocEntries.push({
                id: slug(block.sectionTitle),
                title: block.sectionTitle,
                page: contentPages.length + 1,
            });
        };

        chunks.forEach((chunk, chunkIndex) => {
            if (chunkIndex > 0) {
                closeCurrentPage();
            }

            chunk.forEach((block) => {
                const nextBlocks = currentBlocks.concat(block);
                if (fits(nextBlocks)) {
                    registerSection(block);
                    currentBlocks = nextBlocks;
                    return;
                }

                if (currentBlocks.length > 0) {
                    closeCurrentPage();
                }

                if (block.type === 'paragraph' && !fits([block])) {
                    splitParagraph(block, addPage);
                    return;
                }

                registerSection(block);
                currentBlocks = [block];
            });
        });

        closeCurrentPage();

        return { contentPages, tocEntries };
    }

    async function waitForImages(urls) {
        await Promise.all(urls.map((url) => new Promise((resolve) => {
            const image = new Image();
            image.onload = resolve;
            image.onerror = resolve;
            image.src = url;
        })));
    }

    function collectImages(chunks) {
        return chunks.flatMap((chunk) => chunk
            .filter((block) => block.type === 'image')
            .map((block) => imageUrl(block.src)));
    }

    function updateManualSize() {
        const width = manuel.clientWidth;
        manuel.style.height = `${(width * 10) / 9}px`;
        pageContainer.style.height = `${availableHeight()}px`;
    }

    async function buildPages() {
        const currentBuild = ++buildId;
        wrapper.classList.add('waiting');
        pageContainer.classList.add('waiting');
        updateManualSize();

        const chunks = parseManual(source.value);
        await waitForImages(collectImages(chunks));

        if (document.fonts && document.fonts.ready) {
            await document.fonts.ready;
        }

        if (currentBuild !== buildId) {
            return;
        }

        const tocChunkIndex = chunks.findIndex((chunk) => chunk.some((block) => block.type === 'toc'));
        const coverBlocks = tocChunkIndex >= 0 ? chunks[tocChunkIndex] : [];
        const contentChunks = tocChunkIndex >= 0
            ? chunks.filter((_chunk, index) => index !== tocChunkIndex)
            : chunks;
        const { contentPages, tocEntries } = paginateContentChunks(contentChunks);

        pages = tocChunkIndex >= 0
            ? [{ blocks: coverBlocks, tocEntries }, ...contentPages]
            : contentPages.map((page) => ({ ...page, tocEntries }));

        currentPage = Math.min(currentPage, Math.max(0, pages.length - 1));
        renderPage();
    }

    function updateButtons() {
        if (prevButton) {
            prevButton.style.visibility = currentPage === 0 ? 'hidden' : 'visible';
        }

        if (nextButton) {
            nextButton.style.visibility = currentPage + 1 >= pages.length ? 'hidden' : 'visible';
        }

        if (prevImage) {
            prevImage.src = wrapper.dataset.manuelPrev || prevImage.src;
        }

        if (nextImage) {
            nextImage.src = wrapper.dataset.manuelNext || nextImage.src;
        }
    }

    function renderPage(direction = null) {
        if (isAnimating || pages.length === 0) {
            return;
        }

        isAnimating = direction !== null;
        pageContainer.style.pointerEvents = isAnimating ? 'none' : 'auto';

        const page = pages[currentPage] || { blocks: [], tocEntries: [] };
        const newPage = document.createElement('div');
        newPage.className = 'page-content';
        newPage.innerHTML = pageHtml(page.blocks, page.tocEntries || [], currentPage !== 0);

        if (direction === 'left') {
            newPage.classList.add('slide-in-left');
        } else if (direction === 'right') {
            newPage.classList.add('slide-in-right');
        }

        const oldPage = pageContainer.querySelector('.page-content:not(.manual-measure)');
        if (oldPage) {
            if (direction === 'left') {
                oldPage.classList.add('slide-out-left');
            } else if (direction === 'right') {
                oldPage.classList.add('slide-out-right');
            }

            oldPage.addEventListener('animationend', () => oldPage.remove(), { once: true });
        } else {
            pageContainer.innerHTML = '';
        }

        if (direction === null && oldPage) {
            oldPage.remove();
        }

        newPage.addEventListener('animationend', () => {
            isAnimating = false;
            pageContainer.style.pointerEvents = 'auto';
            wrapper.classList.remove('waiting');
            pageContainer.classList.remove('waiting');
            updateButtons();
        }, { once: true });

        pageContainer.appendChild(newPage);

        if (direction === null) {
            isAnimating = false;
            pageContainer.style.pointerEvents = 'auto';
            wrapper.classList.remove('waiting');
            pageContainer.classList.remove('waiting');
            updateButtons();
        }
    }

    function goToPage(index) {
        if (isAnimating || index < 0 || index >= pages.length || index === currentPage) {
            return;
        }

        const direction = index > currentPage ? 'left' : 'right';
        currentPage = index;
        playClick();
        renderPage(direction);
    }

    function previousPage() {
        if (prevImage && wrapper.dataset.manuelPrevActive) {
            prevImage.src = wrapper.dataset.manuelPrevActive;
        }

        goToPage(currentPage - 1);
    }

    function nextPage() {
        if (nextImage && wrapper.dataset.manuelNextActive) {
            nextImage.src = wrapper.dataset.manuelNextActive;
        }

        goToPage(currentPage + 1);
    }

    prevButton?.addEventListener('click', previousPage);
    nextButton?.addEventListener('click', nextPage);

    pageContainer.addEventListener('click', (event) => {
        const pageButton = event.target.closest('[data-manuel-page]');
        if (!pageButton) {
            return;
        }

        const page = Number.parseInt(pageButton.dataset.manuelPage || '0', 10);
        goToPage(page);
    });

    closeButton?.addEventListener('click', () => {
        window.close();
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight' || event.key.toLowerCase() === 'd') {
            nextPage();
        } else if (event.key === 'ArrowLeft' || event.key.toLowerCase() === 'q') {
            previousPage();
        }
    });

    const resizeObserver = new ResizeObserver(() => {
        window.clearTimeout(resizeTimer);
        resizeTimer = window.setTimeout(() => {
            buildPages();
        }, 120);
    });

    resizeObserver.observe(manuel);

    window.addEventListener('load', () => {
        buildPages();
    });
})();
