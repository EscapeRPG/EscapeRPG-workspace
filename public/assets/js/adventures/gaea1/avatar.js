(() => {
    const avatarRoot = document.querySelector('[data-avatar-builder]');
    const controlsRoot = document.querySelector('[data-avatar-controls]');

    if (!avatarRoot || !controlsRoot) {
        return;
    }

    const baseUrl = (avatarRoot.dataset.avatarBaseUrl || '/assets/img/gaea1/avatar/').replace(/\/?$/, '/');
    const clickSound = new Audio('/assets/sounds/gaea1/interfaceclic.mp3');

    const state = {
        skin: 1,
        visage: 1,
        oreilles: 1,
        nez: 1,
        cheveux: 1,
        sourcils: 1,
        yeux: 1,
        bouche: 1,
        pilosite: 1,
        accessoire: 1,
        couleurcheveux: 1,
        couleuryeux: 1,
        couleurbouche: 1,
        couleurpilosite: 1,
    };

    const parts = {
        visage: {
            max: 10,
            count: 'visagecount',
            input: 'visageinput',
            value: () => `${state.visage}${state.skin}`,
            layers: {
                visageimg: () => `visage${parts.visage.value()}.png`,
            },
        },
        oreilles: {
            max: 10,
            count: 'oreillescount',
            input: 'oreillesinput',
            value: () => `${state.oreilles}${state.skin}`,
            layers: {
                oreillesimg: () => `oreilles${parts.oreilles.value()}.png`,
            },
        },
        nez: {
            max: 10,
            count: 'nezcount',
            input: 'nezinput',
            value: () => `${state.nez}${state.skin}`,
            layers: {
                nezimg: () => `nez${parts.nez.value()}.png`,
            },
        },
        cheveux: {
            max: 16,
            count: 'cheveuxcount',
            input: 'cheveuxinput',
            colorInput: 'couleurcheveuxinput',
            colorKey: 'couleurcheveux',
            layers: {
                cheveuximg: () => `cheveux${state.cheveux}-${state.couleurcheveux}.png`,
                cheveuxbackimg: () => `cheveuxback${state.cheveux}-${state.couleurcheveux}.png`,
                cheveuxbackendimg: () => `cheveuxbackend${state.cheveux}-${state.couleurcheveux}.png`,
            },
        },
        sourcils: {
            max: 14,
            count: 'sourcilscount',
            input: 'sourcilsinput',
            layers: {
                sourcilsimg: () => `sourcils${state.sourcils}.png`,
            },
        },
        yeux: {
            max: 20,
            count: 'yeuxcount',
            input: 'yeuxinput',
            colorInput: 'couleuryeuxinput',
            colorKey: 'couleuryeux',
            layers: {
                yeuximg: () => `yeux${state.yeux}-${state.couleuryeux}.png`,
            },
        },
        bouche: {
            max: 15,
            count: 'bouchecount',
            input: 'boucheinput',
            colorInput: 'couleurboucheinput',
            colorKey: 'couleurbouche',
            layers: {
                boucheimg: () => `bouche${state.bouche}-${state.couleurbouche}.png`,
            },
        },
        pilosite: {
            max: 17,
            count: 'pilositecount',
            input: 'pilositeinput',
            colorInput: 'couleurpilositeinput',
            colorKey: 'couleurpilosite',
            layers: {
                pilositeimg: () => `pilosite${state.pilosite}-${state.couleurpilosite}.png`,
            },
        },
        accessoire: {
            max: 14,
            count: 'accessoirecount',
            input: 'accessoireinput',
            layers: {
                accessoireimg: () => `accessoire${state.accessoire}.png`,
            },
        },
    };

    const skinParts = ['visage', 'oreilles', 'nez'];

    function element(id) {
        return document.getElementById(id);
    }

    function randomInt(max) {
        return Math.floor(Math.random() * max) + 1;
    }

    function playClick() {
        clickSound.currentTime = 0;
        const promise = clickSound.play();

        if (promise && typeof promise.catch === 'function') {
            promise.catch(() => {});
        }
    }

    function wrap(value, max) {
        if (value < 1) {
            return max;
        }

        if (value > max) {
            return 1;
        }

        return value;
    }

    function setInputValue(id, value) {
        const input = element(id);

        if (input) {
            input.value = String(value);
        }
    }

    function setCountValue(id, value) {
        const count = element(id);

        if (count) {
            count.textContent = String(value);
        }
    }

    function setLayerSource(id, file) {
        const image = element(id);

        if (image) {
            image.src = `${baseUrl}${file}`;
        }
    }

    function renderPart(partKey) {
        const part = parts[partKey];

        if (!part) {
            return;
        }

        const value = typeof part.value === 'function' ? part.value() : state[partKey];
        setCountValue(part.count, state[partKey]);
        setInputValue(part.input, value);

        if (part.colorInput && part.colorKey) {
            setInputValue(part.colorInput, state[part.colorKey]);
        }

        Object.entries(part.layers).forEach(([id, filename]) => {
            setLayerSource(id, filename());
        });
    }

    function renderAll() {
        Object.keys(parts).forEach(renderPart);
    }

    function updatePart(partKey, direction) {
        const part = parts[partKey];

        if (!part) {
            return;
        }

        state[partKey] = wrap(state[partKey] + direction, part.max);
        renderPart(partKey);
        playClick();
    }

    function updateSkin(value) {
        state.skin = value;
        skinParts.forEach(renderPart);
        playClick();
    }

    function updateColor(colorKey, value) {
        state[colorKey] = value;

        Object.entries(parts).forEach(([partKey, part]) => {
            if (part.colorKey === colorKey) {
                renderPart(partKey);
            }
        });

        playClick();
    }

    function randomize() {
        state.skin = randomInt(6);
        state.couleuryeux = randomInt(12);
        state.couleurcheveux = randomInt(12);
        state.couleurpilosite = randomInt(12);
        state.couleurbouche = randomInt(12);

        Object.entries(parts).forEach(([partKey, part]) => {
            state[partKey] = randomInt(part.max);
        });

        renderAll();
        playClick();
    }

    controlsRoot.addEventListener('click', (event) => {
        const control = event.target.closest('[data-avatar-control]');
        if (control) {
            event.preventDefault();
            updatePart(control.dataset.avatarControl, control.dataset.direction === 'previous' ? -1 : 1);
            return;
        }

        const randomButton = event.target.closest('[data-avatar-randomize]');
        if (randomButton) {
            event.preventDefault();
            randomize();
            return;
        }

        const colorControl = event.target.closest('[data-avatar-color]');
        if (colorControl) {
            event.preventDefault();
            const value = Number.parseInt(colorControl.dataset.avatarValue || '1', 10);

            if (colorControl.dataset.avatarColor === 'skin') {
                updateSkin(value);
            } else {
                updateColor(colorControl.dataset.avatarColor, value);
            }
        }
    });

    renderAll();

    Object.assign(window, {
        randomize,
        rvisage: () => updatePart('visage', -1),
        visage: () => updatePart('visage', 1),
        rcheveux: () => updatePart('cheveux', -1),
        cheveux: () => updatePart('cheveux', 1),
        rsourcils: () => updatePart('sourcils', -1),
        sourcils: () => updatePart('sourcils', 1),
        ryeux: () => updatePart('yeux', -1),
        yeux: () => updatePart('yeux', 1),
        roreilles: () => updatePart('oreilles', -1),
        oreilles: () => updatePart('oreilles', 1),
        rnez: () => updatePart('nez', -1),
        nez: () => updatePart('nez', 1),
        rbouche: () => updatePart('bouche', -1),
        bouche: () => updatePart('bouche', 1),
        rpilosite: () => updatePart('pilosite', -1),
        pilosite: () => updatePart('pilosite', 1),
        raccessoire: () => updatePart('accessoire', -1),
        accessoire: () => updatePart('accessoire', 1),
        colorblanc: () => updateSkin(1),
        colorasien: () => updateSkin(2),
        colorindien: () => updateSkin(3),
        colormetisse: () => updateSkin(4),
        colorred: () => updateSkin(5),
        colornoir: () => updateSkin(6),
        cheveuxnoirs: () => updateColor('couleurcheveux', 1),
        cheveuxgris: () => updateColor('couleurcheveux', 2),
        cheveuxblancs: () => updateColor('couleurcheveux', 3),
        cheveuxrouges: () => updateColor('couleurcheveux', 4),
        cheveuxbruns: () => updateColor('couleurcheveux', 5),
        cheveuxchatains: () => updateColor('couleurcheveux', 6),
        cheveuxroux: () => updateColor('couleurcheveux', 7),
        cheveuxblonds: () => updateColor('couleurcheveux', 8),
        cheveuxverts: () => updateColor('couleurcheveux', 9),
        cheveuxbleus: () => updateColor('couleurcheveux', 10),
        cheveuxviolets: () => updateColor('couleurcheveux', 11),
        cheveuxroses: () => updateColor('couleurcheveux', 12),
        yeuxnoirs: () => updateColor('couleuryeux', 1),
        yeuxgris: () => updateColor('couleuryeux', 2),
        yeuxblancs: () => updateColor('couleuryeux', 3),
        yeuxrouges: () => updateColor('couleuryeux', 4),
        yeuxbruns: () => updateColor('couleuryeux', 5),
        yeuxchatains: () => updateColor('couleuryeux', 6),
        yeuxroux: () => updateColor('couleuryeux', 7),
        yeuxblonds: () => updateColor('couleuryeux', 8),
        yeuxverts: () => updateColor('couleuryeux', 9),
        yeuxbleus: () => updateColor('couleuryeux', 10),
        yeuxviolets: () => updateColor('couleuryeux', 11),
        yeuxroses: () => updateColor('couleuryeux', 12),
        bouchenormale: () => updateColor('couleurbouche', 1),
        bouchenoire: () => updateColor('couleurbouche', 2),
        bouchegrise: () => updateColor('couleurbouche', 3),
        boucheblanche: () => updateColor('couleurbouche', 4),
        boucherouge: () => updateColor('couleurbouche', 5),
        bouchebrune: () => updateColor('couleurbouche', 6),
        boucheorange: () => updateColor('couleurbouche', 7),
        bouchejaune: () => updateColor('couleurbouche', 8),
        boucheverte: () => updateColor('couleurbouche', 9),
        bouchebleue: () => updateColor('couleurbouche', 10),
        boucheviolette: () => updateColor('couleurbouche', 11),
        boucherose: () => updateColor('couleurbouche', 12),
        pilositenoirs: () => updateColor('couleurpilosite', 1),
        pilositegris: () => updateColor('couleurpilosite', 2),
        pilositeblancs: () => updateColor('couleurpilosite', 3),
        pilositerouges: () => updateColor('couleurpilosite', 4),
        pilositebruns: () => updateColor('couleurpilosite', 5),
        pilositechatains: () => updateColor('couleurpilosite', 6),
        pilositeroux: () => updateColor('couleurpilosite', 7),
        pilositeblonds: () => updateColor('couleurpilosite', 8),
        pilositeverts: () => updateColor('couleurpilosite', 9),
        pilositebleus: () => updateColor('couleurpilosite', 10),
        pilositeviolets: () => updateColor('couleurpilosite', 11),
        pilositeroses: () => updateColor('couleurpilosite', 12),
    });
})();
