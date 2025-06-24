let angle = 90;
const container = document.getElementById("machineenigme");

for (let index = 1; index <= 18; index++) {
  container.innerHTML += `
	<div class="spin0">
		<img src="/escaperpg/images/avent/machineenigme/piece${index}.png" alt="une pièce de machine">
	</div>`;
}

const tiles = document.querySelectorAll(".spin0");

tiles.forEach((tile) => () => {
  tile.addEventListener("click", () => {
    rotateTile(tile);
  });
});

function rotateTile(image) {
  image.setAttribute("style", "transform: rotate(" + angle + "deg)");
  angle += 90;
}
