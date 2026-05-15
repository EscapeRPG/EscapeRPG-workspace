const canvas = document.querySelector(".myCanvas");
const resetButton = document.getElementById("reset");
const ctx = canvas?.getContext("2d");
const container = canvas?.parentElement || null;
const background = new Image();

let drawing = false;
let activePointerId = null;
let lastPoint = null;
let resizeFrame = null;
let currentStroke = null;
const strokes = [];

function scheduleResize(forceRedraw = false) {
  const shouldForceRedraw = forceRedraw === true;

  if (resizeFrame !== null) {
    cancelAnimationFrame(resizeFrame);
  }

  resizeFrame = requestAnimationFrame(() => {
    resizeFrame = null;
    resizeCanvas(shouldForceRedraw);
  });
}

function resetCanvas() {
  strokes.length = 0;
  currentStroke = null;
  redrawCanvas();
}

function resizeCanvas(forceRedraw) {
  if (!canvas || !ctx || !container) {
    return;
  }

  const containerWidth = container.getBoundingClientRect().width;
  const availableWidth = containerWidth > 0 ? containerWidth : 900;
  const ratio = background.naturalHeight > 0
    ? background.naturalHeight / background.naturalWidth
    : 0.75;
  const width = Math.max(240, Math.round(availableWidth));
  const height = Math.round(width * ratio);
  const sizeChanged = canvas.width !== width || canvas.height !== height;

  canvas.style.width = `${width}px`;
  canvas.style.height = `${height}px`;

  if (!forceRedraw && !sizeChanged) {
    return;
  }

  canvas.width = width;
  canvas.height = height;
  configureDrawingContext();
  redrawCanvas();
}

function configureDrawingContext() {
  if (!ctx) {
    return;
  }

  ctx.lineCap = "round";
  ctx.lineJoin = "round";
  ctx.strokeStyle = "rgb(255,255,255)";
  ctx.lineWidth = 5;
}

function drawBackground() {
  if (!ctx || !canvas || background.naturalWidth === 0) {
    return;
  }

  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(background, 0, 0, canvas.width, canvas.height);
}

function pointerPosition(event) {
  const rect = canvas.getBoundingClientRect();

  return {
    x: (event.clientX - rect.left) * (canvas.width / rect.width),
    y: (event.clientY - rect.top) * (canvas.height / rect.height),
  };
}

function normalizePoint(point) {
  return {
    x: point.x / canvas.width,
    y: point.y / canvas.height,
  };
}

function denormalizePoint(point) {
  return {
    x: point.x * canvas.width,
    y: point.y * canvas.height,
  };
}

function drawSegment(from, to) {
  if (!ctx) {
    return;
  }

  ctx.beginPath();
  ctx.moveTo(from.x, from.y);
  ctx.lineTo(to.x, to.y);
  ctx.stroke();
}

function drawStroke(stroke) {
  if (!ctx || stroke.length === 0) {
    return;
  }

  const firstPoint = denormalizePoint(stroke[0]);

  ctx.beginPath();
  ctx.moveTo(firstPoint.x, firstPoint.y);

  if (stroke.length === 1) {
    ctx.lineTo(firstPoint.x + 0.1, firstPoint.y + 0.1);
  } else {
    stroke.slice(1).forEach((point) => {
      const scaledPoint = denormalizePoint(point);
      ctx.lineTo(scaledPoint.x, scaledPoint.y);
    });
  }

  ctx.stroke();
}

function redrawCanvas() {
  drawBackground();
  strokes.forEach(drawStroke);
}

function startDrawing(event) {
  if (!canvas || activePointerId !== null) {
    return;
  }

  event.preventDefault();
  drawing = true;
  activePointerId = event.pointerId;
  lastPoint = pointerPosition(event);
  currentStroke = [normalizePoint(lastPoint)];
  strokes.push(currentStroke);
  canvas.setPointerCapture(event.pointerId);
  drawSegment(lastPoint, lastPoint);
}

function continueDrawing(event) {
  if (!drawing || event.pointerId !== activePointerId || lastPoint === null) {
    return;
  }

  event.preventDefault();
  const nextPoint = pointerPosition(event);
  drawSegment(lastPoint, nextPoint);
  currentStroke?.push(normalizePoint(nextPoint));
  lastPoint = nextPoint;
}

function stopDrawing(event) {
  if (event.pointerId !== activePointerId) {
    return;
  }

  drawing = false;
  activePointerId = null;
  lastPoint = null;
  currentStroke = null;
}

background.addEventListener("load", () => scheduleResize(true));
background.src = "/assets/img/avent/carteduciel.png";
window.addEventListener("resize", scheduleResize);
window.addEventListener("load", scheduleResize);
resetButton?.addEventListener("click", resetCanvas);

if (container && "ResizeObserver" in window) {
  new ResizeObserver(scheduleResize).observe(container);
}

canvas?.addEventListener("pointerdown", startDrawing);
canvas?.addEventListener("pointermove", continueDrawing);
canvas?.addEventListener("pointerup", stopDrawing);
canvas?.addEventListener("pointercancel", stopDrawing);
canvas?.addEventListener("lostpointercapture", () => {
  drawing = false;
  activePointerId = null;
  lastPoint = null;
  currentStroke = null;
});

configureDrawingContext();
scheduleResize();
