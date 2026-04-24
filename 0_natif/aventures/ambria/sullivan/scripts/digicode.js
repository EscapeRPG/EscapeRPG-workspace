const coordonnee1 = document.getElementById("coordonnee1img"),
  coordonnee2 = document.getElementById("coordonnee2img"),
  coordonnee3 = document.getElementById("coordonnee3img"),
  coordonnee4 = document.getElementById("coordonnee4img"),
  boutonhaut1 = document.getElementById("boutonhaut1"),
  boutonhaut2 = document.getElementById("boutonhaut2"),
  boutonhaut3 = document.getElementById("boutonhaut3"),
  boutonhaut4 = document.getElementById("boutonhaut4"),
  boutonbas1 = document.getElementById("boutonbas1"),
  boutonbas2 = document.getElementById("boutonbas2"),
  boutonbas3 = document.getElementById("boutonbas3"),
  boutonbas4 = document.getElementById("boutonbas4"),
  valider = document.getElementById("valider"),
  boutonpress = new Audio("/escaperpg/sons/ambria/buttonpress.mp3"),
  orthoCoord = ["tiret", "n", "e", "s", "o"];

let first = 0,
  second = 0,
  third = 0,
  fourth = 0;

boutonhaut1.addEventListener("click", boutoncaphaut1);
boutonhaut2.addEventListener("click", boutoncaphaut2);
boutonhaut3.addEventListener("click", boutoncaphaut3);
boutonhaut4.addEventListener("click", boutoncaphaut4);
boutonbas1.addEventListener("click", boutoncapbas1);
boutonbas2.addEventListener("click", boutoncapbas2);
boutonbas3.addEventListener("click", boutoncapbas3);
boutonbas4.addEventListener("click", boutoncapbas4);
valider.addEventListener("click", check);

function boutoncaphaut1() {
  boutonpress.play();
  boutonhaut1.className = "boutonhauton";

  if (first != 9) {
    first++;
  } else {
    first = 0;
  }

  coordonnee1.src = `/escaperpg/images/ambria/cap/cap${first}.png`;

  setTimeout(removehaut, 200);
}

function boutoncaphaut2() {
  boutonpress.play();
  boutonhaut2.className = "boutonhauton";

  if (second != 9) {
    second++;
  } else {
    second = 0;
  }

  coordonnee2.src = `/escaperpg/images/ambria/cap/cap${second}.png`;

  setTimeout(removehaut, 200);
}

function boutoncaphaut3() {
  boutonpress.play();
  boutonhaut3.className = "boutonhauton";

  if (third != 4) {
    third++;
  } else {
    third = 0;
  }

  coordonnee3.src = `/escaperpg/images/ambria/cap/cap${orthoCoord[third]}.png`;

  setTimeout(removehaut, 200);
}

function boutoncaphaut4() {
  boutonpress.play();
  boutonhaut4.className = "boutonhauton";

  if (fourth != 4) {
    fourth++;
  } else {
    fourth = 0;
  }

  coordonnee4.src = `/escaperpg/images/ambria/cap/cap${orthoCoord[fourth]}.png`;

  setTimeout(removehaut, 200);
}

function boutoncapbas1() {
  boutonpress.play();
  boutonbas1.className = "boutonbason";

  if (first != 0) {
	first--;
  } else {
	first = 9;
  }

    coordonnee1.src = `/escaperpg/images/ambria/cap/cap${first}.png`;
	
  setTimeout(removebas, 200);
}

function boutoncapbas2() {
  boutonpress.play();
  boutonbas2.className = "boutonbason";

  if (second != 0) {
    second--;
  } else {
    second = 9;
  }

  coordonnee2.src = `/escaperpg/images/ambria/cap/cap${second}.png`;

  setTimeout(removebas, 200);
}

function boutoncapbas3() {
  boutonpress.play();
  boutonhaut3.className = "boutonbason";

  if (third != 0) {
    third--;
  } else {
    third = 4;
  }

  coordonnee3.src = `/escaperpg/images/ambria/cap/cap${orthoCoord[third]}.png`;

  setTimeout(removehaut, 200);
}

function boutoncapbas4() {
  boutonpress.play();
  boutonhaut4.className = "boutonbason";

  if (fourth != 0) {
    fourth--;
  } else {
    fourth = 4;
  }

  coordonnee4.src = `/escaperpg/images/ambria/cap/cap${orthoCoord[fourth]}.png`;

  setTimeout(removehaut, 200);
}

function removehaut() {
  boutonhaut1.className = "boutonhaut";
  boutonhaut2.className = "boutonhaut";
  boutonhaut3.className = "boutonhaut";
  boutonhaut4.className = "boutonhaut";
}

function removebas() {
  boutonbas1.className = "boutonbas";
  boutonbas2.className = "boutonbas";
  boutonbas3.className = "boutonbas";
  boutonbas4.className = "boutonbas";
}

function check() {
  if (first == 3 && second == 2 && third == 1 && fourth == 2) {
    alert("Vous esquissez un sourire.");
    document.location.href = "tempete.php";
  } else {
    alert(
      "Vous avez beau essayer d'y voir clair dans tout ça, rien ne semble avoir de sens pour vous."
    );
  }
}
