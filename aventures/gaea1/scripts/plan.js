var ali = document.getElementById("lia"),
	bli = document.getElementById("lib"),
	cli = document.getElementById("lic"),
	dli = document.getElementById("lid"),
	eli = document.getElementById("lie"),
	elideux = document.getElementById("lie2"),
	fli = document.getElementById("lif"),
	gli = document.getElementById("lig"),
	hli = document.getElementById("lih"),
	ili = document.getElementById("lii"),
	jli = document.getElementById("lij"),
	kli = document.getElementById("lik"),
	lli = document.getElementById("lil"),
	mli = document.getElementById("lim"),
	nli = document.getElementById("lin"),
	oli = document.getElementById("lio"),
	pli = document.getElementById("lip"),
	qli = document.getElementById("liq"),
	rli = document.getElementById("lir"),
	sli = document.getElementById("lis"),
	tli = document.getElementById("lit"),
	topasalle = document.getElementById("asalletop"),
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
	topmsalle = document.getElementById("msalletop"),
	topnsalle = document.getElementById("nsalletop"),
	toppsalle = document.getElementById("psalletop"),
	topssalle = document.getElementById("ssalletop"),
	toptsalle = document.getElementById("tsalletop"),
	overasalle = document.getElementById("asalleover"),
	overbsalle = document.getElementById("bsalleover"),
	overcsalle = document.getElementById("csalleover"),
	overdsalle = document.getElementById("dsalleover"),
	overesalle = document.getElementById("esalleover"),
	overfsalle = document.getElementById("fsalleover"),
	overgsalle = document.getElementById("gsalleover"),
	overhsalle = document.getElementById("hsalleover"),
	overisalle = document.getElementById("isalleover"),
	overjsalle = document.getElementById("jsalleover"),
	overksalle = document.getElementById("ksalleover"),
	overlsalle = document.getElementById("lsalleover"),
	overmsalle = document.getElementById("msalleover"),
	overnsalle = document.getElementById("nsalleover"),
	overosalle = document.getElementById("osalleover"),
	overpsalle = document.getElementById("psalleover"),
	overqsalle = document.getElementById("qsalleover"),
	overrsalle = document.getElementById("rsalleover"),
	overssalle = document.getElementById("ssalleover"),
	overtsalle = document.getElementById("tsalleover"),
	alerte = "Vous ne pouvez pas essayer d\'entrer ici avant d\'avoir visité au moins l\'une des salles attenantes !"

function asalle()
	{
		ali.classList.add("currentli");
		overasalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { ali.classList.remove("currentli"); overasalle.classList.add("hidden"); });
	}

function asalleclick()
	{
		if (topbsalle.classList != "hidden" && topdsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="labratruma"; }
	}

function bsalle()
	{
		bli.classList.add("currentli");
		overbsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { bli.classList.remove("currentli"); overbsalle.classList.add("hidden"); });
	}

function bsalleclick()
	{
		if (topasalle.classList != "hidden" && topcsalle.classList != "hidden" && topgsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="labratrumb"; }
	}

function csalle()
	{
		cli.classList.add("currentli");
		overcsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { cli.classList.remove("currentli"); overcsalle.classList.add("hidden"); });
	}

function csalleclick()
	{
		if (topbsalle.classList != "hidden" && topdsalle.classList != "hidden" && topgsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="sovrum"; }
	}

function dsalle()
	{
		dli.classList.add("currentli");
		overdsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { dli.classList.remove("currentli"); overdsalle.classList.add("hidden"); });
	}

function dsalleclick()
	{
		if (topcsalle.classList != "hidden" && topesalle.classList != "hidden" && tophsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="sykkerum"; }
	}

function esalle()
	{
		eli.classList.add("currentli");
		elideux.classList.add("currentli");
		overesalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { eli.classList.remove("currentli"); elideux.classList.remove("currentli"); overesalle.classList.add("hidden"); });
	}

function esalleclick()
	{
		if (topdsalle.classList != "hidden" && topisalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="komunodek"; }
	}

function fsalle()
	{
		fli.classList.add("currentli");
		overfsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { fli.classList.remove("currentli"); overfsalle.classList.add("hidden"); });
	}

function fsalleclick()
	{
		if (topasalle.classList != "hidden" && topgsalle.classList != "hidden" && topjsalle.classList != "hidden" && topksalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="kurdiord"; }
	}

function gsalle()
	{
		gli.classList.add("currentli");
		overgsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { gli.classList.remove("currentli"); overgsalle.classList.add("hidden"); });
	}

function gsalleclick()
	{
		document.location.href="kurdiore";
	}

function hsalle()
	{
		hli.classList.add("currentli");
		overhsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { hli.classList.remove("currentli"); overhsalle.classList.add("hidden"); });
	}

function hsalleclick()
	{
		document.location.href="kurdiorf";
	}

function isalle()
	{
		ili.classList.add("currentli");
		overisalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { ili.classList.remove("currentli"); overisalle.classList.add("hidden"); });
	}

function isalleclick()
	{
		if (topesalle.classList != "hidden" && tophsalle.classList != "hidden" && topmsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="kurdiorh"; }
	}

function jsalle()
	{
		jli.classList.add("currentli");
		overjsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { jli.classList.remove("currentli"); overjsalle.classList.add("hidden"); });
	}

function jsalleclick()
	{
		if (topfsalle.classList != "hidden" && topksalle.classList != "hidden" && topnsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="legerrum"; }
	}

function ksalle()
	{
		kli.classList.add("currentli");
		overksalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { kli.classList.remove("currentli"); overksalle.classList.add("hidden"); });
	}

function ksalleclick()
	{
		document.location.href="kurdiorc";
	}

function lsalle()
	{
		lli.classList.add("currentli");
		overlsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { lli.classList.remove("currentli"); overlsalle.classList.add("hidden"); });
	}

function lsalleclick()
	{
		document.location.href="hall";
	}

function msalle()
	{
		mli.classList.add("currentli");
		overmsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { mli.classList.remove("currentli"); overmsalle.classList.add("hidden"); });
	}

function msalleclick()
	{
		if (tophsalle.classList != "hidden" && topisalle.classList != "hidden" && toppsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="drekrum"; }
	}

function nsalle()
	{
		nli.classList.add("currentli");
		overnsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { nli.classList.remove("currentli"); overnsalle.classList.add("hidden"); });
	}

function nsalleclick()
	{
		document.location.href="kurdiorb";
	}

function osalle()
	{
		oli.classList.add("currentli");
		overosalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { oli.classList.remove("currentli"); overosalle.classList.add("hidden"); });
	}

function osalleclick()
	{
		document.location.href="couloira";
	}

function psalle()
	{
		pli.classList.add("currentli");
		overpsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { pli.classList.remove("currentli"); overpsalle.classList.add("hidden"); });
	}

function psalleclick()
	{
		if (topmsalle.classList != "hidden" && toptsalle.classList != "hidden" && topssalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="raktrrum"; }
	}

function qsalle()
	{
		qli.classList.add("currentli");
		overqsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { qli.classList.remove("currentli"); overqsalle.classList.add("hidden"); });
	}

function qsalleclick()
	{
		document.location.href="hangar";
	}

function rsalle()
	{
		rli.classList.add("currentli");
		overrsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { rli.classList.remove("currentli"); overrsalle.classList.add("hidden"); });
	}

function rsalleclick()
	{
		document.location.href="terminal";
	}

function ssalle()
	{
		sli.classList.add("currentli");
		overssalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { sli.classList.remove("currentli"); overssalle.classList.add("hidden"); });
	}

function ssalleclick()
	{
		document.location.href="kurdiorg";
	}

function tsalle()
	{
		tli.classList.add("currentli");
		overtsalle.classList.remove("hidden");
		this.addEventListener("mouseout", function() { tli.classList.remove("currentli"); overtsalle.classList.add("hidden"); });
	}

function tsalleclick()
	{
		if (topssalle.classList != "hidden" && toppsalle.classList != "hidden")
			{ alert (alerte); }
		else { document.location.href="spesrum"; }
	}