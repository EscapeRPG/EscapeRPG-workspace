(() => {
    const canvas = document.getElementById('canvasexplo');
    const exploration = document.getElementById('exploration');
    if (!canvas || !exploration) {
        return;
    }

    const ctx = canvas.getContext('2d');
    if (!ctx) {
        return;
    }

    const width = canvas.width = 800;
    const height = canvas.height = 600;

    fillShadow();
    exploration.addEventListener('pointermove', (event) => {
        const rect = canvas.getBoundingClientRect();
        const x = (event.clientX - rect.left) / (rect.right - rect.left) * width;
        const y = (event.clientY - rect.top) / (rect.bottom - rect.top) * height;

        ctx.clearRect(0, 0, width, height);
        fillShadow();
        clearArc(x, y);
        drawLightPoint(x, y);
    });
    exploration.addEventListener('pointerleave', () => {
        ctx.clearRect(0, 0, width, height);
        fillShadow();
    });

    function fillShadow() {
        ctx.beginPath();
        ctx.filter = 'blur(0px)';
        ctx.fillStyle = 'rgba(0, 0, 0, 0.9)';
        ctx.fillRect(0, 0, width, height);
        ctx.closePath();
    }

    function clearArc(x, y) {
        ctx.save();
        ctx.globalCompositeOperation = 'destination-out';
        ctx.beginPath();
        ctx.filter = 'blur(5px)';
        ctx.arc(x, y, 80, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'rgb(0, 0, 0)';
        ctx.fill();
        ctx.filter = 'blur(0px)';
        ctx.arc(x, y, 100, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'rgba(0, 0, 0, 0.6)';
        ctx.fill();
        ctx.arc(x, y, 128, 0, 2 * Math.PI, true);
        ctx.fillStyle = 'rgba(0, 0, 0, 0.4)';
        ctx.fill();
        ctx.filter = 'blur(5px)';
        ctx.arc(x, y, 130, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'rgba(0, 0, 0, 0.8)';
        ctx.fill();
        ctx.filter = 'blur(30px)';
        ctx.arc(x, y, 170, 0, 2 * Math.PI, true);
        ctx.fillStyle = 'rgba(0, 0, 0, 0.2)';
        ctx.fill();
        ctx.restore();
    }

    function drawLightPoint(x, y) {
        ctx.beginPath();
        ctx.filter = 'blur(2px)';
        ctx.arc(x, y, 3, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'rgba(255, 255, 255, 0.4)';
        ctx.fill();
        ctx.closePath();
    }
})();
