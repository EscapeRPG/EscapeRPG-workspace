const canvas = document.querySelector('.myCanvas');
const ctx = canvas.getContext('2d');

window.addEventListener('resize', resizeCanvas, false);

function resizeCanvas()
{
	const width = canvas.width = window.innerWidth;
	const height = canvas.height = window.innerHeight-10;

	let fond = new Image();
	fond.src = '/escaperpg/images/avent/carteduciel.png';
	ctx.drawImage(fond, 0, 0, width, height);

	ctx.fillStyle = 'rgba(0,0,0,0)';
	ctx.fillRect(0,0,width,height);

	const sizePicker = 3;

	// covert degrees to radians
	function degToRad(degrees) {
	return degrees * Math.PI / 180;
	};

	// store mouse pointer coordinates, and whether the button is pressed
	let curX;
	let curY;
	let pressed = false;

	// update mouse pointer coordinates
	document.onmousemove = function(e) {
	curX = (window.Event) ? e.pageX : e.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
	curY = (window.Event) ? e.pageY : e.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
	canvas.style.cursor = "url('/escaperpg/images/crayon.png'), auto";
	}

	canvas.onmousedown = function() {
	pressed = true;
	};

	canvas.onmouseup = function() {
	pressed = false;
	}

	function draw() {
	if(pressed) {
	  ctx.fillStyle = 'rgb(255,255,255)';
	  ctx.beginPath();
	  ctx.arc(curX, curY, sizePicker, degToRad(0), degToRad(360), false);
	  ctx.fill();
	}

	requestAnimationFrame(draw);
	}

	draw();
}
