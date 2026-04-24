class UnlockPattern {
	constructor(canvasId, correctPattern) {
		this.canvas = document.getElementById(canvasId);
		this.ctx = this.canvas.getContext("2d");
		this.dots = 16;
		this.trues = new Array(this.dots).fill(false);
		this.rects = new Array(this.dots);
		this.lines = [];
		this.pattern = new Array(this.dots).fill(0);
		this.correctPattern = correctPattern;
		this.ink = "rgb(255,160,0)";
		this.radius = 10;
		this.drawing = false;
		this.firstPointIndex = null;
		this.index = 1;
		this.startx = this.starty = this.endx = this.endy = 0;
		this.start = this.end = null;
		let cols = 4, rows = 4;
		let spacingX = this.canvas.width / cols;
		let spacingY = this.canvas.height / rows;

		for (let i = 0; i < this.dots; i++) {
			let x = (i % cols) * spacingX + spacingX / 2;
			let y = Math.floor(i / cols) * spacingY + spacingY / 2;

			this.rects[i] = new Rectangle(x - this.radius, y - this.radius, this.radius * 2, this.radius * 2);
		}

		this.setupListeners();

		requestAnimationFrame(() => this.paint());
	}
	
	setupListeners() {
		this.canvas.addEventListener('mousedown', (e) => this.startDrawing(e));
		this.canvas.addEventListener('mouseup', () => this.stopDrawing());
		this.canvas.addEventListener('mousemove', (e) => this.drawPattern(e));
	}
	
	startDrawing(e) {
		this.resetScreen();
		const { offsetX, offsetY } = e;

		for (let i = 0; i < this.dots; i++) {
			if (this.rects[i]?.contains(new Point(offsetX, offsetY))) {
				this.startx = this.rects[i].getCenterX();
				this.starty = this.rects[i].getCenterY();
				this.endx = this.startx;
				this.endy = this.starty;
				this.trues[i] = true;
				this.pattern[i] = this.index;
				this.start = i;
				this.drawing = true;
				this.firstPointIndex = i;
				break;
			}
		}
	}
	
	stopDrawing() {
		this.drawing = false;
		
		const schema1 = document.getElementById("schema1"),
			schema2 = document.getElementById("schema2"),
			schema3 = document.getElementById("schema3");
		
		if (this.patternCheck()) {
			if (this.canvas.id == "schemalangue1") { schema1.value = 237; }
			if (this.canvas.id == "schemalangue2") { schema2.value = 555; }
			if (this.canvas.id == "schemalangue3") { schema3.value = 340; }
		} else {
			if (this.canvas.id == "schemalangue1") { schema1.value = 0; }
			if (this.canvas.id == "schemalangue2") { schema2.value = 0; }
			if (this.canvas.id == "schemalangue3") { schema3.value = 0; }
		}
	}
	
	drawPattern(e) {
		if (!this.drawing) return;
		this.endx = e.offsetX;
		this.endy = e.offsetY;

		for (let i = 0; i < this.rects.length; i++) {
			if (!this.trues[i] && this.rects[i]?.contains(new Point(this.endx, this.endy))) {
				this.index++;
				this.lines.push(new Line(this.startx, this.starty, this.rects[i].getCenterX(), this.rects[i].getCenterY()));
				this.startx = this.rects[i].getCenterX();
				this.starty = this.rects[i].getCenterY();
				this.trues[i] = true;
				this.pattern[i] = this.index;
				this.start = i;
				break;
			}
		}
	}
	
	paint() {
		this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
		this.ctx.lineWidth = 8;
		this.ctx.lineCap = 'round';
		this.ctx.lineJoin = 'round';
		this.ctx.strokeStyle = this.ink;
		this.ctx.fillStyle = "lightskyblue";

		for (let i = 0; i < this.rects.length; i++) {
			if (this.rects[i]) {
				this.ctx.beginPath();
				const centerX = this.rects[i].getCenterX();
				const centerY = this.rects[i].getCenterY();
		
				if (this.trues[i]) {
					this.ctx.fillStyle = (i === this.firstPointIndex) ? "#00ff06" : "lightskyblue";
					this.ctx.arc(centerX, centerY, this.radius, 0, Math.PI * 2, true);
					this.ctx.fill();
					this.ctx.fillStyle = "transparent";
					this.ctx.arc(centerX, centerY, this.radius + 3, 0, Math.PI * 2, false);
					this.ctx.fill();
					this.ctx.fillStyle = (i === this.firstPointIndex) ? "#00ff06" : "lightskyblue";
					this.ctx.arc(centerX, centerY, this.radius + 4, 0, Math.PI * 2, true);
					this.ctx.fill();

				} else {
					this.ctx.fillStyle = "lightskyblue";
					this.ctx.arc(centerX, centerY, this.radius, 0, Math.PI * 2);
				}
				this.ctx.fill();
			}
		}
		
		this.lines.forEach(line => line.draw(this.ctx));

		if (this.drawing) {
			new Line(this.startx, this.starty, this.endx, this.endy).draw(this.ctx);
		}

		requestAnimationFrame(() => this.paint());
	}

	resetScreen() {
		this.lines = [];
		this.trues.fill(false);
		this.pattern.fill(0);
		this.index = 1;
		this.firstPointIndex = null;
	}
	
	patternCheck() {
		return JSON.stringify(this.pattern) === JSON.stringify(this.correctPattern);
	}
}

class Line {
	constructor(startx, starty, endx, endy) {
		this.startx = startx;
		this.starty = starty;
		this.endx = endx;
		this.endy = endy;
	}

	draw(ctx) {
		ctx.beginPath();
		ctx.moveTo(this.startx, this.starty);
		ctx.lineTo(this.endx, this.endy);
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
		return point.x >= this.x && point.x <= this.x + this.width && point.y >= this.y && point.y <= this.y + this.height;
	}

	getCenterX() { return this.x + this.width / 2; }

	getCenterY() { return this.y + this.height / 2; }
}

class Point {
	constructor(x, y) { this.x = x; this.y = y; }
}

const patterns = [
	[1, 3, 4, 5, 2, 0, 0, 6, 0, 8, 7, 0, 0, 9, 10, 0],
	[6, 5, 3, 0, 7, 4, 0, 2, 8, 0, 0, 1, 0, 9, 10, 0],
	[6, 5, 3, 0, 7, 4, 0, 2, 0, 8, 0, 1, 0, 0, 9, 10]
];
new UnlockPattern("schemalangue1", patterns[0]);
new UnlockPattern("schemalangue2", patterns[1]);
new UnlockPattern("schemalangue3", patterns[2]);
