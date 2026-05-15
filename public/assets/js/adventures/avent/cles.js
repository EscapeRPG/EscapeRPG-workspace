const cles = document.querySelectorAll(".cle-maison");

cles.forEach((cle, i) => {
  const index = i + 1;
  const image = cle.matches("img") ? cle : cle.querySelector("img");

  cle.addEventListener("mouseover", () => {
    image.setAttribute("src", `/assets/img/avent/cle${index}hover.png`);
  });

  cle.addEventListener("mouseout", () => {
    image.setAttribute("src", `/assets/img/avent/cle${index}.png`);
  });
});
