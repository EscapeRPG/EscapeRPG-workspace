let topasalle = document.getElementById("asalletop"),
	topbsalle = document.getElementById("bsalletop"),
	topcsalle = document.getElementById("csalletop"),
	topdsalle = document.getElementById("dsalletop"),
	topesalle = document.getElementById("esalletop"),
	topfsalle = document.getElementById("fsalletop"),
	topgsalle = document.getElementById("gsalletop"),
	tophsalle = document.getElementById("hsalletop"),
	topisalle = document.getElementById("isalletop"),
	topjsalle = document.getElementById("jsalletop"),
	topksalle = document.getElementById("ksalletop"),
	toplsalle = document.getElementById("lsalletop"),
	topmsalle = document.getElementById("msalletop"),
	topnsalle = document.getElementById("nsalletop"),
	toposalle = document.getElementById("osalletop"),
	toppsalle = document.getElementById("psalletop"),
	topqsalle = document.getElementById("qsalletop"),
	toprsalle = document.getElementById("rsalletop"),
	topssalle = document.getElementById("ssalletop"),
	toptsalle = document.getElementById("tsalletop"),
	timer = document.getElementById("timer");
	bonchemin = false,
	cheminchampi = false,
	countDownDate = new Date().setMinutes(new Date().getMinutes() + 2);

let x = setInterval(function()
{
	let now = new Date().getTime();
	let distance = countDownDate - now;
	let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
	let secondes = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, '0');
	let millisecondes = Math.floor((distance % (1000)) / 100);
	timer.innerHTML = minutes + " : " + secondes + " : " + millisecondes;
	if (distance < 0) { clearInterval(x); timer.innerHTML = "00 : 00 : 0"; alert('Game over man !'); }
}, 100);

function check()
{
	if (topisalle.classList == "hidden" && topesalle.classList == "hidden" && tophsalle.classList == "hidden" && topqsalle.classList == "hidden" && toprsalle.classList == "hidden") { if (toposalle.classList == "hidden" || topssalle.classList == "hidden") { bonchemin = true; }}
		else { bonchemin = false; }
	if (topdsalle.classList != "hidden" && topgsalle.classList != "hidden" && toplsalle.classList != "hidden" && topmsalle.classList != "hidden" && topnsalle.classList != "hidden") { cheminchampi = true; }
		else { cheminchampi = false; }
	if (bonchemin && cheminchampi) { alert ("T'as réussi !"); }
}

function asalle()
{
	if (topasalle.classList == "hidden") { topasalle.classList.remove("hidden"); }
		else { topasalle.classList.add("hidden"); }
	if (topbsalle.classList == "hidden") { topbsalle.classList.remove("hidden"); }
		else { topbsalle.classList.add("hidden"); }
	if (topfsalle.classList == "hidden") { topfsalle.classList.remove("hidden"); }
		else { topfsalle.classList.add("hidden"); }
	check();
}

function bsalle()
{
	if (topasalle.classList == "hidden") { topasalle.classList.remove("hidden"); }
		else { topasalle.classList.add("hidden"); }
	if (topbsalle.classList == "hidden") { topbsalle.classList.remove("hidden"); }
		else { topbsalle.classList.add("hidden"); }
	if (topcsalle.classList == "hidden") { topcsalle.classList.remove("hidden"); }
		else { topcsalle.classList.add("hidden"); }
	if (topgsalle.classList == "hidden") { topgsalle.classList.remove("hidden"); }
		else { topgsalle.classList.add("hidden"); }
	check();
}

function csalle()
{
	if (topbsalle.classList == "hidden") { topbsalle.classList.remove("hidden"); }
		else { topbsalle.classList.add("hidden"); }
	if (topcsalle.classList == "hidden") { topcsalle.classList.remove("hidden"); }
		else { topcsalle.classList.add("hidden"); }
	if (topgsalle.classList == "hidden") { topgsalle.classList.remove("hidden"); }
		else { topgsalle.classList.add("hidden"); }
	if (topdsalle.classList == "hidden") { topdsalle.classList.remove("hidden"); }
		else { topdsalle.classList.add("hidden"); }
	check();
}

function dsalle()
{
	if (topcsalle.classList == "hidden") { topcsalle.classList.remove("hidden"); }
		else { topcsalle.classList.add("hidden"); }
	if (topdsalle.classList == "hidden") { topdsalle.classList.remove("hidden"); }
		else { topdsalle.classList.add("hidden"); }
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	if (topesalle.classList == "hidden") { topesalle.classList.remove("hidden"); }
		else { topesalle.classList.add("hidden"); }
	check();
}

function esalle()
{
	if (topdsalle.classList == "hidden") { topdsalle.classList.remove("hidden"); }
		else { topdsalle.classList.add("hidden"); }
	if (topisalle.classList == "hidden") { topisalle.classList.remove("hidden"); }
		else { topisalle.classList.add("hidden"); }
	if (topesalle.classList == "hidden") { topesalle.classList.remove("hidden"); }
		else { topesalle.classList.add("hidden"); }
	check();
}

function fsalle()
{
	if (topfsalle.classList == "hidden") { topfsalle.classList.remove("hidden"); }
		else { topfsalle.classList.add("hidden"); }
	if (topasalle.classList == "hidden") { topasalle.classList.remove("hidden"); }
		else { topasalle.classList.add("hidden"); }
	if (topgsalle.classList == "hidden") { topgsalle.classList.remove("hidden"); }
		else { topgsalle.classList.add("hidden"); }
	if (topjsalle.classList == "hidden") { topjsalle.classList.remove("hidden"); }
		else { topjsalle.classList.add("hidden"); }
	if (topksalle.classList == "hidden") { topksalle.classList.remove("hidden"); }
		else { topksalle.classList.add("hidden"); }
	check();
}

function gsalle()
{
	if (topgsalle.classList == "hidden") { topgsalle.classList.remove("hidden"); }
		else { topgsalle.classList.add("hidden"); }
	if (topbsalle.classList == "hidden") { topbsalle.classList.remove("hidden"); }
		else { topbsalle.classList.add("hidden"); }
	if (topcsalle.classList == "hidden") { topcsalle.classList.remove("hidden"); }
		else { topcsalle.classList.add("hidden"); }
	if (topfsalle.classList == "hidden") { topfsalle.classList.remove("hidden"); }
		else { topfsalle.classList.add("hidden"); }
	if (toplsalle.classList == "hidden") { toplsalle.classList.remove("hidden"); }
		else { toplsalle.classList.add("hidden"); }
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	check();
}

function hsalle()
{
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	if (topdsalle.classList == "hidden") { topdsalle.classList.remove("hidden"); }
		else { topdsalle.classList.add("hidden"); }
	if (topgsalle.classList == "hidden") { topgsalle.classList.remove("hidden"); }
		else { topgsalle.classList.add("hidden"); }
	if (topisalle.classList == "hidden") { topisalle.classList.remove("hidden"); }
		else { topisalle.classList.add("hidden"); }
	if (toplsalle.classList == "hidden") { toplsalle.classList.remove("hidden"); }
		else { toplsalle.classList.add("hidden"); }
	if (topmsalle.classList == "hidden") { topmsalle.classList.remove("hidden"); }
		else { topmsalle.classList.add("hidden"); }
	if (toposalle.classList == "hidden") { toposalle.classList.remove("hidden"); }
		else { toposalle.classList.add("hidden"); }
	if (topssalle.classList == "hidden") { topssalle.classList.remove("hidden"); }
		else { topssalle.classList.add("hidden"); }
	check();
}

function isalle()
{
	if (topisalle.classList == "hidden") { topisalle.classList.remove("hidden"); }
		else { topisalle.classList.add("hidden"); }
	if (topesalle.classList == "hidden") { topesalle.classList.remove("hidden"); }
		else { topesalle.classList.add("hidden"); }
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	if (topmsalle.classList == "hidden") { topmsalle.classList.remove("hidden"); }
		else { topmsalle.classList.add("hidden"); }
	check();
}

function jsalle()
{
	if (topjsalle.classList == "hidden") { topjsalle.classList.remove("hidden"); }
		else { topjsalle.classList.add("hidden"); }
	if (topfsalle.classList == "hidden") { topfsalle.classList.remove("hidden"); }
		else { topfsalle.classList.add("hidden"); }
	if (topksalle.classList == "hidden") { topksalle.classList.remove("hidden"); }
		else { topksalle.classList.add("hidden"); }
	if (topnsalle.classList == "hidden") { topnsalle.classList.remove("hidden"); }
		else { topnsalle.classList.add("hidden"); }
	check();
}

function ksalle()
{
	if (topksalle.classList == "hidden") { topksalle.classList.remove("hidden"); }
		else { topksalle.classList.add("hidden"); }
	if (topjsalle.classList == "hidden") { topjsalle.classList.remove("hidden"); }
		else { topjsalle.classList.add("hidden"); }
	if (topfsalle.classList == "hidden") { topfsalle.classList.remove("hidden"); }
		else { topfsalle.classList.add("hidden"); }
	if (toplsalle.classList == "hidden") { toplsalle.classList.remove("hidden"); }
		else { toplsalle.classList.add("hidden"); }
	if (topnsalle.classList == "hidden") { topnsalle.classList.remove("hidden"); }
		else { topnsalle.classList.add("hidden"); }
	check();
}

function lsalle()
{
	if (toplsalle.classList == "hidden") { toplsalle.classList.remove("hidden"); }
		else { toplsalle.classList.add("hidden"); }
	if (topksalle.classList == "hidden") { topksalle.classList.remove("hidden"); }
		else { topksalle.classList.add("hidden"); }
	if (topgsalle.classList == "hidden") { topgsalle.classList.remove("hidden"); }
		else { topgsalle.classList.add("hidden"); }
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	if (toposalle.classList == "hidden") { toposalle.classList.remove("hidden"); }
		else { toposalle.classList.add("hidden"); }
	check();
}

function msalle()
{
	if (topmsalle.classList == "hidden") { topmsalle.classList.remove("hidden"); }
		else { topmsalle.classList.add("hidden"); }
	if (topisalle.classList == "hidden") { topisalle.classList.remove("hidden"); }
		else { topisalle.classList.add("hidden"); }
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	if (toppsalle.classList == "hidden") { toppsalle.classList.remove("hidden"); }
		else { toppsalle.classList.add("hidden"); }
	check();
}

function nsalle()
{
	if (topnsalle.classList == "hidden") { topnsalle.classList.remove("hidden"); }
		else { topnsalle.classList.add("hidden"); }
	if (topjsalle.classList == "hidden") { topjsalle.classList.remove("hidden"); }
		else { topjsalle.classList.add("hidden"); }
	if (topksalle.classList == "hidden") { topksalle.classList.remove("hidden"); }
		else { topksalle.classList.add("hidden"); }
	if (toposalle.classList == "hidden") { toposalle.classList.remove("hidden"); }
		else { toposalle.classList.add("hidden"); }
	if (topqsalle.classList == "hidden") { topqsalle.classList.remove("hidden"); }
		else { topqsalle.classList.add("hidden"); }
	check();
}

function osalle()
{
	if (toposalle.classList == "hidden") { toposalle.classList.remove("hidden"); }
		else { toposalle.classList.add("hidden"); }
	if (toplsalle.classList == "hidden") { toplsalle.classList.remove("hidden"); }
		else { toplsalle.classList.add("hidden"); }
	if (topnsalle.classList == "hidden") { topnsalle.classList.remove("hidden"); }
		else { topnsalle.classList.add("hidden"); }
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	if (toprsalle.classList == "hidden") { toprsalle.classList.remove("hidden"); }
		else { toprsalle.classList.add("hidden"); }
	check();
}

function psalle()
{
	if (toppsalle.classList == "hidden") { toppsalle.classList.remove("hidden"); }
		else { toppsalle.classList.add("hidden"); }
	if (topmsalle.classList == "hidden") { topmsalle.classList.remove("hidden"); }
		else { topmsalle.classList.add("hidden"); }
	if (topssalle.classList == "hidden") { topssalle.classList.remove("hidden"); }
		else { topssalle.classList.add("hidden"); }
	if (toptsalle.classList == "hidden") { toptsalle.classList.remove("hidden"); }
		else { toptsalle.classList.add("hidden"); }
	check();
}

function qsalle()
{
	if (topqsalle.classList == "hidden") { topqsalle.classList.remove("hidden"); }
		else { topqsalle.classList.add("hidden"); }
	if (topnsalle.classList == "hidden") { topnsalle.classList.remove("hidden"); }
		else { topnsalle.classList.add("hidden"); }
	if (toprsalle.classList == "hidden") { toprsalle.classList.remove("hidden"); }
		else { toprsalle.classList.add("hidden"); }
	check();
}

function rsalle()
{
	if (toprsalle.classList == "hidden") { toprsalle.classList.remove("hidden"); }
		else { toprsalle.classList.add("hidden"); }
	if (topqsalle.classList == "hidden") { topqsalle.classList.remove("hidden"); }
		else { topqsalle.classList.add("hidden"); }
	if (toposalle.classList == "hidden") { toposalle.classList.remove("hidden"); }
		else { toposalle.classList.add("hidden"); }
	if (topssalle.classList == "hidden") { topssalle.classList.remove("hidden"); }
		else { topssalle.classList.add("hidden"); }
	check();
}

function ssalle()
{
	if (topssalle.classList == "hidden") { topssalle.classList.remove("hidden"); }
		else { topssalle.classList.add("hidden"); }
	if (toptsalle.classList == "hidden") { toptsalle.classList.remove("hidden"); }
		else { toptsalle.classList.add("hidden"); }
	if (toprsalle.classList == "hidden") { toprsalle.classList.remove("hidden"); }
		else { toprsalle.classList.add("hidden"); }
	if (tophsalle.classList == "hidden") { tophsalle.classList.remove("hidden"); }
		else { tophsalle.classList.add("hidden"); }
	if (toppsalle.classList == "hidden") { toppsalle.classList.remove("hidden"); }
		else { toppsalle.classList.add("hidden"); }
	check();
}

function tsalle()
{
	if (toptsalle.classList == "hidden") { toptsalle.classList.remove("hidden"); }
		else { toptsalle.classList.add("hidden"); }
	if (topssalle.classList == "hidden") { topssalle.classList.remove("hidden"); }
		else { topssalle.classList.add("hidden"); }
	if (toppsalle.classList == "hidden") { toppsalle.classList.remove("hidden"); }
		else { toppsalle.classList.add("hidden"); }
	check();
}
