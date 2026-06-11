(() => {
    const wrapper = document.getElementById('canvas-wrap');
    const mapCanvas = document.getElementById('canvasfond');
    const overlayCanvas = document.getElementById('canvasoverlay');
    const xOutput = document.getElementById('mouseX');
    const yOutput = document.getElementById('mouseY');

    if (!wrapper || !mapCanvas || !overlayCanvas || !xOutput || !yOutput) {
        return;
    }

    const VIEWPORT = { width: 800, height: 400 };
    const MAP = { x: -600, y: -800, width: 2000, height: 2000 };
    const TARGET = { x: 1044, y: 328, successRadius: 6 };
    const PROXIMITY_RADIUS = 260;
    const MIN_SCALE = 0.35;
    const MAX_SCALE = 14;

    const ctx = mapCanvas.getContext('2d');
    const overlayCtx = overlayCanvas.getContext('2d');
    const mapImage = new Image();
    const frameImage = new Image();
    const overlayImage = new Image();
    const signalAudios = [
        new Audio('/assets/sounds/gaea1/signal1.mp3'),
        new Audio('/assets/sounds/gaea1/signal2.mp3'),
        new Audio('/assets/sounds/gaea1/signal3.mp3'),
        new Audio('/assets/sounds/gaea1/signal4.mp3'),
        new Audio('/assets/sounds/gaea1/signalgoal.mp3'),
    ];

    let scale = 1;
    let offsetX = 0;
    let offsetY = 0;
    let pointer = null;
    let dragStart = null;
    let dragDistance = 0;
    let activeSignal = -1;
    let audioUnlocked = false;
    let animationFrame = 0;
    let lastRenderTime = 0;
    let pulsePhase = 0;

    function loadImage(image, src) {
        return new Promise((resolve) => {
            image.onload = resolve;
            image.onerror = resolve;
            image.src = src;
        });
    }

    function screenToWorld(screenX, screenY) {
        return {
            x: (screenX - offsetX) / scale,
            y: (screenY - offsetY) / scale,
        };
    }

    function worldToScreen(worldX, worldY) {
        return {
            x: worldX * scale + offsetX,
            y: worldY * scale + offsetY,
        };
    }

    function eventToCanvas(event) {
        const rect = mapCanvas.getBoundingClientRect();

        return {
            x: ((event.clientX - rect.left) / rect.width) * VIEWPORT.width,
            y: ((event.clientY - rect.top) / rect.height) * VIEWPORT.height,
        };
    }

    function clamp(value, min, max) {
        return Math.max(min, Math.min(max, value));
    }

    function distanceToTarget(worldPoint) {
        if (!worldPoint) {
            return Number.POSITIVE_INFINITY;
        }

        return Math.hypot(worldPoint.x - TARGET.x, worldPoint.y - TARGET.y);
    }

    function proximityLevel(distance) {
        if (distance <= TARGET.successRadius) {
            return 4;
        }

        if (distance <= 14) {
            return 3;
        }

        if (distance <= 45) {
            return 2;
        }

        if (distance <= 120) {
            return 1;
        }

        if (distance <= PROXIMITY_RADIUS) {
            return 0;
        }

        return -1;
    }

    function unlockAudio() {
        if (audioUnlocked) {
            return;
        }

        audioUnlocked = true;
        signalAudios.forEach((audio) => {
            audio.loop = true;
            audio.volume = 0;
            audio.play().catch(() => {});
        });

        const currentLevel = proximityLevel(distanceToTarget(pointer ? screenToWorld(pointer.x, pointer.y) : null));
        activeSignal = -2;
        setSignal(currentLevel);
    }

    function setSignal(level) {
        if (level === activeSignal) {
            return;
        }

        activeSignal = level;
        signalAudios.forEach((audio, index) => {
            audio.volume = audioUnlocked && index === level ? 0.8 : 0;
        });
    }

    function updateCoordinates(worldPoint) {
        if (!worldPoint) {
            xOutput.textContent = '';
            yOutput.textContent = '';
            return;
        }

        xOutput.textContent = String(Math.round(worldPoint.x));
        yOutput.textContent = String(Math.round(worldPoint.y));
    }

    function drawMap() {
        ctx.clearRect(0, 0, VIEWPORT.width, VIEWPORT.height);
        ctx.save();
        ctx.translate(offsetX, offsetY);
        ctx.scale(scale, scale);
        ctx.drawImage(mapImage, MAP.x, MAP.y, MAP.width, MAP.height);
        ctx.restore();
    }

    function drawCrosshair(screenPoint) {
        if (!screenPoint) {
            return;
        }

        overlayCtx.save();
        overlayCtx.strokeStyle = 'rgba(64, 224, 208, 0.75)';
        overlayCtx.lineWidth = 1;
        overlayCtx.beginPath();
        overlayCtx.moveTo(0, screenPoint.y);
        overlayCtx.lineTo(VIEWPORT.width, screenPoint.y);
        overlayCtx.moveTo(screenPoint.x, 0);
        overlayCtx.lineTo(screenPoint.x, VIEWPORT.height);
        overlayCtx.stroke();
        overlayCtx.restore();
    }

    function drawSignalIndicator(screenPoint, level, distance) {
        if (!screenPoint || level < 0) {
            return;
        }

        const strength = 1 - clamp(distance / PROXIMITY_RADIUS, 0, 1);
        const phase = pulsePhase;
        const radius = 12 + phase * (42 - level * 5);
        const alpha = (1 - phase) * (0.35 + strength * 0.55);
        const color = level >= 4 ? '255, 180, 40' : '64, 224, 208';

        overlayCtx.save();
        overlayCtx.strokeStyle = `rgba(${color}, ${alpha})`;
        overlayCtx.lineWidth = 2 + level;
        overlayCtx.beginPath();
        overlayCtx.arc(screenPoint.x, screenPoint.y, radius, 0, Math.PI * 2);
        overlayCtx.stroke();

        overlayCtx.fillStyle = `rgba(${color}, ${0.1 + strength * 0.25})`;
        overlayCtx.beginPath();
        overlayCtx.arc(screenPoint.x, screenPoint.y, 4 + level, 0, Math.PI * 2);
        overlayCtx.fill();
        overlayCtx.restore();
    }

    function drawOverlay() {
        overlayCtx.clearRect(0, 0, VIEWPORT.width, VIEWPORT.height);

        if (overlayImage.complete && overlayImage.naturalWidth > 0) {
            overlayCtx.drawImage(overlayImage, 0, 0, VIEWPORT.width, VIEWPORT.height);
        }

        const worldPoint = pointer ? screenToWorld(pointer.x, pointer.y) : null;
        const distance = distanceToTarget(worldPoint);
        const level = proximityLevel(distance);

        drawCrosshair(pointer);
        drawSignalIndicator(pointer, level, distance);
        setSignal(level);
        updateCoordinates(worldPoint);
    }

    function render(time = 0) {
        const elapsed = lastRenderTime === 0 ? 16 : Math.min(64, time - lastRenderTime);
        lastRenderTime = time;

        const worldPoint = pointer ? screenToWorld(pointer.x, pointer.y) : null;
        const distance = distanceToTarget(worldPoint);
        const strength = 1 - clamp(distance / PROXIMITY_RADIUS, 0, 1);
        const period = Math.max(360, 1700 - strength * 1250);

        if (pointer && strength > 0) {
            pulsePhase = (pulsePhase + elapsed / period) % 1;
        } else {
            pulsePhase = 0;
        }

        drawMap();
        drawOverlay();
        animationFrame = window.requestAnimationFrame(render);
    }

    function zoomAt(screenPoint, delta) {
        const zoomFactor = Math.exp(delta * 0.0015);
        const nextScale = clamp(scale * zoomFactor, MIN_SCALE, MAX_SCALE);
        const worldPoint = screenToWorld(screenPoint.x, screenPoint.y);

        scale = nextScale;
        offsetX = screenPoint.x - worldPoint.x * scale;
        offsetY = screenPoint.y - worldPoint.y * scale;
    }

    function onPointerDown(event) {
        unlockAudio();
        mapCanvas.setPointerCapture(event.pointerId);
        pointer = eventToCanvas(event);
        dragStart = {
            pointer,
            offsetX,
            offsetY,
        };
        dragDistance = 0;
    }

    function onPointerMove(event) {
        const nextPointer = eventToCanvas(event);

        if (dragStart) {
            const dx = nextPointer.x - dragStart.pointer.x;
            const dy = nextPointer.y - dragStart.pointer.y;
            dragDistance = Math.max(dragDistance, Math.hypot(dx, dy));
            offsetX = dragStart.offsetX + dx;
            offsetY = dragStart.offsetY + dy;
        }

        pointer = nextPointer;
    }

    function onPointerUp(event) {
        if (dragStart && dragDistance < 4 && pointer) {
            const worldPoint = screenToWorld(pointer.x, pointer.y);
            if (distanceToTarget(worldPoint) <= TARGET.successRadius) {
                window.location.href = wrapper.dataset.scanSuccess || 'signalt';
            }
        }

        dragStart = null;
        dragDistance = 0;

        try {
            mapCanvas.releasePointerCapture(event.pointerId);
        } catch (_error) {
            // Pointer capture can already be released by the browser.
        }
    }

    function onWheel(event) {
        event.preventDefault();
        unlockAudio();
        pointer = eventToCanvas(event);
        zoomAt(pointer, -event.deltaY);
    }

    function initialize() {
        mapCanvas.width = overlayCanvas.width = VIEWPORT.width;
        mapCanvas.height = overlayCanvas.height = VIEWPORT.height;

        if (wrapper.dataset.scanFrame) {
            wrapper.style.backgroundImage = `url("${wrapper.dataset.scanFrame}")`;
        }

        signalAudios.forEach((audio) => {
            audio.preload = 'auto';
            audio.loop = true;
        });

        mapCanvas.addEventListener('pointerdown', onPointerDown);
        mapCanvas.addEventListener('pointermove', onPointerMove);
        mapCanvas.addEventListener('pointerup', onPointerUp);
        mapCanvas.addEventListener('pointercancel', onPointerUp);
        mapCanvas.addEventListener('pointerleave', () => {
            pointer = null;
            setSignal(-1);
        });
        mapCanvas.addEventListener('wheel', onWheel, { passive: false });

        animationFrame = window.requestAnimationFrame(render);
    }

    Promise.all([
        loadImage(mapImage, wrapper.dataset.scanMap || '/assets/img/gaea1/scan/etoiles.png'),
        loadImage(frameImage, wrapper.dataset.scanFrame || '/assets/img/gaea1/scan/fondscan.png'),
        loadImage(overlayImage, wrapper.dataset.scanOverlay || '/assets/img/gaea1/scan/scanoverlay.png'),
    ]).then(initialize);

    window.addEventListener('beforeunload', () => {
        window.cancelAnimationFrame(animationFrame);
        signalAudios.forEach((audio) => {
            audio.pause();
        });
    });
})();
