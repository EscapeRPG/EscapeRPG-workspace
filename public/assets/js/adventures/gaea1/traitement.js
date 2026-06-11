(() => {
    const screen = document.getElementById('ecransignal');
    const signal = document.getElementById('signal');
    const wavelengthOutput = document.getElementById('ondetext');
    const amplitudeOutput = document.getElementById('amplitudetext');
    const wavelengthInput = document.getElementById('inputspeed');
    const amplitudeInput = document.getElementById('inputpitch');

    if (!screen || !signal || !wavelengthOutput || !amplitudeOutput || !wavelengthInput || !amplitudeInput) {
        return;
    }

    const imageBase = (screen.dataset.treatmentImageBase || '/assets/img/gaea1/traitement/').replace(/\/?$/, '/');
    const soundBase = (screen.dataset.treatmentSoundBase || '/assets/sounds/gaea1/').replace(/\/?$/, '/');
    const state = {
        onde: Number.parseInt(wavelengthInput.value || '6', 10),
        amplitude: Number.parseInt(amplitudeInput.value || '-3', 10),
    };
    const limits = {
        onde: { min: -5, max: 17 },
        amplitude: { min: -4, max: 4 },
    };
    const audios = Array.from({ length: 9 }, (_unused, index) => {
        const audio = new Audio(`${soundBase}signalbon${index + 1}.mp3`);
        audio.loop = true;
        audio.preload = 'auto';
        audio.preservesPitch = false;
        audio.volume = 0;

        return audio;
    });
    let audioUnlocked = false;
    let audioStarted = false;
    let errorTimer = 0;

    function clamp(value, min, max) {
        return Math.max(min, Math.min(max, value));
    }

    function visualWavelength() {
        return state.onde - 6;
    }

    function visualAmplitude() {
        return state.amplitude + 3;
    }

    function signalScaleX() {
        return 1 + state.onde / 10;
    }

    function signalScaleY() {
        return 1 + state.amplitude / 5;
    }

    function activeAudioIndex() {
        return clamp(state.amplitude + 4, 0, audios.length - 1);
    }

    function unlockAudio() {
        if (audioStarted) {
            return;
        }

        audioUnlocked = true;
        audios.forEach((audio) => {
            const playPromise = audio.play();
            if (playPromise && typeof playPromise.then === 'function') {
                playPromise
                    .then(() => {
                        audioStarted = true;
                    })
                    .catch(() => {
                        audioUnlocked = false;
                    });
            } else {
                audioStarted = true;
            }
        });
        renderAudio();
    }

    function renderAudio() {
        const index = activeAudioIndex();
        const rate = signalScaleX();

        audios.forEach((audio, audioIndex) => {
            audio.playbackRate = rate;
            audio.volume = audioUnlocked && audioIndex === index ? 0.8 : 0;
        });
    }

    function renderSignal() {
        signal.style.setProperty('--scaleX', signalScaleX().toFixed(2));
        signal.style.setProperty('--scaleY', signalScaleY().toFixed(2));
        wavelengthOutput.textContent = String(visualWavelength());
        amplitudeOutput.textContent = String(visualAmplitude());
        wavelengthInput.value = String(state.onde);
        amplitudeInput.value = String(state.amplitude);
        renderAudio();
    }

    function flashButton(button) {
        const image = button.querySelector('img');
        if (!image) {
            return;
        }

        image.src = image.dataset.activeSrc || image.src;
        window.setTimeout(() => {
            image.src = image.dataset.defaultSrc || image.src;
        }, 160);
    }

    function flashError() {
        window.clearTimeout(errorTimer);
        signal.src = `${imageBase}signalerreur.png`;
        errorTimer = window.setTimeout(() => {
            signal.src = `${imageBase}signal.png`;
        }, 320);
    }

    function adjust(control, direction, button = null) {
        unlockAudio();

        if (!Object.prototype.hasOwnProperty.call(state, control)) {
            return;
        }

        if (button) {
            flashButton(button);
        }

        const nextValue = state[control] + direction;
        const limit = limits[control];
        if (nextValue < limit.min || nextValue > limit.max) {
            flashError();
            return;
        }

        state[control] = nextValue;
        renderSignal();
    }

    screen.addEventListener('click', (event) => {
        const button = event.target.closest('[data-treatment-control]');
        if (!button) {
            return;
        }

        const direction = Number.parseInt(button.dataset.direction || '0', 10);
        adjust(button.dataset.treatmentControl, direction, button);
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight' || event.key.toLowerCase() === 'd') {
            adjust('onde', 1);
        } else if (event.key === 'ArrowDown' || event.key.toLowerCase() === 's') {
            adjust('amplitude', -1);
        } else if (event.key === 'ArrowLeft' || event.key.toLowerCase() === 'q') {
            adjust('onde', -1);
        } else if (event.key === 'ArrowUp' || event.key.toLowerCase() === 'z') {
            adjust('amplitude', 1);
        }
    });

    window.addEventListener('beforeunload', () => {
        audios.forEach((audio) => audio.pause());
    });

    renderSignal();
    unlockAudio();
})();
