function chargement() {
  document.querySelector(".page-loader")?.remove();

  const main = document.querySelector("main");
  if (main) {
    main.style.display = "block";
  }
}

window.addEventListener("load", chargement);
