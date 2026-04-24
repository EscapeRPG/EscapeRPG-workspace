let canvas = document.getElementById('canvasexplo'),
	ctx = canvas.getContext('2d');

const width = canvas.width = 800;
const height = canvas.height = 600;

ctx.beginPath();
ctx.fillStyle = "rgba(0,0,0,0.9)";
ctx.fillRect(0, 0, width, height);
	
function lampe() {
	let rect = canvas.getBoundingClientRect();
	let x = (event.clientX - rect.left) / (rect.right - rect.left) * width;
	let y = (event.clientY - rect.top) / (rect.bottom - rect.top) * height;
	ctx.clearRect(0, 0, width, height);
	ctx.beginPath();
	ctx.filter="blur(0px)";
	ctx.fillStyle = "rgba(0,0,0,0.9)";
	ctx.fillRect(0, 0, width, height);
	clearArc(ctx, x, y);
	ctx.closePath();
	ctx.beginPath();
	ctx.filter="blur(2px)";
	ctx.arc(x, y, 3, 0, 2 * Math.PI, false);
	ctx.fillStyle = 'rgba(255, 255, 255, 0.4)';
	ctx.fill();
	ctx.closePath();
}

function clearArc(ctx, x, y) {
	ctx.save();
	ctx.globalCompositeOperation = 'destination-out';
	ctx.beginPath();
	ctx.filter="blur(5px)";
	ctx.arc(x, y, 80, 0, 2 * Math.PI, false);
	ctx.fillStyle = 'rgb(0, 0, 0)';
	ctx.fill();
	ctx.filter="blur(0px)";
	ctx.arc(x, y, 100, 0, 2 * Math.PI, false);
	ctx.fillStyle = 'rgba(0, 0, 0, 0.6)';
	ctx.fill();
	ctx.arc(x, y, 128, 0, 2 * Math.PI, true);
	ctx.fillStyle = 'rgba(0, 0, 0, 0.4)';
	ctx.fill();
	ctx.filter="blur(5px)";
	ctx.arc(x, y, 130, 0, 2 * Math.PI, false);
	ctx.fillStyle = 'rgba(0, 0, 0, 0.8)';
	ctx.fill();
	ctx.filter="blur(30px)";
	ctx.arc(x, y, 170, 0, 2 * Math.PI, true);
	ctx.fillStyle = 'rgba(0, 0, 0, 0.2)';
	ctx.fill();
	ctx.restore();
}