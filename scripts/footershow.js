let inventaire = document.getElementById("inventaireshow"),
  mdp = document.getElementById("motsdepasseshow"),
  inventairenav = document.getElementById("inventairefooter"),
  mdpnav = document.getElementById("motsdepasse");

inventairenav.addEventListener("click", inventaireshow);
mdpnav.addEventListener("click", mdpshow);

function inventaireshow() {
  if (inventaire.classList == "footerhidden") {
    inventaire.classList.add("footeraffichage");
    inventairenav.classList.add("current");
    mdp.classList.remove("footeraffichage");
    mdpnav.classList.remove("current");
  } else {
    inventaire.classList.remove("footeraffichage");
    inventairenav.classList.remove("current");
  }
}

function mdpshow() {
  if (mdp.classList == "footerhidden") {
    mdp.classList.add("footeraffichage");
    mdpnav.classList.add("current");
    inventaire.classList.remove("footeraffichage");
    inventairenav.classList.remove("current");
  } else {
    mdp.classList.remove("footeraffichage");
    mdpnav.classList.remove("current");
  }
}
