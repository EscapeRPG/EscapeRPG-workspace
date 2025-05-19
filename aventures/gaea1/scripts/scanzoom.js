let canvas = document.getElementById('canvasfond'),
	canvasol = document.getElementById('canvasoverlay'),
	fond = document.getElementById('fond'),
	overlay = document.getElementById('ol'),
	xmouse = document.getElementById('mouseX'),
	ymouse = document.getElementById('mouseY');
const width = canvas.width = 800;
const height = canvas.height = 400;
const olwidth = canvasol.width = 800;
const olheight = canvasol.height = 400;
	
class Events
{
	constructor(canvasevtId)
	{
		this.canvasevt = document.getElementById("canvasfond");
		this.context = this.canvasevt.getContext("2d");
		this.drawStage = undefined;
		this.listening = false;
		this.mousePos = null;
		this.mouseEnter = false;
		this.mouseDown = false;
		this.mouseUp = false;
		this.mouseOver = false;
		this.mouseMove = false;
		this.currentRegion = null;
		this.regionIndex = 0;
		this.lastRegionIndex = -1;
		this.mouseOverRegionIndex = -1;
	}

	getContext() { return this.context; }

	getCanvas() { return this.canvasevt; }

	clear() { this.context.clearRect(0, 0, this.canvasevt.width, this.canvasevt.height); }

	getCanvasPos()
	{
		let obj = this.getCanvas();
		let top = 0;
		let left = 0;
		while (obj.tagName != "BODY")
		{
			top += obj.offsetTop;
			left += obj.offsetLeft;
			obj = obj.offsetParent;
		}
		return { top: top, left: left };
	}

	setDrawStage(func) { this.drawStage = func; this.listen(); }

	reset(evt)
	{
		if (!evt) { evt = window.event; }
		this.setMousePosition(evt);
		this.regionIndex = 0;
		if (!this.animating && this.drawStage !== undefined) { this.drawStage(); }
		this.mouseOver = false;
		this.mouseEnter = false;
		this.mouseMove = false;
		this.mouseDown = false;
		this.mouseUp = false;
	}

	listen()
	{
		const that = this;
		if (this.drawStage !== undefined) { this.drawStage(); }
		this.canvasevt.addEventListener("mousedown", evt => { that.mouseDown = true; that.reset(evt); }, false);
		this.canvasevt.addEventListener("mouseenter", evt => { that.reset(evt); }, false);
		this.canvasevt.addEventListener("mousemove", evt => { that.reset(evt); }, false);
		this.canvasevt.addEventListener("mouseover", evt => { that.reset(evt); }, false);
		this.canvasevt.addEventListener("mouseout", evt => { that.mousePos = null; }, false);
	}

	getMousePos(evt) { return this.mousePos; }

	setMousePosition(event)
	{
		let rect = canvas.getBoundingClientRect();
		const mouseX = (event.clientX - rect.left) / (rect.right - rect.left) * width;
		const mouseY = (event.clientY - rect.top) / (rect.bottom - rect.top) * height;
		this.mousePos = { x: mouseX, y: mouseY };
	}

	beginRegion() { this.currentRegion = {}; this.regionIndex++; }

	addRegionEventListener(type, func) { let event = (type.indexOf('touch') == -1) ? `on${type}` : type; this.currentRegion[event] = func; }

	closeRegion()
	{
		const pos = this.mousePos;
		if (pos !== null && this.context.isPointInPath(pos.x, pos.y))
		{
			if (this.lastRegionIndex != this.regionIndex)
				{ this.lastRegionIndex = this.regionIndex; }
			if (this.mouseDown && this.currentRegion.onmousedown !== undefined)
				{ this.currentRegion.onmousedown(); this.mouseDown = false; }
			else if (!this.mouseOver && this.regionIndex != this.mouseOverRegionIndex && this.currentRegion.onmouseover !== undefined)
				{ this.currentRegion.onmouseover(); this.mouseOver = true; this.mouseOverRegionIndex = this.regionIndex; }
			else if (!this.mouseEnter && this.regionIndex != this.mouseEnterRegionIndex && this.currentRegion.onmouseenter !== undefined)
				{ this.currentRegion.onmouseenter(); this.mouseEnter = true; this.mouseEnterRegionIndex = this.regionIndex; }
			else if (!this.mouseMove && this.currentRegion.onmousemove !== undefined)
				{ this.currentRegion.onmousemove(); this.mouseMove = true; }
		}
		else if (this.regionIndex == this.lastRegionIndex)
		{
			this.lastRegionIndex = -1;
			this.mouseOverRegionIndex = -1;
			if (this.currentRegion.onmouseout !== undefined) { this.currentRegion.onmouseout(); }
		}
	}
};

function trackTransforms(ctx)
{
	let svg = document.createElementNS("http://www.w3.org/2000/svg",'svg');
	let xform = svg.createSVGMatrix();
	ctx.getTransform = function() { return xform; };
	let savedTransforms = [];
	let save = ctx.save;
	ctx.save = function() { savedTransforms.push(xform.translate(0,0)); return save.call(ctx); };
	let restore = ctx.restore;
	ctx.restore = function() { xform = savedTransforms.pop(); return restore.call(ctx); };
	let scale = ctx.scale;
	ctx.scale = function(sx,sy) { xform = xform.scaleNonUniform(sx,sy); return scale.call(ctx,sx,sy); };
	let rotate = ctx.rotate;
	ctx.rotate = function(radians) { xform = xform.rotate(radians*180/Math.PI); return rotate.call(ctx,radians); };
	let translate = ctx.translate;
	ctx.translate = function(dx,dy) { xform = xform.translate(dx,dy); return translate.call(ctx,dx,dy); };
	let transform = ctx.transform;
	ctx.transform = function(a,b,c,d,e,f)
	{
		let m2 = svg.createSVGMatrix();
		m2.a=a; m2.b=b; m2.c=c; m2.d=d; m2.e=e; m2.f=f;
		xform = xform.multiply(m2);
		return transform.call(ctx,a,b,c,d,e,f);
	};
	let setTransform = ctx.setTransform;
	ctx.setTransform = function(a,b,c,d,e,f)
	{
		xform.a = a;
		xform.b = b;
		xform.c = c;
		xform.d = d;
		xform.e = e;
		xform.f = f;
		return setTransform.call(ctx,a,b,c,d,e,f);
	};
	let pt  = svg.createSVGPoint();
	ctx.transformedPoint = function(x,y) { pt.x=x; pt.y=y; return pt.matrixTransform(xform.inverse()); }
}

function scanzoom()
{
	let ctx = canvas.getContext('2d');
		ctxol = canvasol.getContext('2d');
	trackTransforms(ctx);
	
	let audiocercle1 = new Audio('/escaperpg/sons/gaea1/signal1.mp3'),
		audiocercle2 = new Audio('/escaperpg/sons/gaea1/signal2.mp3'),
		audiocercle3 = new Audio('/escaperpg/sons/gaea1/signal3.mp3'),
		audiocercle4 = new Audio('/escaperpg/sons/gaea1/signal4.mp3'),
		audiocerclegoal = new Audio('/escaperpg/sons/gaea1/signalgoal.mp3');
		audiocercle1.loop = true;
		audiocercle2.loop = true;
		audiocercle3.loop = true;
		audiocercle4.loop = true;
		audiocerclegoal.loop = true;

	canvas.addEventListener('mousemove', function(event)
	{
		let rect = canvasol.getBoundingClientRect();
		let x = (event.clientX - rect.left) / (rect.right - rect.left) * olwidth;
		let y = (event.clientY - rect.top) / (rect.bottom - rect.top) * olheight;
		ctxol.clearRect(0, 0, olwidth, olheight);
		drawoverlay();
		ctxol.beginPath();
		ctxol.moveTo(0,y);
		ctxol.lineTo(olwidth,y);
		ctxol.moveTo(x,0);
		ctxol.lineTo(x,olheight);
		ctxol.lineWidth = 1;
		ctxol.strokeStyle = "teal";
		ctxol.stroke();
		ctxol.closePath();
		
		let p1 = ctx.transformedPoint(0,0);
		let p2 = ctx.transformedPoint(canvas.width,canvas.height);
		let rectfond = canvas.getBoundingClientRect();
		let transx = (event.clientX - rectfond.left) / (rectfond.right - rectfond.left) * width;
		let transy = (event.clientY - rectfond.top) / (rectfond.bottom - rectfond.top) * height;
		const transform = ctx.getTransform();
			xX = transx * (1 / transform.a);
			yY = transy * (1 / transform.d);
			roundX = xX + p1.x;
			roundY = yY + p1.y;
		xmouse.innerHTML = (Math.round(roundX));
		ymouse.innerHTML = (Math.round(roundY));
	});
	
	let cerclecursor;
	
	function cursorcercle() { canvas.classList.add("cursorcercle1"); setTimeout(cursorcercleremove, 450); }
		
	function cursorcercleremove() { canvas.classList.remove("cursorcercle1"); }
	
	function redraw()
	{
		let p1 = ctx.transformedPoint(0,0);
		let p2 = ctx.transformedPoint(canvas.width,canvas.height);
		ctx.clearRect(p1.x,p1.y,p2.x-p1.x,p2.y-p1.y);

		let events = new Events("canvasfond");
		let canvasevt = events.getCanvas();
		let context = events.getContext();

		ctx.drawImage(fond, -600, -800, 2000, 2000);
		
		events.setDrawStage(function()
		{
			this.beginRegion();
			context.beginPath();
			context.arc(1020, 372, 100, 0, Math.PI * 2, false); // trou -- marge gauche, marge haut, taille, angle départ, angle arrivée
			context.arc(1100, 412, 200, 0, Math.PI * 2, true); // marge gauche, marge haut, taille, angle départ, angle arrivée
			context.fillStyle = "transparent";
			context.fill();
			this.addRegionEventListener("mouseover", function()
			{
				cursorcercle();
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle1.play();
				audiocercle1.muted = false;
				audiocercle2.muted = true;
				audiocercle3.muted = true;
				audiocercle4.muted = true;
				audiocerclegoal.muted = true;
				if (!cerclecursor) { cerclecursor = setInterval(cursorcercle, 2000); }
			});
			this.addRegionEventListener("mouseout", function()
			{
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle1.muted = true;
			});
			this.closeRegion();
			
			this.beginRegion();
			context.beginPath();
			context.arc(1054, 352, 40, 0, Math.PI * 2, false); // trou -- marge gauche, marge haut, taille, angle départ, angle arrivée
			context.arc(1020, 372, 100, 0, Math.PI * 2, true); // marge gauche, marge haut, taille, angle départ, angle arrivée
			context.fillStyle = "transparent";
			context.fill();
			this.addRegionEventListener("mouseover", function()
			{
				cursorcercle();
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle2.play();
				audiocercle1.muted = true;
				audiocercle2.muted = false;
				audiocercle3.muted = true;
				audiocercle4.muted = true;
				audiocerclegoal.muted = true;
				if (!cerclecursor) { cerclecursor = setInterval(cursorcercle, 1500); }
			});
			this.addRegionEventListener("mouseout", function()
			{
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle2.muted = true;
			});
			this.closeRegion();

			this.beginRegion();
			context.beginPath();
			context.arc(1044, 328, 10, 0, Math.PI * 2, false); // trou -- marge gauche, marge haut, taille, angle départ, angle arrivée
			context.arc(1054, 352, 40, 0, Math.PI * 2, true); // marge gauche, marge haut, taille, angle départ, angle arrivée
			context.fillStyle = "transparent";
			context.fill();
			this.addRegionEventListener("mouseover", function()
			{
				cursorcercle();
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle3.play();
				audiocercle1.muted = true;
				audiocercle2.muted = true;
				audiocercle3.muted = false;
				audiocercle4.muted = true;
				audiocerclegoal.muted = true;
				if (!cerclecursor) { cerclecursor = setInterval(cursorcercle, 1000); }
			});
			this.addRegionEventListener("mouseout", function()
			{
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle3.muted = true;
			});
			this.closeRegion();

			this.beginRegion();
			context.beginPath();
			context.arc(1044, 328, 2, 0, Math.PI * 2, false); // trou -- marge gauche, marge haut, taille, angle départ, angle arrivée
			context.arc(1044, 328, 10, 0, Math.PI * 2, true); // marge gauche, marge haut, taille, angle départ, angle arrivée
			context.fillStyle = "transparent";
			context.fill();
			this.addRegionEventListener("mouseover", function()
			{
				cursorcercle();
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle4.play();
				audiocercle1.muted = true;
				audiocercle2.muted = true;
				audiocercle3.muted = true;
				audiocercle4.muted = false;
				audiocerclegoal.muted = true;
				if (!cerclecursor) { cerclecursor = setInterval(cursorcercle, 750); }
			});
			this.addRegionEventListener("mouseout", function()
			{
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocercle4.muted = true;
			});
			this.closeRegion();

			this.beginRegion();
			context.beginPath();
			context.arc(1044, 328, 2, 0, Math.PI * 2, true); // marge gauche, marge haut, taille, angle départ, angle arrivée
			context.fillStyle = "transparent";
			context.fill();
			this.addRegionEventListener("mouseover", function()
			{
				cursorcercle();
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocerclegoal.play();
				audiocercle1.muted = true;
				audiocercle2.muted = true;
				audiocercle3.muted = true;
				audiocercle4.muted = true;
				audiocerclegoal.muted = false;
				if (!cerclecursor) { cerclecursor = setInterval(cursorcercle, 500); }
			});
			this.addRegionEventListener("mouseout", function()
			{
				clearInterval(cerclecursor);
				cerclecursor = null;
				audiocerclegoal.muted = true;
			});
			this.addRegionEventListener("mousedown", function() { document.location.href="signalt"; });
			this.closeRegion();
		});
	}
	redraw();
	
	function drawoverlay() { ctxol.drawImage(overlay, 0, 0, olwidth, olheight); }
	drawoverlay();
	
	let lastX=canvas.width/2, lastY=canvas.height/2;
	let dragStart,dragged;
	
	canvas.addEventListener('mousedown',function(event)
	{
		document.body.style.mozUserSelect = document.body.style.webkitUserSelect = document.body.style.userSelect = 'none';
		let rect = canvas.getBoundingClientRect();
		lastX = (event.clientX - rect.left) / (rect.right - rect.left) * width;
		lastY = (event.clientY - rect.top) / (rect.bottom - rect.top) * height;
		dragStart = ctx.transformedPoint(lastX,lastY);
		dragged = false;
	},false);
		
	canvas.addEventListener('mousemove',function(event)
	{
		let rect = canvas.getBoundingClientRect();
		lastX = (event.clientX - rect.left) / (rect.right - rect.left) * width;
		lastY = (event.clientY - rect.top) / (rect.bottom - rect.top) * height;
		dragged = true;
		if (dragStart) { let pt = ctx.transformedPoint(lastX,lastY); ctx.translate(pt.x-dragStart.x,pt.y-dragStart.y); }
		redraw(); 
	},false);
		
	canvas.addEventListener('mouseup',function(evt) { dragStart = null; if (!dragged); },false);

	let scaleFactor = 1.05;
	let zoom = function(clicks)
	{
		let pt = ctx.transformedPoint(lastX,lastY);
		ctx.translate(pt.x,pt.y);
		let factor = Math.pow(scaleFactor,clicks);
		ctx.scale(factor,factor);
		ctx.translate(-pt.x,-pt.y);
		redraw();
	}

	let handleScroll = function(evt)
	{
		let delta = evt.wheelDelta ? evt.wheelDelta/40 : evt.detail ? -evt.detail : 0;
		if (delta) zoom(delta);
		return evt.preventDefault() && false;
	};
	canvas.addEventListener('DOMMouseScroll',handleScroll,false);
	canvas.addEventListener('mousewheel',handleScroll,false);
}

window.addEventListener('load', scanzoom());
