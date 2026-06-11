function chargement() {
  document.querySelector(".page-loader")?.remove();

  const main = document.querySelector("main");
  if (main) {
    main.style.display = "flex";
  }
}

window.addEventListener('load', chargement);
