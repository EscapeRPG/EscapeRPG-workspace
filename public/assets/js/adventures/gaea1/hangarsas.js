(() => {
    const wrapper = document.querySelector('.hangar-sas-console');
    const canvas = document.getElementById('canvashangarsas');
    const overlay = document.getElementById('canvasoverlay');
    const handle = document.getElementById('hangarsasbtn');
    const leftDoor = document.getElementById('portehangarsasgauche');
    const rightDoor = document.getElementById('portehangarsasdroite');
    const arm = document.getElementById('hangarsasbras');

    if (!wrapper || !canvas || !overlay || !handle || !leftDoor || !rightDoor || !arm) {
        return;
    }

    const size = { width: 1000, height: 750 };
    const ctx = overlay.getContext('2d');
    const sounds = {
        deploy: new Audio(wrapper.dataset.soundDeploy || '/assets/sounds/gaea1/brasmecaniquedeplier.mp3'),
        retract: new Audio(wrapper.dataset.soundRetract || '/assets/sounds/gaea1/brasmecaniquereplier.mp3'),
        lock: new Audio(wrapper.dataset.soundLock || '/assets/sounds/gaea1/braslock.mp3'),
        door: new Audio(wrapper.dataset.soundDoor || '/assets/sounds/gaea1/portehangarsas.mp3'),
    };
    const state = {
        holding: false,
        armProgress: 0,
        doorProgress: 0,
        armScale: 1,
        interval: 0,
        openingInterval: 0,
        completed: false,
    };

    function play(sound) {
        sound.play().catch(() => {});
    }

    function stop(sound) {
        sound.pause();
        sound.currentTime = 0;
    }

    function eventToCanvas(event) {
        const rect = canvas.getBoundingClientRect();

        return {
            x: ((event.clientX - rect.left) / rect.width) * size.width,
            y: ((event.clientY - rect.top) / rect.height) * size.height,
        };
    }

    function drawCrosshair(event, color = 'red') {
        const point = eventToCanvas(event);
        ctx.clearRect(0, 0, size.width, size.height);
        ctx.save();
        ctx.beginPath();
        ctx.moveTo(0, point.y);
        ctx.lineTo(size.width, point.y);
        ctx.moveTo(point.x, 0);
        ctx.lineTo(point.x, size.height);
        ctx.lineWidth = 2;
        ctx.strokeStyle = color;
        ctx.stroke();
        ctx.restore();
    }

    function applyArm() {
        arm.style.transform = `scale(${state.armScale})`;
        arm.style.transition = 'transform 90ms linear';
    }

    function applyDoors() {
        leftDoor.style.transform = `translateX(-${state.doorProgress}%)`;
        rightDoor.style.transform = `translateX(${state.doorProgress}%)`;
        leftDoor.style.transition = 'transform 90ms linear';
        rightDoor.style.transition = 'transform 90ms linear';
    }

    async function finish() {
        if (state.completed) {
            return;
        }

        state.completed = true;
        window.clearInterval(state.interval);
        window.clearInterval(state.openingInterval);
        stop(sounds.door);
        play(sounds.lock);

        const message = 'Les portes ouvertes, vous faites entrer le Seeker dans le hangar.';
        if (window.EscapeRPGModal && typeof window.EscapeRPGModal.alert === 'function') {
            await window.EscapeRPGModal.alert(message);
        }

        window.location.href = wrapper.dataset.successUrl || '/aventures/gaea1/appontage';
    }

    function openDoors() {
        if (state.openingInterval !== 0) {
            return;
        }

        play(sounds.door);
        state.openingInterval = window.setInterval(() => {
            if (state.doorProgress >= 80) {
                finish();
                return;
            }

            state.doorProgress += 1;
            applyDoors();
        }, 100);
    }

    function deployArm() {
        stop(sounds.retract);
        play(sounds.deploy);

        state.armProgress += 1;
        state.armScale -= 0.01;
        applyArm();

        if (state.armProgress === 64) {
            play(sounds.lock);
        }

        if (state.armProgress >= 68) {
            stop(sounds.deploy);
            window.clearInterval(state.interval);
            state.interval = 0;
            window.setTimeout(openDoors, 400);
        }
    }

    function retractArm() {
        stop(sounds.deploy);
        stop(sounds.door);

        if (state.armProgress <= 0) {
            window.clearInterval(state.interval);
            state.interval = 0;
            stop(sounds.retract);
            return;
        }

        play(sounds.retract);
        if (state.armProgress === 2) {
            play(sounds.lock);
        }

        state.armProgress -= 1;
        state.armScale += 0.01;
        applyArm();
    }

    function stopCurrentInterval() {
        window.clearInterval(state.interval);
        state.interval = 0;
    }

    function startDeploying() {
        if (state.completed) {
            return;
        }

        state.holding = true;
        stopCurrentInterval();
        window.clearInterval(state.openingInterval);
        state.openingInterval = 0;
        state.interval = window.setInterval(deployArm, 100);
    }

    function startRetracting() {
        if (state.completed) {
            return;
        }

        state.holding = false;
        stopCurrentInterval();
        window.clearInterval(state.openingInterval);
        state.openingInterval = 0;
        state.interval = window.setInterval(retractArm, 100);
    }

    canvas.addEventListener('pointermove', (event) => drawCrosshair(event));
    handle.addEventListener('pointermove', (event) => drawCrosshair(event, 'lawngreen'));
    handle.addEventListener('pointerdown', (event) => {
        handle.setPointerCapture(event.pointerId);
        drawCrosshair(event, 'lawngreen');
        startDeploying();
    });
    handle.addEventListener('pointerup', startRetracting);
    handle.addEventListener('pointercancel', startRetracting);
    handle.addEventListener('pointerleave', () => {
        if (state.holding) {
            startRetracting();
        }
    });

    window.addEventListener('beforeunload', () => {
        Object.values(sounds).forEach(stop);
    });
})();
