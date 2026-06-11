(() => {
  const patternConfigs = [
    {
      canvasId: "schemalangue1",
      inputId: "schema1",
      successValue: "237",
      pattern: [1, 3, 4, 5, 2, 0, 0, 6, 0, 8, 7, 0, 0, 9, 10, 0],
    },
    {
      canvasId: "schemalangue2",
      inputId: "schema2",
      successValue: "555",
      pattern: [6, 5, 3, 0, 7, 4, 0, 2, 8, 0, 0, 1, 0, 9, 10, 0],
    },
    {
      canvasId: "schemalangue3",
      inputId: "schema3",
      successValue: "340",
      pattern: [6, 5, 3, 0, 7, 4, 0, 2, 0, 8, 0, 1, 0, 0, 9, 10],
    },
  ];

  class UnlockPattern {
    constructor(config) {
      this.canvas = document.getElementById(config.canvasId);
      this.input = document.getElementById(config.inputId);

      if (!this.canvas || !this.input) {
        return;
      }

      this.ctx = this.canvas.getContext("2d");

      if (!this.ctx) {
        return;
      }

      this.successValue = config.successValue;
      this.correctPattern = config.pattern;
      this.dotCount = 16;
      this.radius = 10;
      this.ink = "rgb(255,160,0)";
      this.selected = new Array(this.dotCount).fill(false);
      this.pattern = new Array(this.dotCount).fill(0);
      this.rects = this.buildRects();
      this.lines = [];
      this.index = 1;
      this.firstPointIndex = null;
      this.drawing = false;
      this.startX = 0;
      this.startY = 0;
      this.endX = 0;
      this.endY = 0;

      this.setupListeners();
      window.requestAnimationFrame(() => this.paint());
    }

    buildRects() {
      const cols = 4;
      const rows = 4;
      const spacingX = this.canvas.width / cols;
      const spacingY = this.canvas.height / rows;

      return Array.from({ length: this.dotCount }, (_, index) => {
        const x = (index % cols) * spacingX + spacingX / 2;
        const y = Math.floor(index / cols) * spacingY + spacingY / 2;

        return new Rectangle(x - this.radius, y - this.radius, this.radius * 2, this.radius * 2);
      });
    }

    setupListeners() {
      this.canvas.addEventListener("pointerdown", (event) => this.startDrawing(event));
      this.canvas.addEventListener("pointermove", (event) => this.drawPattern(event));
      this.canvas.addEventListener("pointerup", () => this.stopDrawing());
      this.canvas.addEventListener("pointercancel", () => this.stopDrawing());
      this.canvas.addEventListener("pointerleave", () => this.stopDrawing());
    }

    startDrawing(event) {
      const point = this.getPoint(event);
      const startIndex = this.findDotIndex(point);

      if (startIndex === -1) {
        return;
      }

      this.canvas.setPointerCapture?.(event.pointerId);
      this.resetScreen();
      this.activateDot(startIndex);
      this.drawing = true;
      this.firstPointIndex = startIndex;
    }

    stopDrawing() {
      if (!this.drawing) {
        return;
      }

      this.drawing = false;
      this.input.value = this.patternCheck() ? this.successValue : "0";
    }

    drawPattern(event) {
      if (!this.drawing) {
        return;
      }

      const point = this.getPoint(event);
      this.endX = point.x;
      this.endY = point.y;

      const nextIndex = this.findDotIndex(point);

      if (nextIndex !== -1 && !this.selected[nextIndex]) {
        this.lines.push(
          new Line(
            this.startX,
            this.startY,
            this.rects[nextIndex].getCenterX(),
            this.rects[nextIndex].getCenterY()
          )
        );
        this.activateDot(nextIndex);
      }
    }

    activateDot(index) {
      const rect = this.rects[index];
      this.startX = rect.getCenterX();
      this.startY = rect.getCenterY();
      this.endX = this.startX;
      this.endY = this.startY;
      this.selected[index] = true;
      this.pattern[index] = this.index;
      this.index += 1;
    }

    paint() {
      this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
      this.ctx.lineWidth = 8;
      this.ctx.lineCap = "round";
      this.ctx.lineJoin = "round";
      this.ctx.strokeStyle = this.ink;

      this.rects.forEach((rect, index) => this.drawDot(rect, index));
      this.lines.forEach((line) => line.draw(this.ctx));

      if (this.drawing) {
        new Line(this.startX, this.startY, this.endX, this.endY).draw(this.ctx);
      }

      window.requestAnimationFrame(() => this.paint());
    }

    drawDot(rect, index) {
      const centerX = rect.getCenterX();
      const centerY = rect.getCenterY();
      const selected = this.selected[index];

      this.ctx.beginPath();
      this.ctx.fillStyle = selected && index === this.firstPointIndex ? "#00ff06" : "lightskyblue";
      this.ctx.arc(centerX, centerY, selected ? this.radius + 4 : this.radius, 0, Math.PI * 2);
      this.ctx.fill();
    }

    resetScreen() {
      this.lines = [];
      this.selected.fill(false);
      this.pattern.fill(0);
      this.index = 1;
      this.firstPointIndex = null;
      this.input.value = "0";
    }

    patternCheck() {
      return this.pattern.every((value, index) => value === this.correctPattern[index]);
    }

    findDotIndex(point) {
      return this.rects.findIndex((rect) => rect.contains(point));
    }

    getPoint(event) {
      const rect = this.canvas.getBoundingClientRect();
      const scaleX = this.canvas.width / rect.width;
      const scaleY = this.canvas.height / rect.height;

      return new Point((event.clientX - rect.left) * scaleX, (event.clientY - rect.top) * scaleY);
    }
  }

  class Line {
    constructor(startX, startY, endX, endY) {
      this.startX = startX;
      this.startY = startY;
      this.endX = endX;
      this.endY = endY;
    }

    draw(ctx) {
      ctx.beginPath();
      ctx.moveTo(this.startX, this.startY);
      ctx.lineTo(this.endX, this.endY);
      ctx.stroke();
    }
  }

  class Rectangle {
    constructor(x, y, width, height) {
      this.x = x;
      this.y = y;
      this.width = width;
      this.height = height;
    }

    contains(point) {
      return (
        point.x >= this.x &&
        point.x <= this.x + this.width &&
        point.y >= this.y &&
        point.y <= this.y + this.height
      );
    }

    getCenterX() {
      return this.x + this.width / 2;
    }

    getCenterY() {
      return this.y + this.height / 2;
    }
  }

  class Point {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
  }

  patternConfigs.forEach((config) => new UnlockPattern(config));
})();
