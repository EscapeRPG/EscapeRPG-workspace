function chargement() {
  document.getElementById("load").style.display = "none";
  document.getElementById("loader").style.display = "none";
  document.querySelector("main").style.display = "block";
}

window.addEventListener("load", chargement);
