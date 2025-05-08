const connections = {
		"a1": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"a2": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"a3": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"a4": { "0": ['right", "down", "left'], "90": ['down", "left", "up'], "180": ['left", "up", "right'], "270": ['up", "right", "down'] },
		"a5": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"a6": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"b1": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"b2": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"b3": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"b4": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"b5": { "0": ['right", "down", "left'], "90": ['down", "left", "up'], "180": ['left", "up", "right'], "270": ['up", "right", "down'] },
		"b6": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"c1": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"c2": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"c3": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"c4": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"c5": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"c6": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"d1": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"d2": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"d3": { "0": ['right", "down", "left'], "90": ['down", "left", "up'], "180": ['left", "up", "right'], "270": ['up", "right", "down'] },
		"d4": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"d5": { "0": ['right", "down", "left'], "90": ['down", "left", "up'], "180": ['left", "up", "right'], "270": ['up", "right", "down'] },
		"d6": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"e1": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"e2": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"e3": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"e4": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"e5": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"e6": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"f1": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"f2": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"f3": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"f4": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] },
		"f5": { "0": ['right", "down'], "90": ['down", "left'], "180": ['left", "up'], "270": ['up", "right'] },
		"f6": { "0": ['right", "left'], "90": ['down", "up'], "180": ['left", "right'], "270": ['up", "down'] }
	},
	diode1 = document.getElementById("imgdiode1"), diode2 = document.getElementById("imgdiode2"), diode3 = document.getElementById("imgdiode3"),
	caseDiode1 = document.getElementById("c5"), caseDiode2 = document.getElementById("d2"), caseDiode3 = document.getElementById("f4"),
	caseFinale1 = document.getElementById("a6"), caseFinale2 = document.getElementById("b6"), caseFinale3 = document.getElementById("f1"),
	REUSSI = `Le panneau alimenté, vous le branchez à la petite console accrochée à votre bras, puis donnez l'ordre à la porte de s'ouvrir.
Dans un glissement, elle se renfonce dans le mur et vous permet d'accéder au cœur de la station.`

function rotateImage(event) {
	const item = event.target.closest('.elec');
	const img = item.querySelector('img');
	const imageId = img.id;
	const currentOrientation = parseInt(item.getAttribute('data-orientation'), 10);
	const newOrientation = (currentOrientation + 90) % 360;
	
	item.setAttribute('data-orientation', newOrientation);
	img.style.transform = "rotate(" + newOrientation + "deg)";

	checkActivePath();
	updateActiveClasses();
	checkDiodes();
	checkFinal();
}

let activePath = new Set();

function checkActivePath() {
	activePath.clear();
	const startCase = document.getElementById("b1");
	const startOrientation = parseInt(startCase.getAttribute('data-orientation'), 10);
	const startCaseConnections = connections[startCase.id]?.[startOrientation];

	if (startCaseConnections && startCaseConnections.includes("left")) { activePath.add(startCase.id); }

	let updated;
	
	do {
		updated = false;
		for (let caseId of Object.keys(connections)) {
			if (!activePath.has(caseId)) { 
				const caseElement = document.getElementById(caseId);
				const caseOrientation = parseInt(caseElement.getAttribute('data-orientation'), 10);
				const connectedSides = connections[caseId]?.[caseOrientation];
				
				if (connectedSides && Array.isArray(connectedSides)) {
					for (let connectedSide of connectedSides) {
						if (isCaseConnected(caseId, connectedSide)) {
							activePath.add(caseId);
							updated = true;
							break;
						}
					}
				}
			}
		}
	}
	while (updated);
}

function isCaseConnected(caseId, side) {
	const match = caseId.match(/^([a-z]+)(\d+)$/);
	
	if (!match) { console.error("Format d'ID invalide", caseId); return false; }

	const row = match[1];
	const col = parseInt(match[2], 10);

	switch(side) {
		case "left":
			const leftCase = row + (col - 1);
			return activePath.has(leftCase) && connections[leftCase]?.[parseInt(document.getElementById(leftCase).getAttribute('data-orientation'), 10)]?.includes("right");
		case "right":
			const rightCase = row + (col + 1);
			return activePath.has(rightCase) && connections[rightCase]?.[parseInt(document.getElementById(rightCase).getAttribute('data-orientation'), 10)]?.includes("left");
		case "up":
			const upCase = String.fromCharCode(row.charCodeAt(0) - 1) + col;
			return activePath.has(upCase) && connections[upCase]?.[parseInt(document.getElementById(upCase).getAttribute('data-orientation'), 10)]?.includes("down");
		case "down":
			const downCase = String.fromCharCode(row.charCodeAt(0) + 1) + col;
			return activePath.has(downCase) && connections[downCase]?.[parseInt(document.getElementById(downCase).getAttribute('data-orientation'), 10)]?.includes("up");
		default:
			return false;
	}
}

function updateActiveClasses() {
	document.querySelectorAll('.elec').forEach(item => {
		const caseId = item.id;
		const img = item.querySelector('img');
		const imgCase = img.src;
		const imgName = imgCase.substring(imgCase.lastIndexOf('/') + 1);

		if (activePath.has(caseId)) {
			item.classList.add('active');

			switch (imgName) {
				case "cablecoude.png":
					img.src = "/escaperpg/images/gaea1/electricite/cablecoudeon.png";
					break;
				case "cabledroit.png":
					img.src = "/escaperpg/images/gaea1/electricite/cabledroiton.png";
					break;
				case "cablet.png":
					img.src = "/escaperpg/images/gaea1/electricite/cableton.png";
					break;
			}
		}
		else {
			item.classList.remove('active');

			switch (imgName) {
				case "cablecoudeon.png":
					img.src = "/escaperpg/images/gaea1/electricite/cablecoude.png";
					break;
				case "cabledroiton.png":
					img.src = "/escaperpg/images/gaea1/electricite/cabledroit.png";
					break;
				case "cableton.png":
					img.src = "/escaperpg/images/gaea1/electricite/cablet.png";
					break;
			}
		}
	});
}

function hasActive(element) {
	return element.classList.contains("active");
}

function checkDiodes() {
	if (hasActive(caseDiode1)) { diode1.src = "/escaperpg/images/gaea1/electricite/diodeallumee.png"; }
	else { diode1.src = "/escaperpg/images/gaea1/electricite/diodeeteinte.png"; }
	
	if (hasActive(caseDiode2)) { diode2.src = "/escaperpg/images/gaea1/electricite/diodeallumee.png"; }
	else { diode2.src = "/escaperpg/images/gaea1/electricite/diodeeteinte.png"; }
	
	if (hasActive(caseDiode3)) { diode3.src = "/escaperpg/images/gaea1/electricite/diodeallumee.png"; }
	else { diode3.src = "/escaperpg/images/gaea1/electricite/diodeeteinte.png"; }
}

function checkFinal() {
	if (hasActive(caseDiode1) && hasActive(caseDiode2) && hasActive(caseDiode3) && hasActive(caseFinale1) && hasActive(caseFinale2) && hasActive(caseFinale3)
		&& connections[caseFinale1.id]?.[parseInt(caseFinale1.getAttribute('data-orientation'), 10)]?.includes("right")
		&& connections[caseFinale2.id]?.[parseInt(caseFinale2.getAttribute('data-orientation'), 10)]?.includes("right")
		&& connections[caseFinale3.id]?.[parseInt(caseFinale3.getAttribute('data-orientation'), 10)]?.includes("right")) {
		setTimeout(function() {
			alert(REUSSI);
			document.location.href="terminal.php";
			}, 200);
	}
}

function applyRandomRotation() {
	document.querySelectorAll('.elec').forEach(item => {
		const img = item.querySelector('img');
		const randomRotation = [0, 90, 180, 270][Math.floor(Math.random() * 4)];
		img.style.transform = "rotate(" + randomRotation + "deg)";
		item.setAttribute('data-orientation', randomRotation);
	});
}

function init() {
	applyRandomRotation();
	if (hasActive(caseDiode1) && hasActive(caseDiode2) && hasActive(caseDiode3) && hasActive(caseFinale1) && hasActive(caseFinale2) && hasActive(caseFinale3)) { applyRandomRotation(); }
	
	checkActivePath();
	updateActiveClasses();
	document.querySelectorAll('.elec').forEach(item => { item.addEventListener('click', rotateImage); });
}
init();