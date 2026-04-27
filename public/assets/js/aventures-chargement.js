function chargement() {
  document.getElementById("load").style.display = "none";
  document.getElementById("loader").style.display = "none";
  document.querySelector("main").style.display = "flex";
}

window.addEventListener('load', chargement);
