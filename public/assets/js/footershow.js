let inventaire = document.getElementById("inventaireshow"),
  mdp = document.getElementById("motsdepasseshow"),
  inventairenav = document.getElementById("inventairefooter"),
  mdpnav = document.getElementById("motsdepasse");

inventairenav.addEventListener("click", inventaireshow);
mdpnav.addEventListener("click", mdpshow);

function inventaireshow() {
  if (inventaire.classList == "footerhidden") {
    inventaire.className = "footeraffichage";
    inventairenav.classList.add("current");
    mdp.className = "footerhidden";
    mdpnav.classList.remove("current");
  } else {
    inventaire.className = "footerhidden";
    inventairenav.classList.remove("current");
  }
}

function mdpshow() {
  if (mdp.classList == "footerhidden") {
    mdp.className = "footeraffichage";
    mdpnav.classList.add("current");
    inventaire.className = "footerhidden";;
    inventairenav.classList.remove("current");
  } else {
    mdp.className = "footerhidden";
    mdpnav.classList.remove("current");
  }
}
