const cles = document.querySelectorAll(".cle-maison");

cles.forEach((cle, i) => {
  const index = i + 1;

  cle.addEventListener("mouseover", () => {
    cle.setAttribute("src", `/escaperpg/images/avent/cle${index}hover.png`);
  });

  cle.addEventListener("mouseout", () => {
    cle.setAttribute("src", `/escaperpg/images/avent/cle${index}.png`);
  });
});
