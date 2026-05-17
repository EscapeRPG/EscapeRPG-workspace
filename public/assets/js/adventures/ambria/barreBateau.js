const barres = document.querySelectorAll(".barre");

barres.forEach((barre, i) => {
    const index = i + 1;
    const image = barre.matches("img") ? barre : barre.querySelector("img");

    barre.addEventListener("mouseover", () => {
        image.setAttribute("src", `/assets/img/ambria/barre${index}hover.png`);
    });

    barre.addEventListener("mouseout", () => {
        image.setAttribute("src", `/assets/img/ambria/barre${index}.png`);
    });
})