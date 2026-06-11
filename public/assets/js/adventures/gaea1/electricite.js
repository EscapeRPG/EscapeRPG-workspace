(() => {
    const root = document.querySelector('.electricite-console');
    if (!root) {
        return;
    }

    const imageBase = (root.dataset.electriciteImageBase || '/assets/img/gaea1/electricite/').replace(/\/?$/, '/');
    const successMessage = root.dataset.successMessage || 'Le panneau est alimenté.';
    const form = document.getElementById('electricite-complete-form');
    const tiles = new Map([...root.querySelectorAll('.elec')].map((tile) => [tile.id, tile]));
    const activePath = new Set();
    const directions = {
        left: { row: 0, col: -1, opposite: 'right' },
        right: { row: 0, col: 1, opposite: 'left' },
        up: { row: -1, col: 0, opposite: 'down' },
        down: { row: 1, col: 0, opposite: 'up' },
    };
    const connectors = {
        cablecoude: {
            0: ['right', 'down'],
            90: ['down', 'left'],
            180: ['left', 'up'],
            270: ['up', 'right'],
        },
        cabledroit: {
            0: ['right', 'left'],
            90: ['down', 'up'],
            180: ['left', 'right'],
            270: ['up', 'down'],
        },
        cablet: {
            0: ['right', 'down', 'left'],
            90: ['down', 'left', 'up'],
            180: ['left', 'up', 'right'],
            270: ['up', 'right', 'down'],
        },
    };
    const diodes = [
        { tile: 'c5', image: document.getElementById('imgdiode1') },
        { tile: 'd2', image: document.getElementById('imgdiode2') },
        { tile: 'f4', image: document.getElementById('imgdiode3') },
    ];
    const outputs = [
        { tile: 'a6', side: 'right' },
        { tile: 'b6', side: 'right' },
        { tile: 'f1', side: 'right' },
    ];

    init();

    function init() {
        randomizeTiles();
        updateCircuit();
        tiles.forEach((tile) => {
            tile.addEventListener('click', () => {
                rotate(tile);
                updateCircuit();
            });
        });
    }

    function randomizeTiles() {
        tiles.forEach((tile) => {
            const orientation = [0, 90, 180, 270][Math.floor(Math.random() * 4)];
            setOrientation(tile, orientation);
        });
    }

    function rotate(tile) {
        setOrientation(tile, (orientation(tile) + 90) % 360);
    }

    function setOrientation(tile, value) {
        tile.dataset.orientation = String(value);
        tile.querySelector('img').style.transform = `rotate(${value}deg)`;
    }

    function updateCircuit() {
        buildActivePath();
        updateTileImages();
        updateDiodes();

        if (isSolved()) {
            tiles.forEach((tile) => {
                tile.disabled = true;
            });
            window.setTimeout(completePuzzle, 200);
        }
    }

    function buildActivePath() {
        activePath.clear();
        const start = tiles.get('b1');
        if (start && tileConnections(start).includes('left')) {
            activePath.add('b1');
        }

        let changed = true;
        while (changed) {
            changed = false;
            tiles.forEach((tile, id) => {
                if (activePath.has(id)) {
                    return;
                }

                if (tileConnections(tile).some((side) => connectsToActive(tile, side))) {
                    activePath.add(id);
                    changed = true;
                }
            });
        }
    }

    function connectsToActive(tile, side) {
        const direction = directions[side];
        const neighbor = tileAt(Number(tile.dataset.row) + direction.row, Number(tile.dataset.col) + direction.col);
        return Boolean(neighbor && activePath.has(neighbor.id) && tileConnections(neighbor).includes(direction.opposite));
    }

    function tileAt(row, col) {
        return [...tiles.values()].find((tile) => Number(tile.dataset.row) === row && Number(tile.dataset.col) === col);
    }

    function tileConnections(tile) {
        return connectors[tile.dataset.type]?.[orientation(tile)] || [];
    }

    function orientation(tile) {
        return Number(tile.dataset.orientation || 0);
    }

    function updateTileImages() {
        tiles.forEach((tile, id) => {
            const image = tile.querySelector('img');
            const type = tile.dataset.type || '';
            image.src = imageBase + type + (activePath.has(id) ? 'on' : '') + '.png';
        });
    }

    function updateDiodes() {
        diodes.forEach((diode) => {
            diode.image.src = imageBase + (activePath.has(diode.tile) ? 'diodeallumee.png' : 'diodeeteinte.png');
        });
    }

    function isSolved() {
        return diodes.every((diode) => activePath.has(diode.tile))
            && outputs.every((output) => {
                const tile = tiles.get(output.tile);
                return tile && activePath.has(output.tile) && tileConnections(tile).includes(output.side);
            });
    }

    async function completePuzzle() {
        if (window.EscapeRPGModal && typeof window.EscapeRPGModal.alert === 'function') {
            await window.EscapeRPGModal.alert(successMessage);
        }

        form?.submit();
    }
})();
